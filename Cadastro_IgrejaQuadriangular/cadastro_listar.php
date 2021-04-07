<?php
include 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Lista de Membros </title>
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
            <img src="logoieqflowers.png" align=" middle">
        </div>
        <div id="cadastro">
            <br>
             <br>
            <fieldset>
                <center><legend font-size="16"><b>Lista de Membros</b></legend>
                  <br/><br/>
                <a href="app.php">[Pagina Inicial]</a></center>
                <br/><br/>
                <ul>
                    <?php
                    
                    $SQL = "SELECT * FROM membros ORDER BY nome ASC";
                    if (!$conn) {
                        die("Erro de conexão com localhost, o seguinte erro ocorreu -> " . mysql_error());
                    }
                    if (!$db) {
                        die("Erro de conexão com banco de dados, o seguinte erro ocorreu -> " . mysql_error());
                    }
                    $query = mysql_query($SQL, $conn);
                   
                   
                          
                    while ($exibir = mysql_fetch_array($query)) { 
                        ?>
                        <li><b>ID:&nbsp;<?php echo $exibir ["id"] ?></b>&nbsp;=>&nbsp;<?php echo $exibir ["nome"] ?>&nbsp;&nbsp;
                       
                        <a href="listar_detalhes.php?id=<?php echo $exibir["id"] ?>">[Detalhes]</a>&nbsp;&nbsp;
                        </br>                   
                        </li>
                       
                    <br/>
                        <?php
                    }
                    ?>
                </ul>
            </fieldset>
        </div>
    </body>
</html>    