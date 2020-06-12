<?php

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;
require_once 'vendor/autoload.php';

if( !isset( $_SERVER['HTTP_USER_AGENT'])){
    $name = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:7.0.1) Gecko/20100101 Firefox/7.0.1";
}
$url="http://www1.caixa.gov.br/loterias/_arquivos/loterias/D_lotfac.zip";
// Use basename() function to return the base name of file  
$file_name = basename($url); 
$VContext = stream_context_create(["http" => ['method' => 'GET', 'header' => ['Cookie: security=true'."\r\n", 'User-Agent' => $name]]]);
// Use file_get_contents() function to get the file 
// from url and use file_put_contents() function to 
// save the file by using base name 
if(file_put_contents($file_name,file_get_contents($url, false, $VContext))) { 
    echo "File downloaded successfully"; 
}else { 
    echo "File downloading failed."; 
} 
  