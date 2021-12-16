<?php

namespace App\Controllers\Command;

use App\Controllers\BaseController;
use CodeIgniter\CLI\CLI;
use SimpleXMLElement;

class CommandController extends BaseController
{
    public function commandPokemon()
    {
        $client = service('curlrequest');

        $response = $client->request('GET', 'https://pokeapi.co/api/v2/pokemon', []);

        $arrayResponse = json_decode($response->getBody());
        $count = 1;
        CLI::write('----- INICIO obtener Noticias -----');
        foreach ($arrayResponse->results as $i) {
            $line = $count . ' ' . $i->name;
            CLI::write($line);
            $count += 1;
        }
        CLI::write('----- Fin el commando -----');
    }

    public function commandFeedVillena()
    {
        $arrContextOptions = array(
            'ssl' => array(
                'verify_peer'      => false,
                'verify_peer_name' => false,
            ),
        );

        $response = file_get_contents('https://www.villena.es/feed', false, stream_context_create($arrContextOptions));
        $data = new SimpleXMLElement($response);
        $items = $data->channel->item;
        $count = 1;
        CLI::write('----- INICIO obtener Noticias -----');
        foreach ($items as $i) {
            $line = $count . ' ' . $i->title;
            CLI::write($line);
            $count += 1;
        }
        CLI::write('----- Fin el commando -----');
    }
}
