<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Classe que descreve um determinado logtran
 *
 * @author fbogila
 */

include_once 'bd/banco.class.php';

class logtran {

    private $id;
    private $idcontrato;
    private $processo;
    private $datatran;
    private $usuario;
    private $valorantigo;
    private $valornovo;
    
    const ACEITE = 'Aceite do aluno';
    const UPDATE = 'Dados Atualizados';
    const DELETE = 'Dados Apagados';
    const CONTRATO_UPDATE = 'Atualização de contrato';
    const CONTRATO_INSERT = 'Inserção de contrato';
    const CONTEMPLADO_UPDATE = 'Atualização de contemplado';
    const CONTEMPLADO_INSERT = 'Inserção de contemplado';
    const ACEITE_VIEW = '0';
    const ACEITE_EMAIL = '1';
    const ACEITE_CONFIRM = '2';
    
    function __construct($idcontrato='', $usuario='', $processo='', $datatran='', $valorantigo = 0, $valornovo = 0, $id = '') {
        $this->id = $id;
        $this->idcontrato = $idcontrato;
        $this->processo = $processo;
        $this->datatran = $datatran;
        $this->usuario = $usuario;
        $this->valorantigo = $valorantigo;
        $this->valornovo = $valornovo;
    }

    /**
     * Seleciona uma determinado contrato através do id
     */
    public function select() {
        $link = banco::con();
        $query = "select * from logtran where id = $this->id";
             
        $con = banco::con();

        if (function_exists('mssql_connect')) {
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
    /**
     * Seleciona todos os contratos
     * @return contrato[] Retorna uma array de objetos da classe contrato
     */
    public function selectAll() {
        $link = banco::con();
        $query = "SELECT [id]
		,[idcontrato]
		,[processo]
		,convert(varchar, datatran, 120) datatran
		,[usuario]
		,[valorantigo]
		,[valornovo]
	FROM [dbo].[logtran]";
        $con = banco::con();
        $list = array();
        if (function_exists('mssql_connect')) {
            $result = mssql_query($query, $con);
            if (mssql_num_rows($result) > 0) {
                while($row = mssql_fetch_assoc($result)){
                    $c = new logtran();
                    
                    foreach ($row as $key => $value) {
                        $col = ucfirst($key);
                        if(method_exists($c, "set$col")){
                            $c->{"set$col"}($value);
                        }
                    }
                    array_push($list, $c);
                }
                mssql_close($link);
            }
        } else if (function_exists('sqlsrv_connect')) {
            $opt = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
            $result = sqlsrv_query($con, $query, array(), $opt);
            if (sqlsrv_num_rows($result) > 0) {
                while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
                    $c = new logtran();
                    foreach ($row as $key => $value) {
                        $col = ucfirst($key);
                        $c->{"set$col"}($value);
                    }
                    array_push($list, $c);
                }
                sqlsrv_close($link);
            }
        }
        return $list;
    }
    
    public function insert(){
            
        $link = banco::con();
        if($this->idcontrato == '')
            $query = "insert into logtran (idcontrato, processo, datatran, usuario, valorantigo, valornovo)"
                . "values(null, '$this->processo', '$this->datatran', '$this->usuario', '$this->valorantigo', '$this->valornovo');";
        else
        $query = "insert into logtran (idcontrato, processo, datatran, usuario, valorantigo, valornovo)"
                . "values($this->idcontrato, '$this->processo', '$this->datatran', '$this->usuario', '$this->valorantigo', '$this->valornovo');";
        
        $con = banco::con();
        
        if (function_exists('mssql_connect')) {
            if(mssql_query($query, $con)){
                mssql_close($link);
                return true;
            }

        } else if (function_exists('sqlsrv_connect')) {
            $opt = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
            if(sqlsrv_query($con, $query, array(), $opt)){
                sqlsrv_close($link);
                return true;
            }
        }
        
        return false;
    }

    function getId() {
        return $this->id;
    }

    function getIdcontrato() {
        return $this->idcontrato;
    }

    function getProcesso() {
        return $this->processo;
    }

    function getDatatran() {
        return $this->datatran;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getValorantigo() {
        return $this->valorantigo;
    }

    function getValornovo() {
        return $this->valornovo;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIdcontrato($idcontrato) {
        $this->idcontrato = $idcontrato;
    }

    function setProcesso($processo) {
        $this->processo = $processo;
    }

    function setDatatran($datatran) {
        $this->datatran = $datatran;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setValorantigo($valorantigo) {
        $this->valorantigo = $valorantigo;
    }

    function setValornovo($valornovo) {
        $this->valornovo = $valornovo;
    }



}
