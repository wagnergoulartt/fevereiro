<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>LISTA DA SOCIAL (SEGURANÇA)</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <meta name="robots" content="noindex">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
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

            // Consulta para obter a quantidade de convidados
            $query_quantidade_convidados = "SELECT COUNT(*) AS quantidade_convidados FROM convidados";
            $result_quantidade_convidados = mysqli_query($conexao, $query_quantidade_convidados);
            $row_quantidade_convidados = mysqli_fetch_assoc($result_quantidade_convidados);
            $quantidade_convidados = $row_quantidade_convidados["quantidade_convidados"];

            // Consulta para obter a quantidade de confirmados
            $query_quantidade_confirmados = "SELECT COUNT(*) AS quantidade_confirmados FROM convidados WHERE confirmado = 1";
            $result_quantidade_confirmados = mysqli_query($conexao, $query_quantidade_confirmados);
            $row_quantidade_confirmados = mysqli_fetch_assoc($result_quantidade_confirmados);
            $quantidade_confirmados = $row_quantidade_confirmados["quantidade_confirmados"];

            // Consulta para obter a quantidade de não confirmados
            $query_quantidade_nao_confirmados = "SELECT COUNT(*) AS quantidade_nao_confirmados FROM convidados WHERE confirmado = 0";
            $result_quantidade_nao_confirmados = mysqli_query($conexao, $query_quantidade_nao_confirmados);
            $row_quantidade_nao_confirmados = mysqli_fetch_assoc($result_quantidade_nao_confirmados);
            $quantidade_nao_confirmados = $row_quantidade_nao_confirmados["quantidade_nao_confirmados"];

            // Fecha a conexão com o banco de dados
            mysqli_close($conexao);

            // Exibe a quantidade de convidados e confirmados
            echo "Total de convidados: " . $quantidade_convidados . "<br>";
            echo "Convidados presentes: " . $quantidade_confirmados . "<br>";
            echo "Convidados ausentes: " . $quantidade_nao_confirmados;
            ?>
        </div>
        <div class="table-responsive">
            <form action="confirmacao.php" method="post">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>LISTA DE CONVIDADOS DA SOCIAL</th>
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
                        $query = "SELECT * FROM convidados ORDER BY nome ASC";
                        $result = mysqli_query($conexao, $query);

                        // Exibe cada convidado em uma linha da tabela
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td style='display: flex; align-items: center;'>";

    // Nome e Documento
    echo "<div style='margin-left: 10px; flex-grow: 1;'>";
    echo "<span style='color: " . ($row['cor'] == 'vermelho' ? 'red' : ($row['cor'] == 'verde' ? 'green' : ($row['cor'] == 'amarelo' ? 'yellow' : 'black'))) . ";'>" . $row["nome"] . "</span>";
    echo "<br>";
    echo "<span style='color: " . ($row['cor'] == 'vermelho' ? 'red' : ($row['cor'] == 'verde' ? 'green' : ($row['cor'] == 'amarelo' ? 'yellow' : 'black'))) . ";'>" . $row["documento"] . "</span>";

    // Adiciona o aniversariante em vermelho
    if (!empty($row["aniversariantes"])) {
        echo "<br>";
        echo "<span style='color: red; font-weight: bold;'>" . $row["aniversariantes"] . "</span>";
    }

    echo "</div>";

    // Botões
    echo "<div>";
    if ($row["confirmado"]) {
        echo "<button type=\"submit\" name=\"id\" value=\"" . $row["id"] . "\" class=\"btn btn-success\">Confirmado</button>";
    } else {
        echo "<button type=\"submit\" name=\"id\" value=\"" . $row["id"] . "\" class=\"btn btn-danger\">Confirmar</button>";
    }
    echo "</div>";

    echo "</td>";
    echo "</tr>";
}

                        // Fecha a conexão com o banco de dados
                        mysqli_close($conexao);
                        ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</body>
</html>