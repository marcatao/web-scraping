<?php

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

require_once 'vendor/autoload.php';

$browser = new HttpBrowser(HttpClient::create([
    'headers' => [
        'User-agent' => 'O que o site precisa'
    ]
]));

$browser->request('GET', 'https://vitormattos.github.io/poc-lineageos-cellphone-list-statics//');
$browser->clickLink('Login');
$crawler = $browser->submitForm('Go', [
    'username' => 'vitor@php.rio',
    'password' => 'uma senha muito secreta'
], 'GET');
$crawler = $browser->back();
var_dump($crawler->html());