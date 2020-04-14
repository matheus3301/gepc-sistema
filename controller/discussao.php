<?php

    
    if(isset($_GET['op']) && $_GET['op'] == "update"){
        session_start();  
        require '../config/database.php';
                      
        $id = $_SESSION['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $curso = $_POST['curso'];
        $campus = $_POST['campus'];
        $biografia = $_POST['biografia'];

        $sql = "UPDATE tb_user SET nome = ?, email = ?, curso = ?, tb_campus_idtb_campus = ?, biografia = ? WHERE idtb_user = ?";
        $stmt = $conexao->prepare($sql);
        $result = $stmt->execute([$nome,$email,$curso,$campus,$biografia,$id]);

        print_r($result);




        


    }

    if(isset($_GET['op']) && $_GET['op'] == "create"){
        require '../config/database.php';
                      
        $nome = $_POST['nome'];
        $matricula = $_POST['matricula'];
        $email = $_POST['email'];
        $curso = $_POST['curso'];
        $campus = $_POST['campus'];
        $senha = $_POST['senha'];


        $sql = "INSERT INTO tb_user(nome,email,senha,matricula,curso,tb_campus_idtb_campus,aprovado,tipo) VALUES(?,?,?,?,?,?,0,'membro')";
        $stmt = $conexao->prepare($sql);
        $result = $stmt->execute([$nome,$email,$senha,$matricula,$curso,$campus]);

        print_r($result);




        


    }

    

    

    function getDiscussao($id,$conexao){

        $query = $conexao->query("SELECT *, tb_campus_idtb_campus AS campus FROM tb_user WHERE idtb_user = $id");

        return $query->fetch();

    }

?>