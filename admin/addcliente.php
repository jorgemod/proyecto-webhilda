<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="addcliente.css">
    
    <title>add cliente</title>
</head>
<body>
    <h1>Agregar un nuevo cliente</h1>
    <div>
            <form action="addcli.php" method="post">
            <label for="nombrecliente">Nombre del cliente</label>
            <input type="text" name="nombrecliente" id="nombrecliente">
            <label for="telefonocliente">telefono</label>
            <input type="tel" name="telefonocliente" id="telefonocliente">
            <label for="contraseña">contraseña</label>
            <input type="password" name="contraseña" id="contraseña">
            <input class="button" type="submit">
        </form>
    </div>
    </body>
</html>