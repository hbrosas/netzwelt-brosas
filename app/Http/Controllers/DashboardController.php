<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getTerritories()
    {
		try
		{
	        $http = new \GuzzleHttp\Client;
	        $response = $http->get('https://netzwelt-devtest.azurewebsites.net/Territories/All', [
	        	'headers'=> [
	        		'Content-Type'=>'application/json'
	        	],
	        	'verify' => false
	        ]);
	        $data = json_decode((string) $response->getBody(), true);

	        return response()->json([
	            'data' => $data['data']
	        ], 200);
		}
        catch(\GuzzleHttp\Exception\ClientException $e)
        {
        	return response()->json([
	            'error' => (string) $e->getResponse()->getBody(true)
	        ], 500);
        }
    }
}
