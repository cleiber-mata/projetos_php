```html
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistema de Cadastro de Viaturas ROTAM</title>

    <style>

        body{
            background-color: #f4f4f4;
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        h1{
            margin-top: 40px;
            color: #222;
        }

        .menu{
            margin-top: 50px;
        }

        .menu button{

            width: 260px;
            padding: 15px;
            margin: 10px;

            font-size: 18px;
            font-weight: bold;

            border: none;
            border-radius: 10px;

            background-color: #222;
            color: white;

            cursor: pointer;

            transition: 0.3s;

            box-shadow: 2px 2px 10px rgba(0,0,0,0.2);

        }

        .menu button:hover{

            background-color: #444;

            transform: scale(1.03);

        }

    </style>

</head>

<body>

    <h1>Sistema de Cadastro de Viaturas ROTAM</h1>

    <div class="menu">

        <button onclick="window.location.href='cadastro_motos_gpt.php'">
            Cadastro de Motos
        </button>

        <button onclick="window.location.href='pesquisar_moto.php'">
            Pesquisar Moto
        </button>

        <button onclick="window.location.href='cadastro_policial.php'">
            Cadastro de Policiais
        </button>

        <button onclick="window.location.href='manutencao.php'">
            Manutenção
        </button>

        <button onclick="window.location.href='relatorios.php'">
            Relatórios
        </button>

    </div>

</body>

</html>
```
