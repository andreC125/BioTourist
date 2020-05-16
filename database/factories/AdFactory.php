<?php

use Faker\Generator as Faker;
use Carbon\Carbon;
use App\Models\Region;

function getRandGeo($url)
{
    $results = file_get_contents($url);
    $elements = json_decode($results, true);
    $id = rand(0, count($elements) - 1);
    return $elements[$id];
}

$factory->define(App\Models\Ad::class, function (Faker $faker) {

    $region_id = rand(1, 12);
    $region_code = Region::find($region_id)->code;

    $departement = getRandGeo('https://geo.api.gouv.fr/regions/' . $region_code . '/departements');
    $commune = getRandGeo('https://geo.api.gouv.fr/departements/' . $departement['code'] . '/communes');

    $obsolete = rand(0, 1);

    return [
        'title' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'texte' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'quantité' => rand(1, 999),
        'prix' => rand(1, 999),
        'category_id' => rand(1, 10),
        'region_id' => $region_id,
        'user_id' => rand(2, 3),
        'departement' => $departement['code'],
        'commune' => $commune['code'],
        'commune_name' => $commune['nom'],
        'commune_postal' => $commune['codesPostaux'][0],
        'pseudo' => $faker->word,
        'clicks' => rand(1,999),
        'email' => $faker->email,
        'limit' => $obsolete ? Carbon::now()->subDayss(rand(1, 30)) : Carbon::now()->addWeeks(rand(1, 4)),
        'active' => rand(0, 1),
    ];
});
