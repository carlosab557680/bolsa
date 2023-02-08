<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Classe que descreve um determinado contrato
 * 
 * @property int $id Id do Contrato
 * @property string $nome Descrição do contrato
 * @property date $dtinicio Data de inicio do contrato
 * @property date $dtfim Data de fim do contrato
 *
 * @author fbogila
 */

include_once 'bd/banco.class.php';

class contrato {

    private $id;
    private $nome;
    private $dtinicio;
    private $dtfim;
    private $valorcredito;
    private $perletivo;
    private $tipo;
    
    const BOLSA_FILATROPICA = 1;
    const BOLSA_MERITO = 2;
    const BOLSA_MONITORIA = 3;
    const BOLSA_FIES = 4;
    const BOLSA_PRAVALER = 5;
    const BOLSA_FUNDACRED =  6;
    const INICIAÇÃO_CIENTIFICA = 7;


    function __construct($id = '') {
        $this->id = $id;
    }
    
   /* public function tiposContrato(){
        return array(
            1 => 'Bolsa Filantropia',
            2 => 'Bolsa Mérito', 
            3 => 'Bolsa Monitoria', 
        );
    }*/
            
    function setAtributos($array_post){
        foreach ($array_post as $key => $value) {
            $this->{$key} = $value;
        }
    }
    
    /**
     * Seleciona uma determinado contrato através do id
     */
    public function select() {
        $link = banco::con();
		//var_dump($this->id;);
        $query = "select id, nome, tipo, convert(varchar, dtinicio, 120) dtinicio, convert(varchar, dtfim, 120) dtfim, valorcredito, perletivo from contrato where id = $this->id";
             
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
     * Seleciona o ultimo periodo letivo adicionado.
     */
    public function selectLastPerletivo() {
        $link = banco::con();
        $query = "select perletivo_atual perletivo from config;";
             
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
        $query = "select id, nome, tipo, convert(varchar, dtinicio, 120) dtinicio, convert(varchar, dtfim, 120) dtfim, valorcredito, perletivo from contrato";
        $con = banco::con();
        $list = array();
        if (function_exists('mssql_connect')) {
            $result = mssql_query($query, $con);
            if (mssql_num_rows($result) > 0) {
                while($row = mssql_fetch_assoc($result)){
                    $c = new contrato();
                    foreach ($row as $key => $value) {
                        $col = ucfirst($key);
                        $c->{"set$col"}($value);
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
                    $c = new contrato();
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
    
    public function selectAllByPerletivo() {
        $link = banco::con();
        $query = "select id, nome, tipo, convert(varchar, dtinicio, 120) dtinicio, convert(varchar, dtfim, 120) dtfim, valorcredito, perletivo from contrato where perletivo = '$this->perletivo'";
        $con = banco::con();
        $list = array();
        if (function_exists('mssql_connect')) {
            $result = mssql_query($query, $con);
            if (mssql_num_rows($result) > 0) {
                while($row = mssql_fetch_assoc($result)){
                    $c = new contrato();
                    foreach ($row as $key => $value) {
                        $col = ucfirst($key);
                        $c->{"set$col"}($value);
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
                    $c = new contrato();
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
    
    public function selectAllByRAPerletivo($ra, $perletivo) {
        $link = banco::con();
        $query = "select c.id, c.nome, c.tipo, convert(varchar, dtinicio, 120) dtinicio, convert(varchar, dtfim, 120) dtfim, c.valorcredito, c.perletivo 
            from contrato c 
            join contemplado t on t.idcontrato = c.id
            where t.ra = '$ra' and c.perletivo = '$perletivo' and t.status = 0";
        
        $con = banco::con();
        $list = array();
        if (function_exists('mssql_connect')) {
            $result = mssql_query($query, $con);
            if (mssql_num_rows($result) > 0) {
                while($row = mssql_fetch_assoc($result)){
                    $c = new contrato();
                    foreach ($row as $key => $value) {
                        $col = ucfirst($key);
                        $c->{"set$col"}($value);
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
                    $c = new contrato();
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
        $query = "insert into contrato (tipo, nome, perletivo, dtinicio, dtfim, valorcredito)"
                . "values($this->tipo,'$this->nome', '$this->perletivo', '$this->dtinicio', '$this->dtfim', $this->valorcredito);";
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
    
    public function update(){
        $link = banco::con();
        $query = "update contrato set tipo = $this->tipo, nome = '$this->nome', perletivo = '$this->perletivo', dtinicio = '$this->dtinicio', dtfim = '$this->dtfim', valorcredito = $this->valorcredito"
                . "where id = $this->id";
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
    
    public function delete(){
        $link = banco::con();
        $query = "delete from contrato where id = $this->id";
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

    function getNome() {
        return $this->nome;
    }

    function getDtinicio() {
        return $this->dtinicio;
    }

    function getDtfim() {
        return $this->dtfim;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setDtinicio($dtinicio) {
        $this->dtinicio = $dtinicio;
    }

    function setDtfim($dtfim) {
        $this->dtfim = $dtfim;
    }
    function getValorcredito() {
        return $this->valorcredito;
    }

    function setValorcredito($valorcredito) {
        $this->valorcredito = $valorcredito;
    }

    function getPerletivo() {
        return $this->perletivo;
    }

    function setPerletivo($perletivo) {
        $this->perletivo = $perletivo;
    }

    function getTipo() {
        return $this->tipo;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }
}
