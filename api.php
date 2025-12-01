<?php

// armazenar um CEP em uma variável
// armazenar o link para requisição em uma variável
// realizar a conexão com o link da api
// armazenar os dados em uma variável 
// exibir os dados em tela 

$cep = "27570000";
$url = "https://viacep.com.br/ws/$cep/json/";

$response = file_get_contents($url);

$data = json_decode($response, true );

if (!$response) {
    die("Erro ao acessar a API!");
}

if (isset($data['erro'])) {
    die("CEP não encontrado.");
}

echo "<pre>";
print_r($data);
echo "/<pre>";