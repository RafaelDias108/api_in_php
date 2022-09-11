<?php
  if(isset($method) && $method == "delete"){

    if(isset($param) && !empty($param) && filter_var($param,FILTER_VALIDATE_INT)){

         # CONEXÃO COM O BANCO DE DADOS
         $db = DB::connect();

        # SQL DELETE
        $sql = "DELETE FROM clientes WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', $param);
        $exec = $stmt->execute();

        if($exec){
            echo json_encode(["dados" => 'Dados deletado com sucesso.']);
        }else{
            echo json_encode(["erro" => 'Houve um erro ao deletar os dados.']);
        }

    }else{
        echo json_encode(['erro' => 'Parâmetro inválido, por favor informe o ID do cliente.']);
        exit(0);
    }

  }else{
    echo json_encode(['erro' => 'Método não encontrado']);
  } 
?>