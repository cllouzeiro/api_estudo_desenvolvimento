<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index(Request $req)
    {
        if(isset($req->url)){
            $url = $req->url;
        }else{
            $url = "https://pokeapi.co/api/v2/pokemon";
        }

    	$client = new \GuzzleHttp\Client();
		$ind = 0;
		$page['next'] = $ind + 20;
    	$page['prev'] = $ind;
        
    	
    	$data = $client->get($url)->getBody()->getContents();
    	// dd(json_decode($data));
    	$data = json_decode($data);
        $dados['total'] = $data->count;
        $dados['next'] = $data->next;
        $dados['previous'] = $data->previous;
        // $dados['results'] = $data->results;

        foreach($data->results as $pokemon)
        {
            $url = $pokemon->url;
            $poke_dados = $client->get($url)->getBody()->getContents();
            
            $dados['pokemons'][$pokemon->name]['nome'] = $pokemon->name;
            
            $url = $pokemon->url;
            $poke_desc = json_decode($client->get($url)->getBody()->getContents());
            $dados['pokemons'][$pokemon->name]['imagem'] = $poke_desc->sprites->front_default;

            foreach ($poke_desc->abilities as $key => $value) {
                $dados['pokemons'][$pokemon->name]['abilidade'][$key] = $value->ability->name;
            }

            $url = $poke_desc->species->url;
            $poke_info = json_decode($client->get($url)->getBody()->getContents());
            $dados['pokemons'][$pokemon->name]['color'] = $poke_info->color->name;
        }
        
    	return view('users.index', $dados);
    }
}
