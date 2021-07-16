<!DOCTYPE html>

<?php include_once 'config.php';?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php
        $nome = utf8_decode(mb_strtoupper(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING)));
        $idade = $_POST["idade"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];       
        $fk_cidade = $_POST["id_cidade"];
        $escola = $_POST["escola"];
        $fk_serie = $_POST["id_serie"];
        
       
        $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
        
        mysqli_select_db($conn, '$dbname');
        
        $sql = "INSERT INTO cadastro (nome, idade, email, telefone, fk_cidade, escola, fk_serie)
                VALUES ('$nome', '$idade','$email','$telefone','$fk_cidade','$escola', '$fk_serie')";
        
        if (mysqli_query($conn, $sql)){
        echo "<script>alert('Dados salvos'); window.location = 'index.php';</script>";}
        else{
            echo "Erro: " .$sql."<br>".mysqli_error($conn);
        }
        mysqli_close($conn);
        
        ?>
        
    </body>
</html>
