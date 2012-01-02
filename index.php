<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> 
        <title>Rodrigo Graça - Portefólio</title>
        <meta name="description" content="Rodrigo Graça - Portefólio" />
        <meta name="keywords" content="rodrigo graça portfólio" />
        <meta name="author" content="Rodrigo Graça" /> 
        <meta property="og:title" content="Rodrigo Graça - Portefólio" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="http://www.portfolio.rodrigograca.com" />
        <meta property="og:image" content="" />
        <meta property="og:site_name" content="Rodrigo Graça - Portefólio" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body id="page">
        <div style="background-color: #F1D2C2; width: 100%; height: 40px; bottom: 0px; position: fixed; z-index: 5; text-align: center;">
            <div style="margin: 10px;">
                <a href="http://blog.rodrigograca.com/curriculo/" style="padding: 10px;" target="_blank">Curriculo</a>|
                <a href="http://blog.rodrigograca.com/contacto/" style="padding: 10px;" target="_blank">Contacto</a>|
                <a href="http://blog.rodrigograca.com/acerca-de-mim/" style="padding: 10px;" target="_blank">Acerca de Mim</a>
            </div>
	</div>
        <div class="container">
            <div id="header">
                <h1>RODRIGO GRAÇA <span>PORTEFOLIO</span></h1>
                <h2>Criação | Manutenção de Sites e Blogs</h2>
            </div>
            <?php
                $ligar = mysql_connect("localhost","USER","PASSWORD");
                if(!$ligar){
                    echo "Erro ao estabelecer conecção à Base de dados!";
                    exit;
                }
                $escolhe = mysql_select_db("BD");
                if(!$escolhe){
                    echo "Erro ao selecionar Base de dados!";
                    exit;
                }
                mysql_set_charset('utf8',$ligar);
            ?>
            <div id="corpo">
                <ul class="lb-album">
                    <?php

                    $lista = mysql_query("SELECT * FROM portfolio ORDER BY ID");
                    if(!$lista) {
                        echo "<center><h3>Até ao momento nao foram adicionados trabalhos a este portfolio.</h3></center>";
                    } else {
                        $linhas = mysql_num_rows($lista);
                        $i = 0;
                        while($dados = mysql_fetch_array($lista)){
                            $i = $i +1; // $i += 1;
                    ?>
                    <li>
                        <a href="<?php echo "#image-".$i; ?>">
                            <img src="<?php echo $dados["Miniatura"]; ?>" alt="<?php echo $dados["Link"]; ?>" title="<?php echo $dados["Link"]; ?>" />
                            <span><?php echo $dados["Tipo"]; ?></span>
                        </a>
                        <div class="lb-overlay" id="<?php echo "image-".$i ?>">
                            <img src="<?php echo $dados["Imagem"]; ?>" alt="<?php echo "image".$dados["ID"]; ?>" />
                            <div>
                                <h3><?php echo $dados["Cliente"]; ?><span><a href="<?php echo $dados["Link"]; ?>" target="_blank"><?php echo $dados["Link"]; ?></a></span></h3>
                                <p>Serviços prestados: <br /><?php echo $dados["Servico"]; ?></p>
                                <a href="<?php echo "#image-"; if($i == 1){ echo $linhas; }else{ echo ($i-1); } ?>" class="lb-prev">Anterior</a>
                                <a href="<?php echo "#image-"; if($i == $linhas){ echo "1"; }  else { echo $i+1; } ?>" class="lb-next">Proximo</a>
                            </div>
                            <a href="#page" class="lb-close">Fechar</a>
                        </div>
                    </li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </div>            
        </div>
    </body>
</html>
