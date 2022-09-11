<?php
    # PERMITE QUE TODOS OS LINKS EXTERNOS POSSA FAZER REQUISIÇÃO
    header('Access-Control-Allow-Origin: *');

    # CONFIGURA O TIPO DE RETORNO
    header('Content-Type: application/json');

    # SETA O FUSO HORÁRIO
    date_default_timezone_set("America/Sao_Paulo");

    # =============================================
    # DEFININDO AS CONFIGURAÇÕES DO BANCO DE DADOS
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_NAME", "api_teste");
    # =============================================
    
    # =============================================
    # DEFININDO A URL BASE
    define('BASE_URL','http://localhost/api');
    # =============================================
?>