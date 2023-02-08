<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$email = "090691@li.facens.br";

if(strpos($email, '@li.facens.br')){
    $msg = "O e-mail {$email} foi desativado, por favor faça "
    . "a alteração do seu e-mail da Facens "
    . "<a href='http:///www3.facens.br/global/trocaemail' target='_blank'>AQUI<a>.";

    echo $msg;
}
