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
                <li> <a href="nami.html">HOME</a></li>  
                <li><a href="#">Services</a></li>
                <li><a href="#">Clients</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
        <div id="main" style="padding:1px 16px;height:1000px;">
            <button class="openbtn" onclick="openNav()">
                ☰ MENU
            </button>      
            <h1>Productos disponibles</h1>
           
                 <?php
                
                include("conexion.php");
               /* $sql = "SELECT * FROM ropapro where genero = 'm'";
                $result = mysqli_query($db, $sql);
                    
                while ($mostrar = mysqli_fetch_array($result)){
                    echo '<div id="card">';
                        echo '<img src="';
                        echo $mostrar['foto'];
                        echo '"height="200px" width="200">';
                        echo '<p>';
                            echo $mostrar['descripion'];
                        echo '</p>';
                        echo '<p>';
                            echo $mostrar['precio'];
                        echo '</p>';
                    echo '</div>';
                    }
                    */
                ?>   
           
            
    
           
        </div>
    </body>
</html>

