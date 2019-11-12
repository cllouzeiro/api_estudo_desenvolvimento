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

    	return view('welcome', compact('data', 'page'));
    }

    public function nextPage($ind)
    {
    	$page['next'] = $ind + 20;
    	$page['prev'] = $ind;
    	$client = new \GuzzleHttp\Client();
		$url = "https://pokeapi.co/api/v2/pokemon?offset=".$page['next']."&limit=20";
    	$data = $client->get($url)->getBody()->getContents();
    	$data = json_decode($data);
    	return view('welcome', compact('data', 'page'));
    }

    public function prevPage($ind)
    {
    	$page['next'] = $ind + 20;
    	$page['prev'] = $ind - 20;
    	$client = new \GuzzleHttp\Client();
		$url = "https://pokeapi.co/api/v2/pokemon?offset=".$page['prev']."&limit=20";
    	$data = $client->get($url)->getBody()->getContents();
    	$data = json_decode($data);
    	return view('welcome', compact('data', 'page'));
    }

    public function ajax(){
    	$url = Request::input('url');

    	$client = new \GuzzleHttp\Client();
		$url = $url;
    	$data = $client->get($url)->getBody()->getContents();
    	return response()->json(json_encode($data));
    }
}
