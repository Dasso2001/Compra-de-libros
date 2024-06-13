<?php
function calcular_bonificacion($tipo_cliente, $cantidad, $importe_bruto) {
    $bonificaciones = [
        "L" => [
            "limite" => 24,
            "porcentaje_1" => 0.20,
            "porcentaje_2" => 0.25,
        ],

        "P" => [
            "limite_1" => 6,
            "limite_2" => 18,
            "porcentaje_1" => 0.05,
            "porcentaje_2" => 0.10,
        ],
    ];

    $bonificacion = 0;

    if ($tipo_cliente == "L") {
        if ($cantidad <= 24) {
            $bonificacion = $importe_bruto*0.20;
        } 
        else{
            $bonificacion = $importe_bruto*0.25;
        }
    } 
    else if ($tipo_cliente == "P") {
        if ($cantidad >= 6 && $cantidad <= 18) {
            $bonificacion = $importe_bruto*0.05;
        } 
        else if ($cantidad > 18) {
            $bonificacion = $importe_bruto*0.10;
        }
    }
    return $bonificacion;
}

$tipo_cliente = "";
if (isset($_POST["tipo_cliente"])){
    $tipo_cliente = $_POST["tipo_cliente"];
}

$cantidad = 0;
if (isset($_POST["cantidad"])){
    $cantidad = $_POST["cantidad"];
}

$importe_bruto = 0;
if (isset($_POST["importe_bruto"])){
    $importe_bruto = $_POST["importe_bruto"];
}
   
$bonificacion = calcular_bonificacion($tipo_cliente, $cantidad, $importe_bruto); // calculo de la bonificacion
   
$importe_bruto_bonificado = $importe_bruto - $bonificacion; // calcula el importe bruto bonificado

// Mostrar
echo "El importe bruto bonificado es: $importe_bruto_bonificado";
?>
    