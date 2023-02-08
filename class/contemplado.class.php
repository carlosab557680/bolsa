<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Classe que descreve a tabela contemplado
 *
 * @author fbogila
 */

include_once 'bd/banco.class.php';

class contemplado {

    private $id;
    private $ra;
    private $nome;
    private $valorperc;
    private $perletivo;
    private $idcontrato;
    private $status;
    private $datamodif;
    private $dataaceite;
    private $codcur;
	private $curso;
    
    private $nome_contrato;
    private $nome_curso;
    
    const STATUS_AGUARDANDO = 0;
    const STATUS_ENVIADO_EMAIL = 1;
    const STATUS_CONFIRMADO = 2;
    const STATUS_LANCADO = 3;
    const STATUS_CANCELADO = 4;
    
    function __construct($ra = '', $perletivo = '') {
        $this->ra = $ra;
        $this->perletivo = $perletivo;
        $this->status = 0;
    }
    
    public function getListStatus() {
        return array(
            self::STATUS_AGUARDANDO => 'Em espera',
            self::STATUS_ENVIADO_EMAIL => 'Em confirmação',
            self::STATUS_CONFIRMADO => 'Confirmado',
            self::STATUS_LANCADO => 'Lançado',
            self::STATUS_CANCELADO => 'Cancelado',
        );
    }

    public function select($isstatus = true) {
        $link = banco::con();
        $query = "select * from contemplado where ra like '%$this->ra%' and perletivo = '$this->perletivo';";
        if($isstatus){
            $query = "select * from contemplado where ra like '%$this->ra%' and perletivo = '$this->perletivo' and status < 2;";
        }
             
        $con = banco::con();

        if (function_exists('mssql_connect')) {
            $result = mssql_query($query, $con);
            if (mssql_num_rows($result) > 0) {
                while($row = mssql_fetch_assoc($result)){
                    foreach ($row as $key => $value) {
                        $this->{$key} = $value;
                    }
                }
                mssql_close($link);
                return true;
            }
        } else if (function_exists('sqlsrv_connect')) {
            $opt = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
            $result = sqlsrv_query($con, $query, array(), $opt);
            if (sqlsrv_num_rows($result) >= 0) {
                while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
                    foreach ($row as $key => $value) {
                        $this->{$key} = $value;
                    }
                }
                sqlsrv_close($link);
                return true;
            }
        }
        
        return false;
    }
    /**
     * Seleciona um contemplado através do seu Id
     * @return boolean
     */
    public function selectById() {
        $link = banco::con();
        $query = "select * from contemplado where id = $this->id";
             
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
     * Seleciona todos os registros de contemplado de um aluno em um determinado periodo letivo
     * @return contemplado[]
     */
    public function selectAllByRaPerletivo() {
        $link = banco::con();
		
        $query = "select * from contemplado where ra = '$this->ra' and perletivo = '$this->perletivo'";
		
        $con = banco::con();
        $list = array();
        if (function_exists('mssql_connect')) {
            $result = mssql_query($query, $con);
            if (mssql_num_rows($result) > 0) {
                while($row = mssql_fetch_assoc($result)){
                    $c = new contemplado();
                    foreach ($row as $key => $value) {
                        $col = ucfirst($key);
                        if(method_exists($c, "set$col" )){
                            $c->{"set$col"}($value);
                        }
                    }
                    $list[$row['idcontrato']] = $c;
                }
                mssql_close($link);
            }
        } else if (function_exists('sqlsrv_connect')) {
            $opt = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
            $result = sqlsrv_query($con, $query, array(), $opt);
            if (sqlsrv_num_rows($result) > 0) {
                while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
                    $c = new contemplado();
                    foreach ($row as $key => $value) {
                        $col = ucfirst($key);
                        if(method_exists($c, "set$col" )){
                            $c->{"set$col"}($value);
                        }
                    }
                    $list[$row['idcontrato']] = $c;
                }
                sqlsrv_close($link);
            }
        }
        return $list;
    }
    
    /**
     * Seleciona todos os registros de contemplado de um aluno em um determinado periodo letivo
     * @return contemplado[]
     */
    public function selectContratosAllByRaPerletivo() {
        $link = banco::con();
        $query = "select * from contemplado where ra = '$this->ra' and perletivo = '$this->perletivo'";
        $con = banco::con();
        $list = array();
        if (function_exists('mssql_connect')) {
            $result = mssql_query($query, $con);
            if (mssql_num_rows($result) > 0) {
                while($row = mssql_fetch_assoc($result)){
                    $c = new contemplado();
                    foreach ($row as $key => $value) {
                        $col = ucfirst($key);
                        if(method_exists($c, "set$col" )){
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
                    $c = new contemplado();
                    foreach ($row as $key => $value) {
                        $col = ucfirst($key);
                        if(method_exists($c, "set$col" )){
                            $c->{"set$col"}($value);
                        }
                    }
                    array_push($list, $c);
                }
                sqlsrv_close($link);
            }
        }
        return $list;
    }
    
    public function selectAllByRa() {
        $link = banco::con();
        $query = "select * from contemplado where ra = '$this->ra'";
        $con = banco::con();
        $list = array();
        if (function_exists('mssql_connect')) {
            $result = mssql_query($query, $con);
            if (mssql_num_rows($result) > 0) {
                while($row = mssql_fetch_assoc($result)){
                    $c = new contemplado();
                    foreach ($row as $key => $value) {
                        $col = ucfirst($key);
                        if(method_exists($c, "set$col" )){
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
                    $c = new contemplado();
                    foreach ($row as $key => $value) {
                        $col = ucfirst($key);
                        if(method_exists($c, "set$col" )){
                            $c->{"set$col"}($value);
                        }
                    }
                    array_push($list, $c);
                }
                sqlsrv_close($link);
            }
        }
        return $list;
    }
    
    public function selectAllByPerletivo($idcontrato = '') {
        $link = banco::con();
        $query = "select c.*, s.complemento nome_curso, t.nome nome_contrato from contemplado c
                join lec..vw_curso s on s.id = c.codcur
                join contrato t on t.id = c.idcontrato
                where c.perletivo = '$this->perletivo'";
        
        if($idcontrato != ''){
            $query = "select c.*, a.nome, s.complemento nome_curso, t.nome nome_contrato from contemplado c
            join lec..vw_curso s on s.id = c.codcur
			join lec..vw_aluno a on a.ra = c.ra
            join contrato t on t.id = c.idcontrato
            where c.perletivo = '$this->perletivo' and c.idcontrato = $idcontrato";
        }
        $con = banco::con();
        $list = array();
        if (function_exists('mssql_connect')) {
            mssql_query('SET ANSI_WARNINGS ON; SET ANSI_NULLS ON;');
            $result = mssql_query($query, $con);
            if (mssql_num_rows($result) > 0) {
                while($row = mssql_fetch_assoc($result)){
                    $c = new contemplado();
                    foreach ($row as $key => $value) {
                        $col = ucfirst($key);
                        if(method_exists($c, "set$col" )){
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
                    $c = new contemplado();
                    foreach ($row as $key => $value) {
                        $col = ucfirst($key);
                        if(method_exists($c, "set$col" )){
                            $c->{"set$col"}($value);
                        }
                    }
                    array_push($list, $c);
                }
                sqlsrv_close($link);
            }
        }
        return $list;
    }
    
    /**
     * 
     * @return array Retorna um array com os peridos letivos existentes;
     */
    public function selectAllPerletivo() {
        $link = banco::con();
        $query = "select distinct perletivo from contrato order by perletivo desc;";
        $con = banco::con();
        $list = array();
        if (function_exists('mssql_connect')) {
            $result = mssql_query($query, $con);
            if (mssql_num_rows($result) > 0) {
                while($row = mssql_fetch_assoc($result)){
                    array_push($list, $row);
                }
                mssql_close($link);
            }
        } else if (function_exists('sqlsrv_connect')) {
            $opt = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
            $result = sqlsrv_query($con, $query, array(), $opt);
            if (sqlsrv_num_rows($result) > 0) {
                while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
                    array_push($list, $row);
                }
                sqlsrv_close($link);
            }
        }
        return $list;
    }
    
    /**
     * 
     * @return contemplado[]
     */
    public function selectAll() {
        $link = banco::con();
        $query = "select * from contemplado";
        
        $con = banco::con();
        $list = array();
        if (function_exists('mssql_connect')) {
            $result = mssql_query($query, $con);
            if (mssql_num_rows($result) > 0) {
                while($row = mssql_fetch_assoc($result)){
                    $c = new contemplado();
                    foreach ($row as $key => $value) {
                        $col = ucfirst($key);
                        if(method_exists($c, "set$col" )){
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
                    $c = new contemplado();
                    foreach ($row as $key => $value) {
                        $col = ucfirst($key);
                        if(method_exists($c, "set$col" )){
                            $c->{"set$col"}($value);
                        }
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
        $query = "insert into contemplado (ra, valorperc, perletivo, idcontrato, status, codcur)"
                . "values('$this->ra', $this->valorperc, '$this->perletivo', $this->idcontrato, $this->status, $this->codcur);";
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
        $query = "update contemplado set valorperc = $this->valorperc, perletivo = '$this->perletivo', idcontrato = $this->idcontrato, status = $this->status, datamodif = '$this->datamodif' , dataaceite = '$this->dataaceite', codcur = $this->codcur"
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
            return sqlsrv_errors();
        }
        
        return false;
    }
    
    public function delete(){
        $link = banco::con();
        $query = "delete from contemplado where id = $this->id";
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

    function getRa() {
        return $this->ra;
    }

    function getValorperc() {
        return $this->valorperc;
    }

    function getPerletivo() {
        return $this->perletivo;
    }

    function getIdcontrato() {
        return $this->idcontrato;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setRa($ra) {
        $this->ra = $ra;
    }

    function setValorperc($valorperc) {
        $this->valorperc = $valorperc;
    }

    function setPerletivo($perletivo) {
        $this->perletivo = $perletivo;
    }

    function setIdcontrato($idcontrato) {
        $this->idcontrato = $idcontrato;
    }
    function getStatus() {
        return $this->status;
    }
    function getLabelStatus() {
        switch ($this->status) {
            case 0:
                return 'Em espera';
            case 1:
                return 'Em confirmação';
            case 2:
                return 'Aceito';
            case 3:
                return 'Lançado';
            case 4:
                return 'Cancelado';
            default:
                return 'Sem indentificação';
        }
    }

    function setStatus($status) {
        $this->status = $status;
    }
    function getCodcur() {
        return $this->codcur;
    }

    function setCodcur($codcur) {
        $this->codcur = $codcur;
    }
    function getDatamodif() {
        return $this->datamodif;
    }

    function setDatamodif($datamodif) {
        $this->datamodif = $datamodif;
    }

    function getDataaceite() {
        return $this->dataaceite;
    }

    function setDataaceite($dataaceite) {
        $this->dataaceite = $dataaceite;
    }
    function getNome_contrato() {
        return $this->nome_contrato;
    }

    function getNome_curso() {
        return $this->nome_curso;
    }

    function setNome_contrato($nome_contrato) {
        $this->nome_contrato = $nome_contrato;
    }

    function setNome_curso($nome_curso) {
        $this->nome_curso = $nome_curso;
    }
	
    public function getCurso()
    {
        return $this->curso;
    }
    public function setCurso($curso)
    {
        $this->curso = $curso;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }


}
