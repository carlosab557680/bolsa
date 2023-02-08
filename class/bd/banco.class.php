<?php

class banco {
    public static function con() {
        try {
            $base = parse_ini_file('conf.ini',true);
            $base = $base['db'];
            //Linux
            if (function_exists('mssql_connect')) {
                $link = mssql_connect($base['host'], $base['user'], $base['password']);
                mssql_select_db($base['base'], $link);
                if (!$link){
                    die('Erro de conexao com servidor RM.');
                }
            }
            //Windows
            else {
                if (function_exists('sqlsrv_connect')) {

                    $info_rm = array("Database" => $base['base'], "UID" => $base['user'], "PWD" => $base['password'], "CharacterSet"  => 'UTF-8');
                    $link = sqlsrv_connect($base['host'], $info_rm);

                    
                    if (!$link) {
                        die('Erro de conexao com servidor RM.' . print_r(sqlsrv_errors()));
                    }
                }
            }
            return $link;
        } catch (Exception $ex) {
            die("Não foi possível conectar em " . DB_HOST . ":" . DB_BASE . "\n");
        }
    }
    
    public static function rmcon() {
        try {
            $base = parse_ini_file('conf.ini',true);
            $base = $base['rm'];
            //Linux
            if (function_exists('mssql_connect')) {
                $link = mssql_connect($base['host'], $base['user'], $base['password']);
                mssql_select_db($base['base'], $link);
                if (!$link){
                    die('Erro de conexao com servidor RM.');
                }
            }
            //Windows
            else {
                if (function_exists('sqlsrv_connect')) {

                    $info_rm = array("Database" => $base['base'], "UID" => $base['user'], "PWD" => $base['password'], "CharacterSet"  => 'UTF-8');
                    $link = sqlsrv_connect($base['host'], $info_rm);
                    
                    if (!$link) {
                        die('Erro de conexao com servidor RM.' . print_r(sqlsrv_errors()));
                    }
                }
            }
            return $link;
        } catch (Exception $ex) {
            die("Não foi possível conectar em " . DB_HOST . ":" . DB_BASE . "\n");
        }
    }
    
    public static function monitoriaCon() {
        try {
            $base = parse_ini_file('conf.ini',true);
            $base = $base['monitoria'];
            
            $link = new mysqli($base['host'], $base['user'], $base['password'], $base['base']);
            return $link;
            
        } catch (Exception $ex) {
            die("Não foi possível conectar em " . DB_HOST . ":" . DB_BASE . "\n");
        }
    }
    

}
