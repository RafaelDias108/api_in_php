<?php
    if(isset($method) && $method == "insert"){

        # FILTRA OS DADOS ENVIADOS PELO POST
        $post = filter_input_array(INPUT_POST,$_POST,FILTER_DEFAULT);
        
        # MONTA O SQL AUTOMATIZADO
        $chaves = [];
        $valores = [];
        foreach ($post as $key => $value) {
            array_push($chaves, $key);
            array_push($valores, $value = "'".$value."'");
        }

        $sql = "INSERT INTO clientes (";
        $sql .= implode(',',$chaves);
        $sql .= ") VALUES (";
        $sql .= implode(',',$valores);
        $sql .= ")";

        # CONEXÃO COM O BANCO DE DADOS
        $db = DB::connect();

        # REALIZA A INSERÇÃO DOS DADOS NO BANCO DE DADOS
        $stmt = $db->prepare($sql);
        if($stmt->execute()){
            echo json_encode(["dados" => 'Dados inseridos com sucesso.']);
        }else{
            echo json_encode(['erro' => 'Houve algum erro ao inserir os dados. ']);
        }

    }else{
        echo json_encode(['erro' => 'Método não encontrado']);
    }
?>