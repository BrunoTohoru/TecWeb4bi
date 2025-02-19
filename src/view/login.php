<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style-login.css">
    <title>Login</title>
</head>
<body>
    <main>
        <div class="login-box">
            <h2>Login</h2>
            <form method="post" action="/autenticar">
                <div class="user-box">
                    <input type="text" name="usuario" required=""/>
                    <label>Usuário</label>
                </div>
    
                <div class="user-box">
                    <input type="password" name="senha" required=""/>
                    <label>Senha</label>
                </div>
    
                <button class="btn-login" type="submit">Entrar</button>
            </form>    
        </div>
    </main>

</body>
</html>