<?php
    # CARREGA AS CONFIGURAÇÕES DA API
    require_once('core/config.php');

    # VERIFICA E FOI PASSADO ALGO NO PATH
    if(!empty($_GET['path'])){

        # SEPARA EM ARRAY A CLASSE E MÉTODO E PARÂMETRO
        $path = explode('/', $_GET['path']);
        $uri = array();
        // $uri['request_type'] = $_SERVER['REQUEST_METHOD'];
        $request_method = $_SERVER['REQUEST_METHOD'];
        
        if(!empty($path[0])){
            $class = $path[0];
            // $uri['class'] = $path[0];
        }
        if(!empty($path[1])){
            $method = $path[1];
            // $uri['method'] = $path[1];
        }
        if(!empty($path[2])){
            $param = $path[2];
            // $uri['param'] = $path[2];
        }
        
    }else{
        
        // echo "Caminho não existe";
        echo json_encode(['endpoints' => [
            '/clientes/listar',
            '/clientes/listar/{id}',
        ]]);
        exit;
    }

    include_once "classes/db.class.php";
    include_once "controllers/clientes/clientes.php";

?>