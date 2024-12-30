<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>LISTA DA SOCIAL (ADMIN)</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <meta name="robots" content="noindex">
    <style>
        .table-responsive {
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h2 class="text-center mb-4">Adicionar Convidado</h2>
                <form action="adicionar.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="documento">Documento:</label>
                        <input type="text" class="form-control" id="documento" name="documento" required>
                    </div>
                    <div class="form-group">
                        <label for="whatsapp">WhatsApp:</label><br>
        <input type="tel" id="telefone" name="whatsapp" required maxlength="15" oninput="formatarTelefone(this);">
        <span class="fab fa-whatsapp"></span>

    </div>
                    
                    <div class="form-group">
                        <label for="aniversariantes">Aniversariante:</label>
                        <select class="form-control" id="aniversariantes" name="aniversariantes" required>
                            <option value="Goulart">Goulart</option>
                            <option value="Thauana">Thauana</option>
                            <option value="Maicon">Maicon</option>
                            <option value="Angel">Angel</option>
                            <option value="Gui">Gui</option>
                            <option value="Diogo">Diogo</option>
                            <option value="Doce Acaso">Doce Acaso</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Adicionar</button>
                    <a href="index.php" class="btn btn-primary btn-block mt-3">Início</a>
                </form>
            </div>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Doc.</th>
                        <th>Whats</th>
                        <th>Opções</th>
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
                    $query = "SELECT id, nome, documento, whatsapp FROM convidados ORDER BY nome ASC";
                    $result = mysqli_query($conexao, $query);

                    // Verifica se há convidados cadastrados
                    if (mysqli_num_rows($result) > 0) {
                        // Loop através dos resultados e exibe cada convidado em uma linha da tabela
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["nome"] . "</td>";
                            echo "<td>" . $row["documento"] . "</td>";
                            echo "<td>" . $row["whatsapp"] . "</td>";
                            echo "<td class='d-flex flex-column'>";
                            echo "<a href='excluir.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm mb-1'>Remover</a>";
                            echo "<a href='editar.php?id=" . $row["id"] . "' class='btn btn-primary btn-sm'>Editar</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>Nenhum convidado cadastrado.</td></tr>";
                    }

                    // Fecha a conexão com o banco de dados
                    mysqli_close($conexao);
                    ?>
                </tbody>
            </table>
        </div>
            <script>
        function formatarTelefone(input) {
            // Remove todos os caracteres não numéricos
            var phoneNumber = input.value.replace(/\D/g, '');

            // Limita o número total de caracteres para 10
            phoneNumber = phoneNumber.slice(0, 10);

            // Adiciona o parêntese do DDD
            phoneNumber = phoneNumber.replace(/(\d{2})(\d{4})(\d{4})/, '($1) $2-$3');

            // Atualiza o valor no campo
            input.value = phoneNumber;
        }
    </script>
    </div>
</body>
</html>
