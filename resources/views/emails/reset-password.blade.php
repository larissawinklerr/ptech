<!DOCTYPE html>
<html>
<head>
    <title>Recuperação de Senha</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
        }
        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Recuperação de Senha</h2>
        
        <p>Olá,</p>
        
        <p>Recebemos uma solicitação para redefinir a senha da sua conta. Se você não fez esta solicitação, ignore este e-mail.</p>
        
        <p>Para redefinir sua senha, clique no botão abaixo:</p>
        
        <a href="{{ $actionUrl }}" class="button">Redefinir Senha</a>
        
        <p>Se o botão não funcionar, você pode copiar e colar o seguinte link no seu navegador:</p>
        
        <p>{{ $actionUrl }}</p>
        
        <p>Este link de recuperação expirará em 60 minutos.</p>
        
        <div class="footer">
            <p>Este é um e-mail automático, por favor não responda.</p>
        </div>
    </div>
</body>
</html> 