<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("location: ../login.html");
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Principal</title>
        <link rel="stylesheet" type="text/css" href="cancelar_pedido.css">
        <script src="productos.js"></script>
    </head>
    
    <body>
        <h1>Pedidos</h1>
        <div id="main">
            <div class="gui" id="pedidos">
                <?php
                include("conexion.php");
                $sql = "SELECT * FROM pedidos as p inner join cliente as c on p.id_cliente = c.id_cliente where estado_pedido = 'activo'";
                $result = mysqli_query($db, $sql);
                echo '<table>';
                echo '<tr>';
                echo '<th>id pedido</th>';
                        echo '<th>cliente</th>';
                        echo '</tr>';
                        
                        while ($mostrar = mysqli_fetch_array($result) ){
                            echo '<tr>';
                            echo '<td>'. $mostrar['id_pedido']  . '</td>';
                            echo '<td>' . $mostrar['nombre_cliente'] . '</td>';
                            echo '</tr>';
                    }
                    echo '</table>';
                    ?>   
            </div>
            <div class="gui" id="formulario">
                <h2>¿que pedido desea cancelar introduzca su id?</h2>
                <form action="cancela.php" method="POST">
                    <label for="id_pedido">id del pedido</label>
                    <input type="text" name="id_pedido" id="id_pedido">
                    <input type="submit" value="enviar" id="enviar">
                </form>
            </div>
        </div>
    </body>
</html>

