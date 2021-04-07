<?php
include ("conexao.php");

if (!$conn) {
    die("Erro de conexão com localhost, o seguinte erro ocorreu -> " . mysql_error());
}
if (!$db) {
    die("Erro de conexão com banco de dados, o seguinte erro ocorreu -> " . mysql_error());
}
if (is_numeric($_GET["id"])) {
    $query = "DELETE FROM membros WHERE id = " . $_GET["id"];
    mysql_query($query, $conn);

    if (mysql_affected_rows($conn) > 0) {
        echo "<script>alert('Dados apagados com sucesso!');</script>";
        echo "<script>window.location = 'cadastro_listar.php';</script>";
    }
}