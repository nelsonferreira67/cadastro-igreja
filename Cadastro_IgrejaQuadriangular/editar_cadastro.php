<?php
include ("conexao.php");
include ("funcoes.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Bem Vindo ao Cadastro de Membros GMM</title>
        <style type="text/css">
            @import url("estilo.css");
        </style>
        <script type="text/javascript">

            if (document.cadastro.nome.value === "")
            {
                alert("O Campo nome é obrigatório!");
            }
            if (document.cadastro.dataNasc.value === "")
            {
                alert("O Campo data de nascimento é obrigatório!");
            }
            if (document.cadastro.telefone.value === "")
            {
                alert("O Campo telefone é obrigatório!");
            }
            if (document.cadastro.celular.value === "")
            {
                alert("O Campo celular é obrigatório!");

            }
            
            function listarMembros() {
                window.location = 'cadastro_listar.php';
            }
            function buscarMembros() {
                window.location = 'form_busca.html';
            }
            function mask_date(field) {
                if (document.getElementById(field).value.length == 2) {
                    document.getElementById(field).value = document.getElementById(field).value + "/";
                }
                if (document.getElementById(field).value.length == 5) {
                    document.getElementById(field).value = document.getElementById(field).value + "/";
                }
            }
            function mostrarGenero() {
                document.getElementById("divGenero").style.visibility = "visible";
            }
            function ocultarGenero() {
                document.getElementById("divGenero").style.visibility = "hidden";
            }
            function mask_fone(field) {
                if (document.getElementById(field).value.length == 4) {
                    document.getElementById(field).value = document.getElementById(field).value + "-";
                }
            }
            function mask_cel(field) {
                if (document.getElementById(field).value.length == 5) {
                    document.getElementById(field).value = document.getElementById(field).value + "-";
                }
            }
            function confir_envio() {
                if (confirm('Atualizar formulário?')) {
                    document.cadastro.submit();
                }
            }
            
        </script>
    </head>
    <body>
        <?php
        if (isset($_GET["id"])) {
            if (is_numeric($_GET["id"])) {
                $SQL = "SELECT * FROM membros WHERE id = " . $_GET["id"];
                $executa = mysql_query($SQL, $conn);
                $resultado = mysql_fetch_array($executa);
                ?>
                <form id="cadastro" name="cadastro" enctype="multipart/form-data" method="POST" action="atualizar_cadastro.php?id=<?php echo $_GET["id"]; ?>" onsubmit="return validaCampo();" onload="mudaCor();">
                    <div id="titulo">
                        <img src="logoieqflowers.png" align=" middle"><br><b><p id="cabecalho">Cadastro GMM - Catedral dos Nobres</p></b>         
                    </div>                   
                    <br>
                    <center><label>Trocar foto:</label><input type="file" name="foto" id="imagemfoto" /></center>
                    <center>
                        <table>       
                            <tr>   
                                <td width="50%"  valign="top">
                                    <fieldset id="primeiro"> 
                                        <br>
                                        <legend><b>Dados Pessoais</b></legend>
                                        <!--NOME-->
                                        <label>Nome:</label>                           
                                        <input type="text" name="nome"  id="nome" value="<?php echo $resultado["nome"]; ?>" size="60" maxlength="60"/>                            
                                        <br/><br/>
                                        <!--EMAIL-->
                                        <label>Email:</label>                           
                                        <input type="text" name="email"  id="email" value="<?php echo $resultado["email"]; ?>" size="60" maxlength="60" placeholder="endereço@email.com........."/>
                                        <span class="style1"></span>
                                        <br/><br/>
                                        <!--DATA DE NASCIMENTO-->
                                        <label>Data de Nascimento:</label>
                                        <input type="text" name="dataNasc"  id="dataNasc" value="<?php echo datetobr($resultado["dataNasc"]); ?>" size="20" maxlength="15" onkeyup="mask_date(this.id);" placeholder="00/00/0000"/>
                                        <br/><br/>
                                        <!--PROFISSÃO-->
                                        <label>Profissão:</label>                           
                                        <input type="text" name="profissao"  id="profissao" value="<?php echo $resultado["profissao"]; ?>" size="56" maxlength="60"/>
                                        <br/><br/>
                                        <!--DDD E TELEFONE-->
                                        <label>DDD:</label>
                                        <input name="ddd" type="text" id="ddd" value="<?php echo $resultado["ddd"]; ?>" size="4" maxlength="2"  placeholder="99"/>
                                        <label>Telefone:</label>
                                        <input name="telefone" type="text" id="telefone" value="<?php echo $resultado["telefone"]; ?>" maxlength="9" onkeyup="mask_fone(this.id);" placeholder="9999-9999"/>
                                        <br/><br/>
                                        <!--DDD E CELULAR-->
                                        <label>DDD:</label>
                                        <input name="dddCel" type="text" id="dddCel" value="<?php echo $resultado["dddCel"]; ?>" size="4" maxlength="2" placeholder="99"/>
                                        <label>Celular:</label>
                                        <input name="celular" type="text" id="celular" value="<?php echo $resultado["celular"]; ?>" maxlength="11" onkeyup="mask_cel(this.id);" placeholder="9.9999-9999"/>
                                        <br/><br/>
                                        <!--ENDEREÇO--> 
                                        <label>Endereço:</label>
                                        <input name="endereco" type="text" id="endereco" value="<?php echo $resultado["endereco"]; ?>" size="56" maxlength="55"/>
                                        <br/><br/>
                                        <!--BAIRRO-->
                                        <label>Bairro:</label>
                                        <input name="bairro" type="text" id="bairro" value="<?php echo $resultado["bairro"]; ?>" maxlength="60" size="59"/>
                                        <br/><br/>
                                        <!--CIDADE-->
                                        <label>Cidade:</label>
                                        <input name="cidade" type="text" id="cidade" value="<?php echo $resultado["cidade"]; ?>" maxlength="60" size="58"/>
                                        <br/><br/>            
                                        <label>Estado:</label>
                                        <!--ESTADO-->
                                        <select name="estado" id="estado">

                                            <option><?php echo $resultado["estado"] ?></option>
                                            <option>Selecione...</option>
                                            <option value="AC">AC</option>
                                            <option value="AL">AL</option>
                                            <option value="AP">AP</option>
                                            <option value="AM">AM</option>
                                            <option value="BA">BA</option>
                                            <option value="CE">CE</option>
                                            <option value="ES">ES</option>
                                            <option value="DF">DF</option>
                                            <option value="MA">MA</option>
                                            <option value="MT">MT</option>
                                            <option value="MS">MS</option>
                                            <option value="MG">MG</option>
                                            <option value="PA">PA</option>
                                            <option value="PB">PB</option>
                                            <option value="PR">PR</option>
                                            <option value="PE">PE</option>
                                            <option value="PI">PI</option>
                                            <option value="RJ">RJ</option>
                                            <option value="RN">RN</option>
                                            <option value="RS">RS</option>
                                            <option value="RO">RO</option>
                                            <option value="RR">RR</option>
                                            <option value="SC">SC</option>
                                            <option value="SP">SP</option>
                                            <option value="SE">SE</option>
                                            <option value="TO">TO</option>
                                        </select>
                                        <br/>      
                                    </fieldset>
                                </td>
                                <td width="50%" valign="top">
                                    <fieldset id="segundo">
                                        <legend><b>Preferências</b></legend>
                                        <br/>
                                        <!--COR-->
                                        <label>Cor:</label>                           
                                        <input type="text" name="cor"  id="cor" value="<?php echo $resultado["cor"]; ?>" size="30" maxlength="60"/>&nbsp;&nbsp;
                                        <!--FLOR-->
                                        <label>Flor:</label>                           
                                        <input type="text" name="flor"  id="flor" value="<?php echo $resultado["flor"]; ?>" size="30" maxlength="60"/>  
                                        <br/>
                                        <br/>
                                        <label>Lê com frequência:</label>
                                        <br/>
                                        <br/>
                                        <input name="leitura" type="radio" value="Sim"  id="sim"  onclick=" return mostrarGenero();" />
                                        Sim 
                                        <input name="leitura" type="radio" value="Não" checked="checked" onclick=" return ocultarGenero();"/>                          
                                        Não 
                                        <br/> 
                                        <div id="divGenero"  style="visibility:hidden">
                                            <br/>
                                            <!--GÊNERO-->
                                            Qual Genero?:
                                            <input type="text" name="genero"  id="txtGenero" size="60" maxlength="60"/>
                                        </div>
                                        <br/> 
                                        <label>Hobbies:</label>
                                        <br>
                                        <!--HOBBIES-->
                                        <textarea name="hobbies"  id="hobbies"  cols="64"  rows="3" maxlength="450"><?php echo $resultado["hobbies"]; ?></textarea>
                                        <br/>                      
                                        <br/>
                                        <!--INTERESSES-->
                                        <label>Interesses:</label>
                                        <br>
                                        <textarea name="interesses"  id="interesses"  cols="64"  rows="3" maxlength="450"><?php echo $resultado["interesses"]; ?></textarea>
                                        <br/>
                                        <br/>  
                                        <input name="atualizar" type="button" id="atualizar" value="Atualizar" onclick="return confir_envio();" /> 
                                        <input name="voltar" type="button" id="voltar" value="Voltar" onclick="return listarMembros();" />
                                    </fieldset>
                                </td>
                            </tr>
                        </table>
                    </center>
                </form>
                <?php
            }
        }
        ?>
    </body>
</html>
