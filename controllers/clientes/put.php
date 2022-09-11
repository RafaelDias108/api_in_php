<?php
    if(isset($method) && $method == "update"){

        if(isset($param) && !empty($param) && filter_var($param,FILTER_VALIDATE_INT)){

            $put = filter_input_array(INPUT_POST, $_POST, FILTER_DEFAULT);
            array_shift($put);

            
            # MONTA O SQL AUTOMATIZADO UPDATE
            $sql = "UPDATE clientes SET ";
            
            $contador = 1;
            foreach (array_keys($put) as $indice) {
                
                if(count($put) > $contador){
                    $sql .= "{$indice} = '{$put[$indice]}', "; 
                }else{
                    $sql .= "{$indice} = '{$put[$indice]}' "; // Retirar a virgula do ultimo
                }
                $contador++;
            }
            $sql .= "WHERE id = {$param}";

            # CONEXÃO COM O BANCO DE DADOS
            $db = DB::connect();

            # REALIZA O UPDATE
            $stmt = $db->prepare($sql);
            $stmt->execute();

            if($stmt->rowCount()){
                echo json_encode(["dados" => 'Dados atualizados com sucesso.']);
            }else{
                echo json_encode(['erro' => 'Houve erro ao atualizar os dados. ']);
            }

        }else{
            echo json_encode(['erro' => 'Parâmetro inválido, por favor informe o ID do cliente.']);
            exit(0);
        }

    }else{
        echo json_encode(['erro' => 'Método não encontrado']);
    }
?>