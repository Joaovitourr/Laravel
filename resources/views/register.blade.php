

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar - Sistema</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>

    <div class="register-container">
        <div class="register-box">
            <h2>Cadastrar</h2>

            <!-- Exibe erros de validação -->
            <?php if ($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach ($errors->all() as $error): ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>


            <form action="{{ route('rules') }}" method="POST">

                @csrf
                
                <div class="textbox">
                    <input type="text" name="name" placeholder="Nome Completo" value="{{ old('name') }}" required>
                </div>
                
                <div class="textbox">
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                </div>

                <div class="textbox">
                    <input type="password" name="password" placeholder="Senha" required>
                </div>

              

                <button type="submit" class="btn">Cadastrar</button>

                <div class="footer">
                    <p>Já tem uma conta? <a href="{{ url('login') }}">Login</a></p>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
