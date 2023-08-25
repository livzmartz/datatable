<?php

namespace Controllers;

use Exception;
use Model\Detalle;
use MVC\Router;

class DetalleController {
    public static function estadistica(Router $router){
        $router->render('clientes/estadistica', []);
    }

    public static function detalleComprasAPI(){

        $sql = "SELECT
        c.cliente_nombre,
        SUM(CASE WHEN v.venta_situacion = '1' THEN 1 ELSE 0 END) AS total_ventas
    FROM
        clientes c
    LEFT JOIN
        ventas v ON c.cliente_id = v.venta_cliente
    GROUP BY
        c.cliente_id, c.cliente_nombre";

        try {
            
            $clientes = Detalle::fetchArray($sql);
    
            echo json_encode($clientes);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }

}