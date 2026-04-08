<!DOCTYPE html> <!-- Informa ao navegador que o documento está em HTML5 -->
<html lang="pt-br"> <!-- Início do HTML e definição do idioma como português do Brasil -->

<head> <!-- Cabeçalho da página: configurações internas -->
    <meta charset="UTF-8"> <!-- Permite acentos e caracteres especiais -->
    <title>Cadastro de Motos</title> <!-- Título que aparece na aba do navegador -->

    <style>
        /* Estiliza o corpo inteiro da página */
        body {
            margin: 0; /* Remove margem padrão do navegador */
            padding: 0; /* Remove espaçamento interno padrão */
            font-family: Arial, sans-serif; /* Define a fonte do texto */

            /* Define uma imagem de fundo */
            background: url('https://images.unsplash.com/photo-1581090700227-4c4d6d1b8d2e') no-repeat center center/cover;

            height: 100vh; /* Faz a altura ocupar 100% da tela */
        }

        /* Caixa principal do formulário */
        .container {
            background: rgba(0, 2, 14, 0.95); /* Fundo avermelhado com transparência */
            color: white; /* Cor do texto */

            width: 450px; /* Largura da caixa */
            padding: 50px; /* Espaçamento interno */
            border-radius: 25px; /* Bordas arredondadas */

            position: absolute; /* Permite posicionar livremente */
            top: 50%; /* Desce 50% da tela */
            left: 50%; /* Vai 50% para a direita */
            transform: translate(-50%, -50%); /* Centraliza exatamente no meio */
        }

        /* Estilo do título */
        h2 {
            text-align: center; /* Centraliza o texto */
            margin-bottom: 40px; /* Espaço abaixo do título */
        }

        /* Estilo dos rótulos dos campos */
        label {
            display: block; /* Faz cada label ocupar uma linha */
            margin-top: 20px; /* Espaço acima */
        }

        /* Estilo dos campos de entrada */
        input {
            width: 100%; /* Faz ocupar toda a largura da caixa */
            padding: 8px; /* Espaço interno */
            border: none; /* Remove borda padrão */
            border-radius: 5px; /* Bordas arredondadas */
            margin-top: 5px; /* Espaço acima */
        }

        /* Estilo do botão */
        button {
            width: 100%; /* Largura total */
            padding: 10px; /* Espaço interno */
            margin-top: 15px; /* Espaço acima */

            background-color: #0d711a; /* Cor de fundo verde */
            color: white; /* Cor do texto */

            border: none; /* Remove a borda padrão */
            border-radius: 5px; /* Bordas arredondadas */
            cursor: pointer; /* Muda o cursor para mãozinha */
        }

        /* Efeito ao passar o mouse no botão */
        button:hover {
            background-color: #007f50; /* Verde mais escuro */
        }

        /* Estilo da mensagem de retorno */
        .mensagem {
            margin-top: 10px; /* Espaço acima */
            text-align: center; /* Centraliza o texto */
            color: #00ffcc; /* Cor da mensagem */
        }
    </style>
</head>

<body> <!-- Corpo visível da página -->

    <div class="container"> <!-- Caixa principal -->
        <h2>Cadastro de Motos<br>ROTAM</h2> <!-- Título do formulário -->

        <form method="POST"> <!-- Formulário que envia os dados usando POST -->
            
            <label>Prefixo:</label> <!-- Texto do campo prefixo -->
            <input type="text" name="prefixo_mt" required> <!-- Campo de texto obrigatório -->

            <label>Modelo:</label> <!-- Texto do campo modelo -->
            <input type="text" name="modelo_mt" required> <!-- Campo de texto obrigatório -->

            <label>Placa:</label> <!-- Texto do campo placa -->
            <input type="text" name="placa_mt" required> <!-- Campo de texto obrigatório -->

            <button type="submit">Salvar</button> <!-- Botão que envia o formulário -->
        </form>

        <?php
        // Cria conexão com o banco de dados
        $conn = new mysqli("localhost", "root", "", "cadastro_php");

        // Verifica se houve erro na conexão
        if ($conn->connect_error) {
            die("Erro de conexão: " . $conn->connect_error); // Encerra o programa mostrando o erro
        }

        // Pega o valor enviado pelo campo prefixo
        // Se não existir, coloca vazio
        $prefixo_mt = $_POST["prefixo_mt"] ?? "";

        // Pega o valor enviado pelo campo modelo
        // Se não existir, coloca vazio
        $modelo_mt = $_POST["modelo_mt"] ?? "";

        // Pega o valor enviado pelo campo placa
        // Se não existir, coloca vazio
        $placa_mt = $_POST["placa_mt"] ?? "";

        // Verifica se o formulário foi enviado pelo método POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Monta o comando SQL para inserir os dados na tabela motos
            $sql = "INSERT INTO motos (prefixo_mt, modelo_mt, placa_mt)
                    VALUES ('$prefixo_mt', '$modelo_mt', '$placa_mt')";

            // Executa o comando SQL
            if ($conn->query($sql) === TRUE) {
                // Se salvar com sucesso, mostra mensagem positiva
                echo "<div class='mensagem'>Dados salvos com sucesso!</div>";
            } else {
                // Se der erro, mostra a mensagem do erro
                echo "<div class='mensagem'>Erro: " . $conn->error . "</div>";
            }
        }

        // Fecha a conexão com o banco
        $conn->close();
        ?>
    </div>

</body> <!-- Fim do corpo da página -->
</html> <!-- Fim do documento HTML -->