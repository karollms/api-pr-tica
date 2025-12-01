<?php
$url = "http://jsonplaceholder.typicode.com/users";
$response = file_get_contents($url);

// verificação básica 
if (!$response) {
    die("Erro ao acessar a API!");
}

$users = json_decode($response, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    die("Erro no JSON: ".json_last_error_msg());
}
?>

<h2>Lista de usuários</h2>
<ul>
    <?php foreach($users as $u):?>
        <li>
            <strong>
                <?= $u['name']?>
            </strong> - <?= $u ['email']?>
        </li>
    <?php endforeach;?>
</ul>
