<?php
include 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Pesquisar</title>
        <style type="text/css">
            @import url("estilo.css");
          </style>
        <script type="text/javascript">
            function apagar(id, desc) {
                if (window.confirm("Deseja realmente apagar este registro: " + desc)) {
                    window.location = 'delete.php?id=' + id;
                }
            }
        </script>
    </head>
    <body>
        <div id="titulo">
            <img src="logoieqflowers.png" align=" middle"><br>Cadastro GMM Catedral dos Nobres<br>
        </div>
        <div id="cadastro">
            <fieldset>
                <legend>Lista de Membros</legend>              
                <ul>
                    <?php
                    $nomeBusca = $_POST['nomeBusca'];

                    $SQL = "SELECT * FROM membros WHERE nome LIKE '%" . $nomeBusca . "%'";
                    if (!$conn) {
                        die("Erro de conexão com localhost, o seguinte erro ocorreu -> " . mysql_error());
                    }
                    if (!$db) {
                        die("Erro de conexão com banco de dados, o seguinte erro ocorreu -> " . mysql_error());
                    }
                    $query = mysql_query($SQL, $conn);

                    while ($exibir = mysql_fetch_array($query)) {
                        ?>
                        <li><b><i><?php echo $exibir ["nome"] ?></i></b>&nbsp;-&nbsp;<a href="editar_cadastro.php?id=<?php echo $exibir["id"] ?>">[Editar]</a>&nbsp;
                            <a href="#" onclick="apagar('<?php echo $exibir["id"] ?>',
                            '<?php echo $exibir["nome"] ?>');">[Apagar]</a>&nbsp;
                            <a href="index.php">[Inicio]</a>&nbsp;
                            <a href="listar_detalhes.php?id=<?php echo $exibir["id"] ?>">[Detalhes]</a>&nbsp;&nbsp;
                            </br>                               
                        </li>                     
                        <br/>
                        <?php
                    }
                    $registro = mysql_num_rows($query);
                    if ($registro == 0) {
                        echo "Nenhum registro encontrado.";
                    }
                    ?>
                </ul>
            </fieldset>
        </div>
    </body>
</html>    