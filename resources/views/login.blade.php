
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <!-- Importando o arquivo CSS 'login.css' -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

</head>

<style> 






</style>

<body>

    <div class="login-container">
        <div class="login-box">
            <h2>Login</h2>


          

            <form action="{{ url('authLogin') }}" method="POST">

                @csrf   
       

                <div class="textbox">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="textbox">
                    <input type="password" name="password" placeholder="Senha" required>
                </div>
                <button type="submit" class="btn">Entrar</button>

                <div class="footer">
                    <p>Não tem conta? <a href="{{ url('register') }}">Cadastre-se</a></p>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
