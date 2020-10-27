<?php

namespace App\Controller;

use App\Entity\Food;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class FoodController extends AbstractController
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @Route("/food", name="food")
     */
    public function createFood()
    {
        $response = $this->client->request(
            'POST',
            'https://trackapi.nutritionix.com/v2/natural/nutrients', [
                'json' => [
                    "query" => "100g of ham"
                ],
                'headers' => [
                    'x-app-id' => $this->getParameter('nutritionix_app_id'),
                    'x-app-key' => $this->getParameter('nutritionix_app_key'),
                    'x-remote-user-id' => 0
                ]
        ]);

        $content = $response->toArray();
        $foodInfo = $content['foods'][0];

        $food = new Food('Jamón');
        $food->setCalories($foodInfo['nf_calories'])
            ->setFats($foodInfo['nf_total_fat'])
            ->setCarbohydrates($foodInfo['nf_total_carbohydrate'])
            ->setFiber($foodInfo['nf_dietary_fiber'])
            ->setSugars($foodInfo['nf_sugars'])
            ->setProtein($foodInfo['nf_protein'])
            ->setImage($foodInfo['photo']['highres']);

        return $this->json($food);
    }
}
