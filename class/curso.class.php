<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of curso
 *
 * @author fbogila
 */

include_once 'bd/banco.class.php';

class curso {
    private $codcur;
    private $nome;
    
    function __construct($codcur = '') {
        $this->codcur = $codcur;
    }
    
    function select(){
        $link = banco::con();
        $query = "select id codcur,complemento nome from lec..vw_curso where id = $this->codcur;";
             
        $con = banco::con();

        if (function_exists('mssql_connect')) {
            mssql_query('SET ANSI_WARNINGS ON; SET ANSI_NULLS ON;');
            $result = mssql_query($query, $con);
            if (mssql_num_rows($result) > 0) {
                $row = mssql_fetch_assoc($result);
                foreach ($row as $key => $value) {
                    $this->{$key} = $value;
                }
                mssql_close($link);
            }
        } else if (function_exists('sqlsrv_connect')) {
            $opt = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
            $result = sqlsrv_query($con, $query, array(), $opt);
            if (sqlsrv_num_rows($result) > 0) {
                $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
                foreach ($row as $key => $value) {
                    $this->{$key} = $value;
                }
                sqlsrv_close($link);
            }
        }
    }
    
    function selectAll(){
        $link = banco::con();
        //$query = "select codcur, segundonome nome from corpore..ucursos where segundonome is not null;";
        $query = "select id codcur, complemento nome from lec..vw_curso where tipo in (1,3);";
        $con = banco::con();
        $list = array();

        if (function_exists('mssql_connect')) {
            mssql_query('SET ANSI_WARNINGS ON; SET ANSI_NULLS ON;');
            $result = mssql_query($query, $con);
            if (mssql_num_rows($result) > 0) {
                while($row = mssql_fetch_assoc($result)){
                    $curso = new curso();
                    foreach ($row as $key => $value) {
                        $col = ucfirst($key);
                        $curso->{"set$col"}($value);
                    }
                    array_push($list, $curso);  
                }
                mssql_close($link);
            }
        } else if (function_exists('sqlsrv_connect')) {
            $opt = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
            $result = sqlsrv_query($con, $query, array(), $opt);
            if (sqlsrv_num_rows($result) > 0) {
                while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
                    $curso = new curso();
                    foreach ($row as $key => $value) {
                        $col = ucfirst($key);
                        $curso->{"set$col"}($value);
                    }
                    array_push($list, $curso);
                }
                sqlsrv_close($link);
            }
        }
        
        return $list;
    }
    
    function getCodcur() {
        return $this->codcur;
    }

    function getNome() {
        return $this->nome;
    }

    function setCodcur($codcur) {
        $this->codcur = $codcur;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

}
