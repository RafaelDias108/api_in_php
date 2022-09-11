<?php
    // VERIFICA SE EXISTE A CLASSE
    if(isset($class) && $class == "clientes") {

        // VERIFICA SE EXISTE O TIPO DE REQUISIÇÃO GET
        switch ($request_method) {

            case 'GET':
                include_once "get.php";
                break;
            
            case 'POST':
                if($_POST['_request_method'] == 'PUT'){

                    include_once "put.php";

                }else if($_POST['_request_method'] == 'DELETE'){

                    include_once "delete.php";

                } else if(!isset($_POST['_request_method'])){

                    include_once "post.php";
                }
                break;
            
            default:
                # code...
                break;
        }
    }
?>