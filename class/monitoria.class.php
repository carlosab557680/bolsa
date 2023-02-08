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

class monitoria {
    
    public static function selectProfessorByRa($ra){
        $link = banco::monitoriaCon();
        $query = "select distinct a.ra, a.nome, d.professor from candidato c
                join aluno a on a.id = c.idaluno and c.situacao = 1
                join disciplina d on d.id = c.iddisciplina and d.situacao = 1
                join disciplina_vagas dv on d.id = dv.iddisciplina
                join config g on g.perletivo = dv.perletivo and g.situacao = 1
                where c.perletivo = g.perletivo and a.voluntario = 0
                and ra = '$ra';";
             
        $result = mysqli_query($link, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            return $row;
        }

        return false;
    }
}
