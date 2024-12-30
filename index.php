<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="/social/style.css">
    <meta name="robots" content="noindex">
    <title>SOCIAL DE FEVEREIRO</title>
    <style>
@import url("https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap");
* {
  margin: 0;
  padding: 0;
  /* user-select: none; */
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
html,
body {
  height: 100%;
}
body {
  display: grid;
  place-items: center;
  background: #dde1e7;
  text-align: center;
}
.content {
  width: 360px;
  padding: 40px 30px;
  background: #dde1e7;
  border-radius: 10px;
  box-shadow: -3px -3px 7px #ffffff73, 2px 2px 5px rgba(94, 104, 121, 0.288);
}
.content .text {
  font-size: 33px;
  font-weight: 600;
  margin-bottom: 35px;
  color: #595959;
}
.field {
  height: 50px;
  width: 100%;
  margin-bottom: 15px;
  display: flex;
  position: relative;
}
.field:nth-child(2) {
  margin-top: 20px;
}
.field input {
  height: 100%;
  width: 100%;
  padding-left: 45px;
  outline: none;
  border: none;
  font-size: 12px;
  background: #dde1e7;
  color: #595959;
  border-radius: 25px;
  box-shadow: inset 2px 2px 5px #babecc, inset -5px -5px 10px #ffffff73;
}
.field input:focus {
  box-shadow: inset 1px 1px 2px #babecc, inset -1px -1px 2px #ffffff73;
}
.field span {
  position: absolute;
  color: #595959;
  width: 50px;
  line-height: 50px;
}
.field label {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  left: 45px;
  font-size: 14px; 
  pointer-events: none;
  color: #666666;
  
}
.field input:valid ~ label {
  opacity: 0;
}
.forgot-pass {
  text-align: left;
  margin: 10px 0 10px 5px;
}
.forgot-pass a {
  font-size: 16px;
  color: #3498db;
  text-decoration: none;
}
.forgot-pass:hover a {
  text-decoration: underline;
}
button {
  margin: 30px 0;
  width: 100%;
  height: 50px;
  font-size: 18px;
  line-height: 50px;
  font-weight: 600;
  background: #dde1e7;
  border-radius: 25px;
  border: none;
  outline: none;
  cursor: pointer;
  color: #595959;
  box-shadow: 2px 2px 5px #babecc, -5px -5px 10px #ffffff73;
}
button:focus {
  color: #3498db;
  box-shadow: inset 2px 2px 5px #babecc, inset -5px -5px 10px #ffffff73;
}
.sign-up {
  margin: 5px 0;
  color: #595959;
  font-size: 16px;
  
}
.sign-upp {
  margin: 5px 0;
  color: #595959;
  font-size: 14px;
}
.sign-up a {
  margin-top: 5px;
  color: #3498db;
  text-decoration: none;
}
.sign-up a:hover {
  text-decoration: underline;
}
.field select {
    background: #dde1e7; /* Fundo branco */
    border: 1px solid #dde1e7; /* Adicionado uma borda */
    border-radius: 25px;
    box-shadow: inset 2px 2px 5px #babecc, inset -5px -5px 10px #ffffff73;
    padding-left: 15px; /* Espaço nas laterais do texto (ajuste conforme necessário) */

}

/* Estilizando o rótulo do campo de respostas */
.field label[for="respostas"] {
    background: #ffffff; /* Fundo branco */
    padding: 0 0px;
    text-align: center;
}

/* Centralizando o rótulo */
.field {
    text-align: center;
}
   .message {
        margin-bottom: 10px;
        text-align: center;
    }

    .message p {
        font-size: 14px; /* Tamanho de fonte reduzido */
        margin-bottom: 3px; /* Espaçamento abaixo da mensagem */
        color: #777; /* Cor de texto opcional */
    }
    </style>
</head>
<body>
<div class="content">
    <form action="adicionar.php" method="post">

        <div class="message">
            <p>Insira seu nome e sobrenome:</p>
        </div>
        <div class="field">
            <input type="text" id="nome-sobrenome" name="nome" required>
            <span class="fas fa-user"></span>
            <label for="nome-sobrenome">Ex. Ricardo Silva</label>
        </div>

        <div class="message">
            <p>Insira os últimos 5 N° do seu doc.:</p>
        </div>
        <div class="field">
            <input type="text" id="ultimos-5-numeros" name="documento" required pattern="[0-9]{5}" title="Digite exatamente 5 números." oninput="hideLabel('documentoLabel')">
            <span class="fas fa-id-badge"></span>
            <label id="documentoLabel">Ex. 12345</label>
        </div>

        <div class="message">
            <p>Whatsapp sem o 9 e com o DDD 51 antes:</p>
        </div>
        <div class="field">
            <input type="tel" id="telefone" name="whatsapp" required maxlength="15" oninput="formatarTelefone(this);">
            <span class="fab fa-whatsapp"></span>
            <label for="telefone">Ex. 5192402159</label>
        </div>

        <!-- Campo para respostas definidas -->
        <div class="sign-upp">
            Selecione o aniversariante<br> que te convidou abaixo:
        </div>
        <div class="field">
            <select id="respostas" name="aniversariantes" required>
                <option value="Goulart">Goulart</option>
                <option value="Thauana">Thauana</option>
                <option value="Larrisa">Larissa</option>
                <option value="Aline">Aline</option>
                <option value="Gui">Gui</option>
                <option value="Francy">Francy</option>
                <option value="Diniz">Diniz</option>
            </select>
        </div>

        <button type="submit">Enviar</button>
    </form>
</div>

    
        <script>
        function hideLabel(labelId) {
            var label = document.getElementById(labelId);
            if (label) {
                label.style.display = 'none';
            }
        }
    </script>
    
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
    
    <div class="sign-up">
        Desenvolvido por
        <a href="https://wa.me/5551984112140">Goulart</a>
    </div>
</body>
</html>
