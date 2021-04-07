<?php

include ("conexao.php");
include ("funcoes.php");

if (isset($_POST["nome"])) {

    $nome = $_POST ['nome'];
    $email = $_POST ['email'];
    $profissao = $_POST ['profissao'];
    $ddd = $_POST ["ddd"];
    $tel = $_POST ["telefone"];
    $dddCel = $_POST ["dddCel"];
    $cel = $_POST ["celular"];
    $endereco = $_POST ["endereco"];
    $cidade = $_POST ["cidade"];
    $estado = $_POST ["estado"];
    $bairro = $_POST ["bairro"];
    $leitura = $_POST ["leitura"];
    $genero = $_POST ["genero"];
    $dataNasc = datetoen($_POST ["dataNasc"]);
    $cor = $_POST["cor"];
    $flor = $_POST["flor"];
    $hobbies = $_POST["hobbies"];
    $interesses = $_POST["interesses"];
    $foto = $_FILES["foto"];
    
    // Largura máxima em pixels
                $largura = 2000;
// Altura máxima em pixels
                $altura = 2000;
// Tamanho máximo do arquivo em bytes
                $tamanho = 100000;

// Verifica se o arquivo é uma imagem
//if(!preg_match_all("/^image/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
//error[1] = "Isso não é uma imagem.";
//} 
// Pega as dimensões da imagem
                $dimensoes = getimagesize($foto["tmp_name"]);

// Verifica se a largura da imagem é maior que a largura permitida
                if ($dimensoes[0] > $largura) {
                    $error[2] = "A largura da imagem não deve ultrapassar " . $largura . " pixels";
                }

// Verifica se a altura da imagem é maior que a altura permitida
                if ($dimensoes[1] > $altura) {
                    $error[3] = "Altura da imagem não deve ultrapassar " . $altura . " pixels";
                }

// Verifica se o tamanho da imagem é maior que o tamanho permitido
                if ($foto["size"] > $tamanho) {
                    $error[4] = "A imagem deve ter no máximo " . $tamanho . " bytes";
                }

// Se não houver nenhum erro
// Pega extensão da imagem
                preg_match("/.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);

// Gera um nome único para a imagem
                $nome_imagem = md5(uniqid(time())) . "." . $ext[1];

// Caminho de onde ficará a imagem
                $caminho_imagem = "fotos/" . $nome_imagem;

// Faz o upload da imagem para seu respectivo caminho
                move_uploaded_file($foto["tmp_name"], $caminho_imagem);

    
    
    
    if (($nome == "") || ($email == "")) {
        echo "Preencha as informações corretamente.";
        exit;
    } else {
        $SQL = " UPDATE membros SET nome = '" . $nome . "', email = '" . $email . "', profissao = '" . $profissao . "' ";
        $SQL.= ", ddd = '" . $ddd . "', telefone = '" . $tel . "', dddCel = '" . $dddCel . "',celular ='" . $cel . "'";
        $SQL.= ", endereco = '" . $endereco . "', cidade = '" . $cidade . "', estado = '" . $estado . "'";
        $SQL.= ",bairro = '" . $bairro . "',genero = '" . $genero . "', leitura = '" . $leitura . "'";
        $SQL.= ", dataNasc = '" . $dataNasc . "',cor = '" . $cor . "',flor = '" . $flor . "'";
        $SQL.= ", hobbies = '" . $hobbies . "',interesses = '" . $interesses . "', foto = '" . $nome_imagem . "' WHERE id = " . $_GET["id"];

        $query = mysql_query($SQL);

        if (mysql_affected_rows($conn) > 0) {
            echo "<script>alert('Cadastro atualizado com sucesso.');</script>";
            echo "<script>window.location = 'cadastro_listar.php';</script>";
        } else {
            echo "<script>alert('Erro ao atualizar o cadastro.');</script>";
            echo "<script>window.location = 'cadastro_listar.php';</script>";
        }
    }
}
?>  









