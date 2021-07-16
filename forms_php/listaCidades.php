<?php
include_once('config.php');

$idestado = $_GET['id_estado'];
$sql = "SELECT id, nome  FROM cidades WHERE id_estado = $idestado ORDER BY nome"; 
 
echo '<label class="col-mb-4 control-label" for="cidade" >Cidade</label>';
echo '<div class="col-md-8" id="cidade">
        <select id="cidade" name="id_cidade" class="form-control">
        <option selected="">Selecione...</option>';
        $resultado = mysqli_query($conn, $sql);
        if(mysqli_num_rows($resultado) > 0)
        {
          while ($dados = mysqli_fetch_array($resultado))
          {                  
            echo "<option value='".$dados['id']."'>".$dados['nome']."</option>";            
          }              
        }
        mysqli_close($conexao);
echo "</div>";
echo "</select>";


 
?>