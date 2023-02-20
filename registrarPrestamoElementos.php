<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="./registrarPrestamoElementos.php" method="get">
        <?php
        $elemento = 0;
        while ($elemento <= 3) { ?>
            <input type="checkbox" value="<?php echo $elemento ?>" name="check[]">
        <?php
            $elemento = $elemento + 1;
        }
        ?>
        <input type="submit" value="enviar" name="enviar">
    </form>


    <?php
    if (isset($_REQUEST['enviar'])) {
        $elementoa = $_GET['check'];
        echo $elementoa[2];
    }



    ?>
</body>

</html>