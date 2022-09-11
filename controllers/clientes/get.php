<?php
    // VERIFICA SE EXISTE A FUNÇÃO LISTAR
    if(isset($method) && $method == "listar"){

        $db = DB::connect();

        if(isset($param) && !empty($param)){

            $id = filter_var($param, FILTER_VALIDATE_INT);
            if($id){

                $sql = "SELECT * FROM clientes WHERE id = :id";
                $stmt = $db->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                if($result){
                    // retorna as dados
                    echo json_encode(["dados" => $result]);
                }else{
                    // retorna informando que não existe dados;
                    echo json_encode(['dados' => 'Não existem dados para retornar com o prâmetro informado']);
                }
                
            }else{
                echo json_encode(['ERRO' => 'Parâmetro inválido']);
                exit;
            }

        }else{

            $sql = "SELECT * FROM clientes ORDER BY nome";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if($result){
                // retorna as dados
                echo json_encode(["dados" => $result]);
            }else{
                // retorna informando que não existe dados;
                echo json_encode(['dados' => 'Não existem dados para retornar']);
            }
        }

    }else{
        echo json_encode(['ERRO' => 'Método não encontrado']);
    }

?>