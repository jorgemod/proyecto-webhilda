<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("location: ../login.html");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Principal</title>
        <link rel="stylesheet" type="text/css" href="producstyle.css">
        <script src="productos.js"></script>
    </head>
    
    <body>

        <div id="mySidebar" class="sidebar">    
            <ul>
                 <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
                
                <li><a href="#">Mi Cuenta</a></li>
                <li><a href="#">Pagos</a></li>
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
                $sql = "SELECT * FROM productos,pedidos where estado_pedido = 'cancelado'";
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
                            echo $mostrar['precio'];
                        echo '</p>';
                    echo '</div>';
                    }
                    
                ?>   
           
            
    
           
        </div>
    </body>
</html>

