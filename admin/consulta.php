<?php
include("../cnx.php");


function processDrpdown($selectedVal){
    foreach ($selectedVal as $clave => $valor) {
        echo "<option value=\"" . $valor['id_pedido'] . "\">" . $valor['fecha_pedido'] . " $ " . $valor['monto_total'] . "</option>" . "\n";
        // echo $valor['id_pedido'] . " " . $valor['fecha_pedido'] . " " . $valor['precio_unitario'] . "\n";
    }
}

if ($_POST['dropdownValue']) {
    $sql = "SELECT * FROM `pedidos` WHERE id_cliente = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($_POST['dropdownValue']));
    $pays = $stmt->fetchAll();
    processDrpdown($pays);
}
