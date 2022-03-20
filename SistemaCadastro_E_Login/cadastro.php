<?php
    $login =$_POST["login"];
    $senha =($_POST["senha"]);
    $connect = mysqli_connect("localhost", "root", "root", "usuarios");
    $query_select = "SELECT username FROM usuarios WHERE username = '$login'";
    $select = mysqli_query($connect, $query_select);
    $array = mysqli_fetch_array($select);
    $logarray = $array['username'];

    if($login =="" AND $login = NULL) {
        echo"<script language='javascript' type='text/javascript'>
        alert('O campo login deve ser preenchido'); window.location.href='cadastro.html';</script>";
    }
    else{
        if($logarray == $login){
            echo "<script language='javascript' type='text/javascript'>
            alert('Esse login ja existe'); window.location.href='cadastro.html';</script>";
            die();
        }
        else{
            $query = "INSERT INTO usuarios (username,senha) VALUES ('$login','$senha')";
            $insert= mysqli_query($connect, $query);

            if($insert){
                echo "<script language='javascript' type='text/javascript'>
                alert('Usuario cadastrado com sucesso'); window.location.href='login.html';</script>";
            }
            else{
                echo "<script language='javascript' type='text/javascript'>
                alert('Nao foi possivel cadastrar esse usuario'); window.location.href='login.html';</script>";
            }
        }
    }
?>