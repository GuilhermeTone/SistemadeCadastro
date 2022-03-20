<?php
    $login= $_POST['login'];
    $senha = $_POST['senha'];
    $entrar = $_POST['entrar'];
    $connect = mysqli_connect("localhost", "root", "root", "usuarios");
    
    if(isset($entrar)){
        $verifica = mysqli_query($connect,"SELECT * FROM usuarios WHERE username ='$login' AND senha = '$senha'") or die("erro ao selecionar");
        if(mysqli_num_rows($verifica)<=0){
            echo"<script language='javascript' type='text/javascript'>
            alert('Login e/ou senha incorretos');window.location
            .href='login.html';</script>";
            die();
        }
        else{
            setcookie("login",$login);
            header("Location:index.php");
        }
    }

?>