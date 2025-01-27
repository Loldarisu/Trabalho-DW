<?php
@session_start();

// Originally made by: Pedro Moreira

if($_SERVER['HTTP_HOST'] == 'daraopedal.000webhostapp.com') {
    
    $arrSETTINGS['dir_site'] = '/storage/ssd1/163/18269163/public_html/';
    $arrSETTINGS['url_site'] = 'https://daraopedal.000webhostapp.com/';
    $arrSETTINGS['dir_site_adm'] = '/storage/ssd1/163/18269163/public_html/admin';
    $arrSETTINGS['url_site_adm'] = 'https://daraopedal.000webhostapp.com/admin';

    // definições de variáveis para ligar ao servidor MYSQL
    $arrSETTINGS['hostname'] = 'localhost';
    $arrSETTINGS['username'] = 'id2022144356_PedroMoreira';
    $arrSETTINGS['password'] = 'PedroMoreira_2022144356';
    $arrSETTINGS['database'] = 'id2022144356_daraopedal';

} else {

   


    // definições de variáveis para ligar ao servidor MYSQL
    $arrSETTINGS['hostname'] = 'localhost';
    $arrSETTINGS['username'] = 'root';
    $arrSETTINGS['password'] = '';
    $arrSETTINGS['database'] = 'dadaraopedal';
}

?>
