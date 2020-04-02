<?php

    if(isset($_GET['op']) && $_GET['op']=='login'){
        require '../config/database.php';    
        
        $email = $_POST['email'];
        $senha = $_POST['password'];

        $query = $conexao->query("SELECT idtb_user,nome,email,aprovado FROM tb_user WHERE email = '$email' AND senha = '$senha'");

        $fetch = $query->fetch();
        if(!is_array($fetch)){
            echo "Usuário ou Senha incorretos";
        }else{
            if($fetch[3] == 0){
                echo 'O seu cadastro ainda não foi aprovado, aguarde o email de confirmação...';
            }else{

                if($fetch[3] == -1){
                    echo 'O seu cadastro ainda não foi recusado, caso tenha ocorrido algum mal entendido, contatar gepcufc@gmail.com';
                   
                }else{
                    session_start();  
                    $_SESSION['nome'] = $fetch[1];
                    $_SESSION['login'] = $fetch[2];
                    $_SESSION['id'] = $fetch[0];
                    
                    $conexao->query("UPDATE tb_user SET ultimo_login = null WHERE idtb_user = $fetch[0]");

                    echo "true";
                }
               
            }
            
        }
    }

    if(isset($_GET['op']) && $_GET['op'] == "logout"){

        require '../config/database.php';    

        unset($_SESSION['nome']);
        unset($_SESSION['login']);
        unset($_SESSION['id']);

        header("location:../index.php?op=logout");


    }

    function getUser($id,$conexao){

        $query = $conexao->query("SELECT tb_user.*, tb_campus.idtb_campus AS campus FROM tb_user INNER JOIN tb_campus ON tb_campus.idtb_campus = tb_user.tb_campus_idtb_campus");

        return $query->fetch();

    }

?>