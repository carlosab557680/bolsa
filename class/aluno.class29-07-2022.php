<?php

/**
 * Classe que descreve os dados de um aluno
 *
 * @author fbogila
 */

include_once 'class/bd/banco.class.php';

class aluno {
    private $ra;
    private $nome;
	private $nomec;
    private $rg;
    private $cpf;
    private $perletivo;
    private $codcur;
    private $nomecurso;
    private $codper;
    private $grade;
    private $valorprincipal;
    private $estoquedp;
    private $email;
    private $erro;
    private $valorcredito;
    private $logradouro;
    private $numero;
    private $bairro;
    private $cidade;
    private $cep;
    
    function __construct($ra = '', $perletivo = '', $codcur = '') {
        $this->ra = $ra;
        $this->perletivo = $perletivo;
        $this->codcur = $codcur;
        //$this->valorcredito = 64.5;
        $this->selectDados();
    }

    public function select() {
        $con = banco::con();
  
        if (function_exists('mssql_connect')) {
            
            mssql_query('SET ANSI_WARNINGS ON; SET ANSI_NULLS ON;');
            $procedure = mssql_init('uspdadosalunoNew', $con);
			


            mssql_bind($procedure, "@ra", $this->ra, SQLVARCHAR, false, false);
            mssql_bind($procedure, "@perletivo", $this->perletivo, SQLVARCHAR, false, false);
            mssql_bind($procedure, "@codcur", $this->codcur, SQLVARCHAR, false, false);
            mssql_bind($procedure, "@VALORCREDITO", $this->valorcredito, SQLVARCHAR, false, false);

            $result = mssql_execute($procedure);
            if($result){
                $row = mssql_fetch_assoc($result);
                foreach ($row as $key => $value) {
                    $this->{$key} = $value;
                }
                mssql_close($con);
                return true;
            }
            mssql_close($con);
            return false;
            
        } else if (function_exists('sqlsrv_connect')) {
			
			/////// continua Carlos 19-07-2022 ///////
			
            $query = "{call uspdadosalunoNew( ?, ?, ?, ? )}";
			
			
			
            $params = array( 
                array($this->ra,SQLSRV_PARAM_IN), 
                array($this->perletivo, SQLSRV_PARAM_IN),  
                array($this->codcur, SQLSRV_PARAM_IN),
                array($this->valorcredito, SQLSRV_PARAM_IN)
            );
			
            $result = sqlsrv_query($con, $query, $params);
            if($result){
                $row = sqlsrv_fetch_object($result);
                foreach ($row as $key => $value) {
                    $this->{$key} = $value;
                }
                
                sqlsrv_close($con);
                return true;
            }
            sqlsrv_close($con);
            return false;
        }
        
        return false;
    }
    
    public function selectRM() {

        $query = "select top 1 a.matricula ra, a.nome, a.cedident rg, a.cpfaluno cpf, a.telaluno telefone, a.celaluno celular, a.email, 
        s.codcur, s.segundonome curso, c.codper, t.descturno periodo, m.periodo semestre, m.perletivo, c.cr,
        (select sum(a.percdesc) percbolsa from etipobols a 
                join ealubolsa b on b.codbol = a.codbolsa 
                and b.mataluno = '$this->ra' 
                and b.perletivo = '$this->perletivo' 
                group by b.mataluno, b.perletivo) as percbolsa
        from ealunos a
        join ualucurso c on c.mataluno = a.matricula
        join umatricpl m on m.mataluno = a.matricula
        join eturnos t on t.codturno = c.codtun
        join ucursos s on s.codcur = c.codcur
        where a.matricula = '$this->ra' and m.perletivo = '$this->perletivo'
        order by m.perletivo desc;";
        
        $query = "select SALUNO.RA ra, PPESSOA.NOME nome, PPESSOA.CARTIDENTIDADE rg, PPESSOA.CPF cpf, PPESSOA.TELEFONE1 telefone,
                PPESSOA.TELEFONE2 celular, PPESSOA.email, 
				C.NOME nomec, C.CODCURSO codcur, C.COMPLEMENTO curso, C.COMPLEMENTO nomecurso, T.NOME periodo, M.PERIODO semestre, PL.CODPERLET perletivo, HA.CR cr,
                (
                        SELECT SUM(VALOR) percbolsa FROM SBOLSA B 
                        JOIN SBOLSAALUNO BA ON B.CODBOLSA = BA.CODBOLSA
                        JOIN SPLETIVO PL ON PL.IDPERLET = BA.IDPERLET
                        AND PL.CODPERLET = '$this->perletivo'
                        WHERE BA.RA = SALUNO.RA
                ) percbolsa

                FROM SALUNO (nolock) 
                JOIN PPESSOA (nolock) on SALUNO.CODPESSOA = PPESSOA.CODIGO
                JOIN SHABILITACAOALUNO HA (NOLOCK) ON HA.RA = SALUNO.RA
                AND SALUNO.CODCOLIGADA = HA.CODCOLIGADA
                JOIN SHABILITACAOFILIAL HF(NOLOCK) ON HF.IDHABILITACAOFILIAL = HA.IDHABILITACAOFILIAL
                JOIN SCURSO C (NOLOCK) ON C.CODCOLIGADA = HF.CODCOLIGADA AND C.CODCURSO = HF.CODCURSO
                --AND HA.CODSTATUS in (1,17,33)
                JOIN SMATRICPL M (NOLOCK) ON M.CODCOLIGADA = SALUNO.CODCOLIGADA
                AND M.IDHABILITACAOFILIAL = HF.IDHABILITACAOFILIAL
                AND M.RA = SALUNO.RA
                JOIN SPLETIVO PL (NOLOCK) ON PL.IDPERLET = M.IDPERLET
                AND PL.CODPERLET = '$this->perletivo'
                JOIN STURNO T ON T.CODTURNO = HF.CODTURNO
                WHERE saluno.RA = '$this->ra';";
             
        $con = banco::rmcon();

        if (function_exists('mssql_connect')) {
            
            $result = mssql_query($query, $con);
            if (mssql_num_rows($result) > 0) {
                $row = mssql_fetch_assoc($result);
                foreach ($row as $key => $value) {
                    if(method_exists($this, "set$key")){
                        $this->{$key} = $value;
                    }
                }
                //$this->selectCR_RM();
                return true;
            }
        } else if (function_exists('sqlsrv_connect')) {
            $opt = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
            $result = sqlsrv_query($con, $query, array(), $opt);
            if (sqlsrv_num_rows($result) > 0) {
                $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
                foreach ($row as $key => $value) {
                    if(method_exists($this, "set$key")){
                        $this->{$key} = $value;
                    }
                }
                //$this->selectCR_RM();
                return true;
            }
        }
        return false;
    }

    public function selectDados()
    {
        $ra = $this->ra;
        $query = "SELECT logradouro,numero,bairro,cidade,cep FROM lec..vw_aluno_compl WHERE ra = '$ra'";

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
                while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){                    
                    foreach ($row as $key => $value) {
                        $this->{$key} = $value;
                    }
                }
                sqlsrv_close($con); 
            } 
        }
    }
    
    
    function getRa() {
        return $this->ra;
    }

    function getRg() {
        return $this->rg;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getPerletivo() {
        return $this->perletivo;
    }

    function getCodcur() {
        return $this->codcur;
    }

    function getCodper() {
        return $this->codper;
    }

    function getGrade() {
        return $this->grade;
    }

    function getValorprincipal() {
        return $this->valorprincipal;
    }

    function getLogradouro() {
        return $this->logradouro;
    }

    function getNumero() {
        return $this->numero;
    }

    function getBairro() {
        return $this->bairro;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getCep() {
        return $this->cep;
    }

    function setRa($ra) {
        $this->ra = $ra;
    }

    function setRg($rg) {
        $this->rg = $rg;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setPerletivo($perletivo) {
        $this->perletivo = $perletivo;
    }

    function setCodcur($codcur) {
        $this->codcur = $codcur;
    }

    function setCodper($codper) {
        $this->codper = $codper;
    }

    function setGrade($grade) {
        $this->grade = $grade;
    }

    function setValorprincipal($valorprincipal) {
        $this->valorprincipal = $valorprincipal;
    }
    function getErro() {
        return $this->erro;
    }

    function setErro($erro) {
        $this->erro = $erro;
    }
	
    function getNome() {
        return $this->nome;
    }
    function setNome($nome) {
        $this->nome = $nome;
    }
	
	function getNomec() {
        return $this->nomec;
    }
    function setNomec($nomec) {
        $this->nomec = $nomec;
    }
	
	
    function getEstoquedp() {
        return $this->estoquedp;
    }

    function setEstoquedp($estoquedp) {
        $this->estoquedp = $estoquedp;
    }


    function getNomecurso() {
        return $this->nomecurso;
    }
    function setNomecurso($nomecurso) {
        $this->nomecurso = $nomecurso;
    }
    function getEmail() {
        return $this->email;
    }

    function setEmail($email) {
        $this->email = $email;
    }
    function getValorcredito() {
        return $this->valorcredito;
    }

    function setValorcredito($valorcredito) {
        $this->valorcredito = $valorcredito;
    }

    function setLogradouro($logradouro) {
        $this->logradouro = $logradouro;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setCep($cep) {
        $this->cep = $cep;
    }


}
