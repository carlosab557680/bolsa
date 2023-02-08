<?php

include_once 'bd/banco.class.php';

class bolsa{

    private $id;
    private $bolsa;
    private $status;

    public function __construct($id = '') {
        $this->id = $id;
    }
    
    function getId() {
        return $this->id;
    }
    function setId($id) {
        $this->id = $id;
    }
    
    function getBolsa() {
        return $this->bolsa;
    }
    function setBolsa($bolsa) {
        $this->bolsa = $bolsa;
    }

    function getStatus() {
        return $this->status;
    }
    function setStatus($status) {
        $this->status = $status;
    }

    function setAtributos($array_post){
        foreach ($array_post as $key => $value) {
            $this->{$key} = $value;
        }
    }

    public function tipoBolsa(){
        
        $query = "select * from tipo_bolsa";
                
        $con = banco::con();
        $list =  array();
        if (function_exists('mssql_connect')) {
            $result = mssql_query($query, $con);
            if (mssql_num_rows($result) > 0) {
                while($row = mssql_fetch_assoc($result)){
                    $c = new bolsa();
                    foreach ($row as $key => $value) {
                        $col = ucfirst($key);
                        $c->{"set$col"}($value);
                    }
                    array_push($list, $c);
                }
                mssql_close($con);
            } 
        } else if (function_exists('sqlsrv_connect')) {
            $opt = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
            $result = sqlsrv_query($con, $query, array(), $opt);
            if (sqlsrv_num_rows($result) > 0) {
                while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
                    $c = new bolsa();
                    foreach ($row as $key => $value) {
                        $col = ucfirst($key);
                        $c->{"set$col"}($value);
                    }
                    array_push($list, $c);
                }
                sqlsrv_close($con);
            }
        }

        return $list;
    }

    public function selectBolsaId($tipo) {

        $query = "select bolsa from tipo_bolsa where id = '$tipo'";
             
        $con = banco::con();

        if (function_exists('mssql_connect')) {
            $result = mssql_query($query, $con);
            if (mssql_num_rows($result) > 0) {
                $row = mssql_fetch_assoc($result);
                foreach ($row as $key => $value) {
                    $this->{$key} = $value;
                }
                mssql_close($con);
            }
        } else if (function_exists('sqlsrv_connect')) {
            $opt = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
            $result = sqlsrv_query($con, $query, array(), $opt);
            if (sqlsrv_num_rows($result) > 0) {
                $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
                foreach ($row as $key => $value) {
                    $this->{$key} = $value;
                }
                sqlsrv_close($con);
            }
        }
        return $this->{$key};
    }
}

?>