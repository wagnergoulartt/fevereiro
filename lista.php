<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <meta name="robots" content="noindex">
    
    
<title>LISTA DA SOCIAL - GRUPO SOCIALIZANDO</title>
<meta name="description" content="Clique aqui e confira o seu nome na lista da social."/>

          <!-- Facebook Meta Tags -->
<meta property="og:url" content="https://pagodedaquebrada.com.br/lista">
<meta property="og:type" content="website">
<meta property="og:title" content="LISTA - GRUPO SOCIALIZANDO">
<meta property="og:description" content="Clique aqui e confira o seu nome na lista da social.">
<meta property="og:image" content="https://pagodedaquebrada.com.br/imgpdq/lista.png">
	
	  <!-- Twitter Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta property="twitter:domain" content="pagodedaquebrada.com.br/lista">
<meta property="twitter:url" content="https://pagodedaquebrada.com.br/lista">
<meta name="twitter:title" content="LISTA - GRUPO SOCIALIZANDO">
<meta name="twitter:description" content="Clique aqui e confira o seu nome na lista da social.">
<meta name="twitter:image" content="https://pagodedaquebrada.com.br/imgpdq/lista.png"
    
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <style>
        .table-responsive {
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="alert alert-info">
            <?php
            // Faz a conexão com o banco de dados
            $conexao = mysqli_connect("localhost", "u529068110_fevereiro", "@Erick91492832", "u529068110_fevereiro");
            // Verifica se a conexão foi bem sucedida
            if (!$conexao) {
                die("Falha na conexão: " . mysqli_connect_error());
            }

            // Consulta para obter a quantidade total de convidados
            $query_quantidade_total = "SELECT COUNT(*) AS quantidade_total FROM convidados";
            $result_quantidade_total = mysqli_query($conexao, $query_quantidade_total);
            $row_quantidade_total = mysqli_fetch_assoc($result_quantidade_total);
            $quantidade_total = $row_quantidade_total["quantidade_total"];

            // Consulta para obter a quantidade total de confirmados
            $query_quantidade_confirmados = "SELECT COUNT(*) AS quantidade_confirmados FROM convidados WHERE confirmado = 1";
            $result_quantidade_confirmados = mysqli_query($conexao, $query_quantidade_confirmados);
            $row_quantidade_confirmados = mysqli_fetch_assoc($result_quantidade_confirmados);
            $quantidade_confirmados = $row_quantidade_confirmados["quantidade_confirmados"];

            // Consulta para obter a quantidade total de não confirmados
            $query_quantidade_nao_confirmados = "SELECT COUNT(*) AS quantidade_nao_confirmados FROM convidados WHERE confirmado = 0";
            $result_quantidade_nao_confirmados = mysqli_query($conexao, $query_quantidade_nao_confirmados);
            $row_quantidade_nao_confirmados = mysqli_fetch_assoc($result_quantidade_nao_confirmados);
            $quantidade_nao_confirmados = $row_quantidade_nao_confirmados["quantidade_nao_confirmados"];

            // Consulta para obter a quantidade de convidados por aniversariante
            $query_quantidade_por_aniversariante = "
                SELECT aniversariantes, COUNT(*) AS quantidade_por_aniversariante
                FROM convidados
                GROUP BY aniversariantes
            ";
            $result_quantidade_por_aniversariante = mysqli_query($conexao, $query_quantidade_por_aniversariante);

            // Fecha a conexão com o banco de dados
            mysqli_close($conexao);

            // Exibe a quantidade total de convidados e confirmados
            echo "<b>CONTAGEM TOTAL DE CONVIDADOS:<br></b>";
            echo "Total de convidados: " . $quantidade_total . "<br>";
            echo "Convidados ausentes: " . $quantidade_nao_confirmados . "<br>";
            echo "Convidados presentes: " . $quantidade_confirmados . "<br>";

            // Exibe a quantidade de convidados por aniversariante
            echo "<b><br>QUANTIDADE POR ANIVERSARIANTE:<br></b>";
            while ($row_quantidade_por_aniversariante = mysqli_fetch_assoc($result_quantidade_por_aniversariante)) {
                echo $row_quantidade_por_aniversariante['aniversariantes'] . ": " . $row_quantidade_por_aniversariante['quantidade_por_aniversariante'] . "<br>";
            }
            ?>
        </div>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Aniversariante</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Faz a conexão com o banco de dados
            $conexao = mysqli_connect("localhost", "u529068110_fevereiro", "@Erick91492832", "u529068110_fevereiro");
            // Verifica se a conexão foi bem sucedida
            if (!$conexao) {
                die("Falha na conexão: " . mysqli_connect_error());
            }

            // Seleciona todos os convidados
            $query = "SELECT nome, aniversariantes, confirmado FROM convidados ORDER BY nome ASC";
            $result = mysqli_query($conexao, $query);

            // Exibe cada convidado em uma linha da tabela
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["nome"] . "</td>";
                echo "<td>" . $row["aniversariantes"] . "</td>";
                if ($row["confirmado"]) {
                    echo "<td><i class='bi bi-check-circle-fill text-success'></i></td>";
                } else {
                    echo "<td><i class='bi bi-x-circle-fill text-danger'></i></td>";
                }
                echo "</tr>";
            }

            // Fecha a conexão com o banco de dados
            mysqli_close($conexao);
            ?>
        </tbody>
    </table>
</div>
    </div>
</body>
</html>