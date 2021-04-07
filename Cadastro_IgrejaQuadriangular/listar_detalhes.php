
<!DOCTYPE html">
<html lang="pt-BR">
    <head>
        <style type="text/css">
            @import url("estilo.css");
        </style>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Detalhes</title>
        <script type="text/javascript">
            function apagar(id, desc) {
                if (window.confirm("Deseja realmente apagar este registro: " + desc)) {
                    window.location = 'delete.php?id=' + id;
                }
            }
        </script>
    </head>
    <body>
        <center>
        <div id="titulo">

            <img src="logoieqflowers.png" align=" middle">
           
        </div>
        <div id="cadastro">

            <table>
                <tr>   
                    <td width="50%"  valign="top">
                        <fieldset>
                            <legend><b>Detalhes</b></legend>
                            <ul>
                                <?php
                                include 'conexao.php';
                                include 'funcoes.php';

                                $id = $_GET ['id'];
                                $SQL = "SELECT * FROM membros WHERE id = '" . $id . "'";
                                if (!$conn) {
                                    die("Erro de conexão com localhost, o seguinte erro ocorreu -> " . mysql_error());
                                }
                                if (!$db) {
                                    die("Erro de conexão com banco de dados, o seguinte erro ocorreu -> " . mysql_error());
                                }
                                $query = mysql_query($SQL, $conn);
                                while ($exibir = mysql_fetch_array($query)) {
                                    ?>

                                    <li><b><?php echo $exibir ["nome"] ?></b>&nbsp;-&nbsp;<a href="editar_cadastro.php?id=<?php echo $exibir["id"] ?>">[Editar]</a>&nbsp;
                                        <a href="index.php">[Inicio]</a>&nbsp;<a href="#" onclick="apagar('<?php echo $exibir["id"] ?>',
                                                        '<?php echo $exibir["nome"] ?>');">[Apagar]</a><br/>
                                        <b>ID:&nbsp;</b><?php echo $exibir["id"] ?><br/> 
                                        <b>Email:&nbsp;</b><?php echo $exibir["email"] ?><br/> 
                                        <b>Profissão:&nbsp;</b><?php echo $exibir["profissao"] ?><br/>
                                        <b>Telefone:&nbsp;</b>(<?php echo $exibir["ddd"] ?>)&nbsp;<?php echo $exibir["telefone"] ?><br/> 
                                        <b>Celular:&nbsp;</b>(<?php echo $exibir["dddCel"] ?>)&nbsp;<?php echo $exibir["celular"] ?><br/>                           
                                        <b>Data de Nascimento:&nbsp;</b><?php echo datetobr($exibir["dataNasc"]) ?><br/>
                                        <b>Endereço:&nbsp;</b><?php echo $exibir["endereco"] ?><br/>
                                        <b>Cidade:&nbsp;</b><?php echo $exibir["cidade"] ?><br/> 
                                        <b>Bairro:&nbsp;</b><?php echo $exibir["bairro"] ?><br/>
                                        <b>Estado:&nbsp;</b><?php echo $exibir["estado"] ?><br/>
                                        <b>Cor:&nbsp;</b><?php echo $exibir["cor"] ?><br/>
                                        <b>Flor:&nbsp;</b><?php echo $exibir["flor"] ?><br/>
                                        <b>Lê com frequência:&nbsp;</b><?php echo $exibir["leitura"] ?><br/>
                                        <b>Gênero:&nbsp;</b><?php echo $exibir["genero"] ?><br/>
                                        <b>Hobbies:&nbsp;</b><?php echo $exibir["hobbies"] ?><br/>
                                        <b>Interesses:&nbsp;</b><?php echo $exibir["interesses"] ?><br/>
                                    </li>
                                    </td>
                                    <td width="50%" valign="top">
                                        <br><br>
                                            <center><img src='fotos/<?php echo $exibir ["foto"] ?>'><br><br>
                                                <label><?php echo $exibir ["nome"] ?></label><br><br><br>
                                                 <a href="cadastro_listar.php">[Voltar]</a>
                                            </center><br>
                                             
                                    </td>
                                    <br/>
                                    <?php
                                }
                                ?>
                            </ul>
                        </fieldset>
            </table>
        </div>
            </center>
    </body>
</html>    