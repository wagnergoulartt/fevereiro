<?php
// Faz a conexão com o banco de dados
$conexao = mysqli_connect("localhost", "u529068110_fevereiro", "@Erick91492832", "u529068110_fevereiro");

// Verifica se a conexão foi bem sucedida
if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $documento = $_POST['documento'];
    $whatsapp = $_POST['whatsapp'];
    $aniversariantes = $_POST['aniversariantes'];

    // Remove caracteres não numéricos do número de telefone
    $whatsapp = preg_replace('/\D/', '', $whatsapp);

    // Adiciona o prefixo "55" ao número de telefone
    $whatsapp = "55" . $whatsapp;

    // Insere as informações do convidado no banco de dados
    $query = "INSERT INTO convidados (nome, documento, whatsapp, aniversariantes) VALUES ('$nome', '$documento', '$whatsapp', '$aniversariantes')";
    
    if (mysqli_query($conexao, $query)) {
        // Redireciona para index.php após o sucesso
        header("Location: regras.html");
        exit(); // Certifique-se de parar a execução após o redirecionamento
    } else {
        echo "Erro ao inserir os dados: " . mysqli_error($conexao);
    }
}

// Fecha a conexão com o banco de dados
mysqli_close($conexao);
?>
