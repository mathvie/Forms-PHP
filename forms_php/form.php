<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulário de Cadastro</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="shortcut icon" href="img/fav.ico">
        <link rel="stylesheet" href="css/form_style.css" />
        
        
        <script type="text/javascript" src="js/jquery-1.6.4.js"></script>
        <script type="text/javascript">
            $(document).ready(function()
            {
                $('#id_estado').change(function(){
                $('#cidade').load('listaCidades.php?id_estado='+$('#id_estado').val());
                });
            });
        </script>    
    </head>
    <body>
        
        <img src="img/img-form/header-form.png" width="100%">

        
        <div class="container">
            <div class="row">
                <div class="col">
                 
                    <form class="container" action="enviar.php" method="post">
                      <br>
                      <br>
                      
                      <h2 class="titulo-form">Formulário</h2><br>
                      
                        <label class="col-md-4 control-label" for="txtNome">Nome Completo</label>  
                        <div class="col-md-8">
                            <div class="form-group">
                                <input id="nome" name="nome" type="text" placeholder="Nome completo" class="form-control input-md" required="">
                            </div>
                        </div>
                  
                        <label class="col-md-4 control-label" for="txtNome">Idade</label>  
                        <div class="col-md-8">
                            <div class="form-group">
                                <input id="nome" name="idade" type="number" placeholder="Idade" class="form-control input-md" required="">
                                 
                            </div>
                        </div>
                        
                        <label class="col-md-4 control-label" for="txtNome">Email</label>  
                        <div class="col-md-8">
                            <div class="form-group">
                                <input id="nome" name="email" type="email" placeholder="Email completo" class="form-control input-md" required="">
                                 
                            </div>
                        </div>
                        
                        <label class="col-md-4 control-label" for="txtNome">Celular</label>  
                        <div class="col-md-8">
                            <div class="form-group">
                                <input id="nome" name="telefone" type="text" placeholder="Celular com Whatsapp" class="form-control input-md" required="">
                                
                            </div>
                        </div>
                        
                        <label class="col-md-4 control-label" for="txtNome">Escola</label>  
                        <div class="col-md-8">
                            <div class="form-group">
                                <input id="nome" name="escola" type="text" placeholder="Nome completo de sua escola" class="form-control input-md" required=""> 
                            </div>
                        </div>    
                        
                        
                        <?php
                            include_once ('config.php');
							
							/* método de select no banco que não foi usado 
								$result_serie = "SELECT * FROM serie";
								$resultado = mysqli_query($conn, $result_serie);
								while($row_serie = mysqli_fetch_assoc($resultado)){
							*/
                        ?>

                        
                        <div class="form-group">  
                            <label class="col-mb-4 control-label" for="id_estado" >Qual seu Estado?</label>
                                <div class="col-md-8">
                                    <select id="id_estado" name="id_estado" class="col-mb-12 form-control">
                                    <option selected="">Selecione...</option>
                                    <?php
                                    $sql = "SELECT id, uf FROM estados ORDER BY uf";
                                    $resultado = mysqli_query($conn, $sql);
                                        if(mysqli_num_rows($resultado) > 0)
                                        {
                                            while ($dados = mysqli_fetch_array($resultado))
                                            {                  
                                                echo "<option value='".$dados['id']."'>".utf8_encode($dados['uf'])."</option>";          
                                            }              
                                        }
                                    ?>

                                    </select>
                                </div>
                        </div>
            
                            <div class="form-group"> 
                                <div id='cidade'></div>
                            </div>
            
                            <div class="form-group">  
                            <label class="col-mb-4 control-label" for="id_serie" >Qual a Série que vai frequentar?</label>
                                <div class="col-md-8">
                                    <select id="id_serie" name="id_serie" class="form-control">
                                    <option selected="">Selecione...</option>
                                    
                                    <?php
                                    $sql = "SELECT id_serie, serie FROM serie ORDER BY id_serie";
                                    $resultado = mysqli_query($conn, $sql);
                                        if(mysqli_num_rows($resultado) > 0)
                                        {
                                        while ($dados = mysqli_fetch_array($resultado))
                                            {                  
                                                echo "<option value='".$dados['id_serie']."'>".$dados['serie']."</option>";          
                                            }              
                                        } 
                                    ?>
                    
                                    </select>
                                </div>
                            </div>                                                       
                            <br>
							
							<!-- Implementar validação com jquery -->
                            <div class="form-group">
                                <p>Escolha três matérias para estudar</p>
                                <input name="cor[]" type="checkbox" value="port"> Português<br>
                                <input name="cor[]" type="checkbox" value="math"> Matemática<br>
                                <input name="cor[]" type="checkbox" value="fis"> Física<br>
                                <input name="cor[]" type="checkbox" value="hist"> História<br>
                                <input name="cor[]" type="checkbox" value="geo"> Geografia<br>
                                <input name="cor[]" type="checkbox" value="quim"> Química<br>             
                                <input name="cor[]" type="checkbox" value="arts"> Artes<br>            
                                <input name="cor[]" type="checkbox" value="filo"> Filosofia<br>             
                                <input name="cor[]" type="checkbox" value="soci"> Sociologia<br>
                            </div>
							
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">CADASTRAR</button>
                            </div>
                            <?php mysqli_close($conn); ?>   
                            <br><br>
                    </form>    
                    
                </div>
                
                <div class="col">
                    <br><br>
                    <h1>Você se considera preparado para encarar o seu futuro?</h1><br>
                    
                    <h3>Participe do Projeto e diversifique suas oportunidades</h3><br>
                    
                    <h6>Podemos ajudar você a superar seus desafios
                       na jornada escolar e garantir seu futuro acadêmico de forma prática e assertiva. </h6> 
                    <h6>Terá a chance de conhecer uma nova ferramenta para se desenvolver. </h6>
                    <br>
                    <br>
                    <h3>Preencha o formulário e dê um play em seus estudos.</h3>
                    
                </div>
            </div>
        </div>
        
        
        
        
        
    <!-- ----------------- Footer ------------------- -->

    <footer>
        <div class="footer-content footer">
            <h3>Formulário</h3>
            <p>Redes sociais</p>
            <ul class="socials">
                <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://www.instagram.com"><i class="fa fa-instagram"></i></a></li>
                <li><a href="https://www.linkedin.com/"><i class="fa fa-linkedin-square"></i></a></li>
            </ul>
        </div>
        
        <div class="footer-bottom">
            <p>copyright &copy;2021. Todos os direitos reservados.<br> 

        </div>
    </footer>

    </body>
</html>
