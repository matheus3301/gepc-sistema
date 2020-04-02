<?php

    

    function getAllCampus($conexao){

        $query = $conexao->query("SELECT * FROM tb_campus");

        return $query->fetchAll();

    }


?>