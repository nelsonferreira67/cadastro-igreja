<?php
session_start();
$login = $_POST['login'];
$senha = $_POST['senha'];
$con = mysql_connect("localhost", "root", "") or
        die("Sem conexão com o servidor");
$select = mysql_select_db("cadastroieq") or
        die("Sem acesso ao DB, Entre em contato com o Administrador, gilson_sales@bytecode.com.br");
$result = mysql_query("SELECT * FROM `USUARIO` WHERE `NOME` = '$login' AND `SENHA`= '$senha'");
if (mysql_num_rows($result) > 0) {
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
     echo "<script>alert('Login realizado com sucesso.');</script>";
     //echo "<script>window.location = 'app.php';</script>";
     header("Location:app.php");
} else {
    echo "<script>alert('Login ou senha errados.');</script>";
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    echo "<script>window.location = 'form_login.php';</script>";
    
}
