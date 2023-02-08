<?php

/**
 * Classe que descreve um determinado usuario
 *
 * @author fbogila
 */

include_once 'bd/banco.class.php';

class config {
   
    private $id;
    private $data_abertura;
    private $data_encerramento;
    private $perletivo_atual;
    
    function __construct($id = '') {
        $this->id = $id;
    }
    /**
     * Seleciona as configurações
     */
    public function select() {
        $link = banco::con();
        $query = "select * from config";
             
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
     * Atualiza as configurações pelo id
     * @return boolean
     */
    public function update(){
        $link = banco::con();
        $query = "update config set data_abertura = '$this->data_abertura', data_encerramento = '$this->data_encerramento', perletivo_atual = '$this->perletivo_atual'"
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
    
    function getId() {
        return $this->id;
    }

    function getData_abertura() {
        return $this->data_abertura;
    }

    function getData_encerramento() {
        return $this->data_encerramento;
    }

    function getPerletivo_atual() {
        return $this->perletivo_atual;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setData_abertura($data_abertura) {
        $this->data_abertura = $data_abertura;
    }

    function setData_encerramento($data_encerramento) {
        $this->data_encerramento = $data_encerramento;
    }

    function setPerletivo_atual($perletivo_atual) {
        $this->perletivo_atual = $perletivo_atual;
    }



}
