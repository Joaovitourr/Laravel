<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Administrador</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
        }
        .sidebar {
            width: 250px;
            background: #007bff;
            color: white;
            padding: 15px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
        }
        .sidebar h2 {
            text-align: center;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 10px;
            border-bottom: 1px solid white;
            cursor: pointer;
        }
        .container {
            margin-left: 270px;
            width: calc(100% - 270px);
            padding: 20px;
        }
        .header {
            text-align: center;
            padding: 10px;
            background: #007bff;
            color: white;
            border-radius: 8px 8px 0 0;
        }
        .chamados {
            margin-top: 20px;
        }
        .chamado {
            background: #fff;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
        }
        .chamado p {
            margin: 5px 0;
        }
        .enviar-prazo {
            margin-top: 20px;
            background: #fff;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .enviar-prazo input, .enviar-prazo button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Menu</h2>
        <ul>
            <li>Chamados em Aberto</li>
            <li>Enviar Prazo ao Cliente</li>
        </ul>
    </div>
    <div class="container">
        <div class="header">
            <h1>Painel do Administrador</h1>
        </div>
        <div class="chamados">
            <h2>Chamados em Aberto</h2>
            <div class="chamado">
                <p><strong>Código de Barras:</strong> 123456789</p>
                <p><strong>Endereço do Cliente:</strong> Rua Exemplo, 123</p>
                <p><strong>Descrição:</strong> Problema técnico</p>
            </div>
        </div>
        <div class="enviar-prazo">
            <h2>Enviar Prazo ao Cliente</h2>
            <input type="text" placeholder="Digite o prazo">
            <button>Enviar</button>
        </div>
    </div>
</body>
</html>
