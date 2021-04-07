
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <style type="text/css">
            @import url("estilo.css");
        </style>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Cadastrar</title>
        <script>
            function novo() {
                window.location = 'app.php';
            }
        </script>

    </head>

    <body>
        <div id="titulo">
            <img src="logoieqflowers.png" align=" middle"><br>Cadastro GMM Catedral dos Nobres<br>
        </div>
        <?php
        include ('conexao.php');
        include ('funcoes.php');

        if (isset($_POST["nome"])) {
            $nome = $_POST ["nome"];
            $email = $_POST ["email"];
            $profissao = $_POST ["profissao"];
            $ddd = $_POST ["ddd"];
            $tel = $_POST ["telefone"];
            $dddCel = $_POST ["dddCel"];
            $cel = $_POST ["celular"];
            $endereco = $_POST ["endereco"];
            $cidade = $_POST ["cidade"];
            $estado = $_POST ["estado"];
            $bairro = $_POST ["bairro"];
            $leitura = $_POST ["leitura"];
            $dataNasc = datetoen($_POST["dataNasc"]);
            $cor = $_POST["cor"];
            $flor = $_POST["flor"];
            $genero = $_POST["genero"];
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

// Insere os dados no banco
               // $sql = mysql_query("INSERT INTO usuarios VALUES ('', '" . $nome . "', '" . $email . "', '" . $nome_imagem . "')");

// Se os dados forem inseridos com sucesso

                //Gravando no banco de dados !
                //conectando com o localhost

                if (!$conn) {
                    die("Erro de conexão com localhost, o seguinte erro ocorreu -> " . mysql_error());
                }
                //conectando com a tabela do banco de dados

                if (!$db) {
                    die("Erro de conexão com banco de dados, o seguinte erro ocorreu -> " . mysql_error());
                }
                if ($nome == "") {
                    echo "Campo nome é obrigatório";
                    exit;
                } else {
                    $query = "INSERT INTO `membros` ( `nome` , `email` ,`profissao`,`ddd` ,
                                            `telefone` ,`dddCel` ,`celular`,`dataNasc`,
                                            `endereco` , `cidade` ,`genero`, `estado` , 
                                            `bairro`,`leitura` ,`cor`,`flor`,`hobbies`,`interesses`,foto,`id` ) 
                             VALUES ('$nome' , '$email' , '$profissao' ,'$ddd' ,"
                            . " '$tel' , '$dddCel' ,'$cel' , '$dataNasc' ,"
                            . " '$endereco' , '$cidade','$genero' , '$estado' ,"
                            . " '$bairro' , '$leitura' ,'$cor','$flor','$hobbies','$interesses','".$nome_imagem."', '')";

                    mysql_query($query, $conn);
                    if (mysql_affected_rows($conn) > 0) {
                        echo "<script>alert('Cadastro realizado com sucesso.');</script>";
                        echo "<script>window.location = 'cadastro_listar.php';</script>";
                    } else {
                        echo "<script>alert('Erro ao realizar o cadastro.');</script>";
                        echo "<script>window.location = 'cadastro_listar.php';</script>";
                    }
                }
            
        }
        ?>
        <br/>
        <br/>
        <br/>
        Parabens você realizou com sucesso o cadastro!<br/>
        Escolha as opções que deseja realizar clicando em um dos botões abaixo.<br><br><br>
        <input type="submit" value="Clique para Novo Cadastro" onclick="novo();">
    </body>
</html>