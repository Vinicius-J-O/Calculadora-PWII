<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logística Express - Frete</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form class="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">

        <label class="label">Distancia (km)</label>
        <input  class="input"type="number" name="distancia" require><br>

        <label class="label">Peso</label>
        <input class="input" type="number" name="peso" require><br>

        <label>Envio:</label>
        <button type="submit" name="btnNormal" class="btn">Normal</button>
        <button type="submit" name="btnExpresso" class="btn">Expresso</button>

</form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $km = $_POST['distancia'];
        $kg = $_POST['peso'];
        if(empty($km)) {
            echo "A distância está vazia <br>";
          } else {
            echo "Distancia: $km <br>";
          }
          if(empty($kg)) {
            echo " O peso está vazio <br>";
          } else {
            echo  "Peso: $kg <br>";
          }

         
        if (isset($_POST["btnNormal"])) {
            $frete = 10+($km * 0.5);
            if ($kg > 20) {
            $frete = $frete + 30;
            } 
            echo "<p>Frete Normal: R$ ".number_format($frete, 2 );
        }
        if (isset($_POST["btnExpresso"])) {
            $frete = 10+($km * 0.5) ;
            if ($kg > 20) {
            $frete = $frete + 30;
            } 
            $frete *+1.20;
            echo "<p>Frete Expresso: R$ ".number_format($frete, 2 );
            
        }
      }
    ?>
</body>
</html>