<?php

    if(isset($_GET['op']) && $_GET['op']=='login'){
        require '../config/database.php';    
        
        $email = $_POST['email'];
        $senha = $_POST['password'];

        $query = $conexao->query("SELECT idtb_user,nome,email,aprovado, tipo FROM tb_user WHERE email = '$email' AND senha = '$senha'");

        $fetch = $query->fetch();
        if(!is_array($fetch)){
            echo "Usuário ou Senha incorretos";
        }else{
            if($fetch[3] == 0){
                echo 'O seu cadastro ainda não foi aprovado, aguarde o email de confirmação...';
            }else{

                if($fetch[3] == -1){
                    echo 'O seu cadastro foi recusado, caso tenha ocorrido algum mal entendido, contatar gepcufc@gmail.com';
                   
                }else{
                    session_start();  
                    $_SESSION['nome'] = $fetch[1];
                    $_SESSION['login'] = $fetch[2];
                    $_SESSION['id'] = $fetch[0];
                    $_SESSION['tipo'] = $fetch[4];

                    
                    $conexao->query("UPDATE tb_user SET ultimo_login = null WHERE idtb_user = $fetch[0]");

                    echo "true";
                }
               
            }
            
        }
    }

    if(isset($_GET['op']) && $_GET['op'] == "logout"){

        require '../config/database.php';    
        
        session_start();  
        unset($_SESSION['nome']);
        unset($_SESSION['login']);
        unset($_SESSION['id']);
        unset($_SESSION['tipo']);

        

        header("location:../index.php?op=logout");


    }

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

    if(isset($_GET['op']) && $_GET['op'] == "updateimage"){
        session_start(); 
        
        $id = $_SESSION['id'];
        
        require '../config/database.php';
        require '../include/corrigeimagem.php';

        
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {
            $file_name = random_bytes(30);
            $arquivo = $_FILES['file'];
            $file_exploded = explode('.', $arquivo['name']);
            $file_ext = $file_exploded[count($file_exploded) - 1];
            $src_file = "uploads/img/" . bin2hex($file_name) . "." . $file_ext;
            
            if(move_uploaded_file($arquivo['tmp_name'], "../".$src_file)){
                $conexao->query("UPDATE tb_user SET img = '$src_file' WHERE idtb_user = $id");       
                echo "true";
            }else{
                echo "false";
            }
            
            
        }     


    }

    

    function getUser($id,$conexao){

        $query = $conexao->query("SELECT *, tb_campus_idtb_campus AS campus FROM tb_user WHERE idtb_user = $id");

        return $query->fetch();

    }

?>