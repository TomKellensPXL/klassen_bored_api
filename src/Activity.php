<?php
//namespace src;

use GuzzleHttp\Client;
use TdTrung\Chalk\Chalk;
class Activity
{
    private Client $client;

    public function __construct() {
        $this->client = new Client(['verify' => false]); // WTF DIT WAS HET GEWOON      Blijkbaar is er een probleem met het SSL-certificaat wanneer Guzzle een verzoek probeert uit te voeren naar de API
    }

    public function getActivity(): string {
        $chalk = new Chalk();
        $res = $this->client->request('GET', 'https://bored-api.appbrewery.com/random');
        $data = json_decode($res->getBody(), true);
        $activity = $data["activity"]; //Ik heb nog nooit zoiets gezien in mijn leven
//        $activity = null;
//        return $chalk->green($activity) ?? $chalk->blue->underscore('No activity available'); //CHALK GEEFT ALTIJD EEN STRING TERUG. Ik weet niet of dat sowieso al is als de json property leeg is.
        return !empty($activity) ? $chalk->green($activity) : $chalk->blue->underscore('No activity available');
    }
}