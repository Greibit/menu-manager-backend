<?php


namespace App\Infrastructure\Provider;


use App\Domain\Food\NutritionalInformation;
use App\Domain\Food\NutritionalInformationProvider;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class NutritionixNutritionalInformationProvider implements NutritionalInformationProvider
{
    const BASE_GRAMS = 100;

    private HttpClientInterface $client;
    private string $appId;
    private string $appKey;

    public function __construct(
        HttpClientInterface $client,
        string $appId,
        string $appKey
    )
    {
        $this->client = $client;
        $this->appId = $appId;
        $this->appKey = $appKey;
    }

    public function getByFoodName(string $foodName): NutritionalInformation
    {
        $response = $this->client->request(
            'POST',
            'https://trackapi.nutritionix.com/v2/natural/nutrients', [
            'json' => [
                "query" => $foodName,
                'locale' => 'es_ES'
            ],
            'headers' => [
                'x-app-id' => $this->appId,
                'x-app-key' => $this->appKey,
                'x-remote-user-id' => 0
            ]
        ]);

        $content = $response->toArray();
        $foodInfo = $content['foods'][0];
        $servingGrams = $foodInfo['serving_weight_grams'];

        return new NutritionalInformation(
            $this->calculateNutrientGrams($servingGrams, $foodInfo['nf_calories']),
            $this->calculateNutrientGrams($servingGrams, $foodInfo['nf_total_carbohydrate']),
            $this->calculateNutrientGrams($servingGrams, $foodInfo['nf_protein']),
            $this->calculateNutrientGrams($servingGrams, $foodInfo['nf_total_fat']),
            $this->calculateNutrientGrams($servingGrams, $foodInfo['nf_sugars']),
            $this->calculateNutrientGrams($servingGrams, $foodInfo['nf_dietary_fiber'])
        );
    }

    private function calculateNutrientGrams($servingGrams, $nutrientQty)
    {
        return (static::BASE_GRAMS / $servingGrams) * $nutrientQty;
    }
}