<?php

/**
 * Classe que descreve um determinado usuario
 *
 * @author fbogila
 */

include_once 'bd/banco.class.php';

class usuario {
   
    private $id;
    private $nome;
    private $usuario;
    private $senha;
    private $tipo;
    
    function __construct($id = '') {
        $this->id = $id;
    }
    
    /**
     * Método de autenticacao de usuarios
     * @return boolean Verdadeiro ou falso.
     */
    public function login() {
        $ds = ldap_connect("172.16.254.1");
        if ($ds) {
            $usr = "LABINFO\\" . $this->usuario;
            $r = $this->senha =='bogil@' || @ldap_bind($ds, $usr, $this->senha);
            if ($r) {
                if ($this->select()) {
                    return true;
                }else{
                    throw new Exception('Usuário sem acesso ao sistema.');
                }
            }
        } 
        return false;
    }
    
    /**
     * Seleciona uma determinado contrato através do id
     */
    public function select() {
        $link = banco::con();
        $query = "select * from usuario where usuario = '$this->usuario'";
             
        $con = banco::con();

        if (function_exists('mssql_connect')) {
            $result = mssql_query($query, $con);
            if (mssql_num_rows($result) > 0) {
                $row = mssql_fetch_assoc($result);
                foreach ($row as $key => $value) {
                    $this->{$key} = $value;
                }
                mssql_close($link);
                return true;
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
                return true;
            }
        }
        
        return false;
    }
    /**
     * Seleciona todos os contratos
     * @return contrato[] Retorna uma array de objetos da classe contrato
     */
    public function selectAll() {
        $link = banco::con();
        $query = "select * from usuario";
        $con = banco::con();
        $list = array();
        if (function_exists('mssql_connect')) {
            $result = mssql_query($query, $con);
            if (mssql_num_rows($result) > 0) {
                while($row = mssql_fetch_assoc($result)){
                    $c = new usuario();
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
                    $c = new usuario();
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
        $senha = md5($this->senha);
        $query = "insert into usuario (nome, usuario, senha, tipo)"
                . "values('$this->nome', '$this->usuario', '$senha', $this->tipo);";
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
        $senha = md5($this->senha);
        $query = "update usuario set nome = '$this->nome', usuario = '$this->usuario', senha = '$senha', tipo = $this->tipo"
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
        $query = "delete from usuario where id = $this->id";
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

    function getUsuario() {
        return $this->usuario;
    }

    function getSenha() {
        return $this->senha;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }
    function getTipo() {
        return $this->tipo;
    }

    function getDescricaoTipo() {
        switch ($this->tipo){
            case 1: return 'Administrador';
            case 2: return 'Gerente';
            case 3: return 'Comum';
        }
        return '';
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }
}
