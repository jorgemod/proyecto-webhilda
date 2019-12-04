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
        <link rel="stylesheet" type="text/css" href="producstyle.css">
        <script src="productos.js"></script>
        <style>

        </style>
    </head>
    
    <body>

        <div id="mySidebar" class="sidebar">    
            <ul>
                 <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
                
                <li><a href="../cliente/cuenta.php">Mi Cuenta</a></li>
                <li><a href="#">Contacto</a></li>
                <li><a href="../logout.php">Cerrar sesión</a></li>
            </ul>
        </div>
        <div id="main" style="padding:1px 16px;height:1000px;">
            <button class="openbtn" onclick="openNav()">
                ☰ Menú
            </button>      
            <h1>Productos disponibles</h1>
           
                 <?php
                
                include("conexion.php");
                $sql = "SELECT * FROM productos as p inner join pedidos_productos as pp on p.id_producto = pp.id_producto inner join pedidos as pe on pp.id_pedido=pe.id_pedido where estado_pedido ='cancelado'";
                $result = mysqli_query($db, $sql);
                while ($mostrar = mysqli_fetch_array($result) ){
                    echo '<div id="card">';
                        echo '<img src="';
                        echo $mostrar['foto_url'];
                        echo '"height="200px" width="200">';
                        echo '<p>';
                            echo $mostrar['descripcion'];
                        echo '</p>';
                        echo '<p>';
                            echo 'Id'.':'.$mostrar['id_producto'];
                        echo '</p>';
                        echo '<p>';
                            echo '$'.$mostrar['precio'];
                        echo '</p>';
                    echo '</div>';
                    }
                    
                ?>   
           
            
    
           
        </div>
    </body>
</html>

