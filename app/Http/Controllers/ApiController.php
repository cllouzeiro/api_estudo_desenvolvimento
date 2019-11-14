<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
    	$client = new \GuzzleHttp\Client();
		$ind = 0;
		$page['next'] = $ind + 20;
    	$page['prev'] = $ind;
        
    	$url = "https://pokeapi.co/api/v2/pokemon";
    	$data = $client->get($url)->getBody()->getContents();
    	// dd(json_decode($data));
    	$data = json_decode($data);
        $dados['next'] = $data->next;
        $dados['next'] = $data->previous;
        $dados['next'] = $data->previous;

        foreach($data->results as $pokemon)
        {
            $url = $pokemon->url;
            $poke_dados = $client->get($url)->getBody()->getContents();
            
            dd(json_decode($poke_dados));
        }
        dd($data);
    	return view('welcome', compact('data', 'page'));
    }
}
