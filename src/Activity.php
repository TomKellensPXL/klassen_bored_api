<?php
//namespace src;

use GuzzleHttp\Client;
class Activity
{
    private Client $client;

    public function __construct() {
        $this->client = new Client(['verify' => false]); // WTF DIT WAS HET GEWOON      Blijkbaar is er een probleem met het SSL-certificaat wanneer Guzzle een verzoek probeert uit te voeren naar de API
    }

    public function getActivity(): string {
        $res = $this->client->request('GET', 'https://bored-api.appbrewery.com/random');
        $data = json_decode($res->getBody(), true);
        $activity = $data["activity"]; //Ik heb nog nooit zoiets gezien in mijn leven

        return $activity ?? 'No activity available';
    }
}