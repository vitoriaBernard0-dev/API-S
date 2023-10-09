<?php

// URL da API do GitHub para o repositório desejado
$repo_url = 'https://api.github.com/repos/vitoriaBernard0-dev/API-S';

// Configuração da solicitação HTTP
$options = [
    'http' => [
        'header' => 'User-Agent: PHP', // Adicione um cabeçalho de usuário válido
        'method' => 'GET',
    ],
];

// Crie um contexto para a solicitação
$context = stream_context_create($options);

// Faça a solicitação à API do GitHub
$response = @file_get_contents($repo_url, false, $context);

// Verifique se a solicitação foi bem-sucedida
if ($response === false) {
    die('Falha ao buscar os dados do repositório.');
}

// Decodifique a resposta JSON em um array associativo
$repo_data = json_decode($response, true);

// Verifique se houve um erro de decodificação JSON
if ($repo_data === null && json_last_error() !== JSON_ERROR_NONE) {
    die('Falha ao decodificar os dados JSON.');
}

// Exiba algumas informações do repositório
echo 'Nome do Repositório: ' . $repo_data['name'] . '<br>';
echo 'Descrição: ' . $repo_data['description'] . '<br>';
echo 'URL: ' . $repo_data['html_url'] . '<br>';
echo 'Número de Estrelas: ' . $repo_data['stargazers_count'] . '<br>';
echo 'Número de Forks: ' . $repo_data['forks_count'] . '<br>';
?>
