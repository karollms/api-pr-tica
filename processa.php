<?php


$cep = htmlspecialchars(trim($_GET['cep']));

$url = "https://viacep.com.br/ws/$cep/json/";

$response = file_get_contents($url);

$data = json_decode($response, true );

if (isset($data['erro'])) {
    die("CEP não encontrado.");
}

echo "<pre>";
print_r($data);
echo "/<pre>";

$save= json_decode(file_get_contents("historico.json", true));

$novo = [
    "cep" => $cep
];

$save[] = $novo;
file_put_contents("historico.json", json_encode($data));
