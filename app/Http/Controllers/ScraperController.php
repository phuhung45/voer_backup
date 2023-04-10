<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;

class ScraperController extends Controller
{
    private $result = array(
        "ssl"=>array(),
    );
    public function scraper(){
        $client = new Client();
        $ssl = array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );  
        $url = 'https://2022.voer.edu.vn/m/bai-toan-cac-vi-tuong-byzantine-va-ung-dung-trong-blockchain/bdccc437';
        $page = file_get_contents($url,false, $ssl);

        echo "<pre>";
        print_r($page);
        return view('scraper');
    }
}
