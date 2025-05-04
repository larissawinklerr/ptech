<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>PTECH - Gestão Pecuária</title>
        <meta charset="utf-8">

        <style>
            html, body {
                height: 100%;
                margin: 0;
                font-family: 'Roboto', sans-serif;
            }

            p, span {
                color: #ffffff;
            }

            h1 {
                color: #ffffff;
                font-size: 28px;
            }

            h2 {
                color: #333333;
                font-size: 22px;
            }

            input, select, textarea, button {
                width: 100%;
                padding: 10px 15px;
                margin: 10px 0px 10px 0px;
                box-sizing: border-box;
                border-radius: 3px;
                background-color: transparent;
                color: #333;
            }

            .texto-branco {
                color: #ffffff;
            }

            .borda-branca {
                border: solid 1px #fff;
            }

            .borda-preta {
                border: solid 1px #333;
            }

            button {
                background-color: #7ab829;
                cursor: pointer;
                color: #fff;
            }

            button:hover {
                background-color: #6ea22c;
            }

            ::placeholder {
                color: #333333;
                opacity: 1;
            }

            :-ms-input-placeholder {
                color: #333333;
            }

            ::-ms-input-placeholder {
                color: #333333;
            }

            .topo {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #2e1b08;
            padding: 5px 0px;
            z-index: 1000; /* Garante que fique acima de outros elementos */
            }

            .logo img {
            width: 80px; /* Ajuste para o tamanho desejado */
            float: left;
            height: auto; /* Mantém a proporção */
            }


            .menu {
            position: absolute;
            top: 50%; /* Move para o meio verticalmente */
            right: 40px; /* Mantém os itens alinhados à direita */
            transform: translateY(-50%); /* Ajusta para centralizar na borda superior */
            }

            .menu li {
                display: inline;
                float: left;
            }

            .menu ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
            }

            .menu a {
                text-decoration: none;
                padding: 14px 16px;
                color: #ffffff;
            }

            .menu a:hover {
                color: #f17800;
            }

            .conteudo-destaque {
                width: 100%;
                height: 100%;
                min-height: 800px; 
            }

            body {
            height: 100%;
            margin: 0;
            font-family: 'Roboto', sans-serif;
    
    /* Adicionando a imagem de fundo */
            background-image: url("{{ asset('img/fundoprincipal.png') }}"); /* Substitua 'fundo.jpg' pelo nome da sua imagem */
            background-size: cover; /* Faz a imagem cobrir toda a tela */
            background-position: top center; /* Centraliza a imagem */
            background-attachment: fixed; /* Mantém a imagem fixa ao rolar a página */
}

            .informacoes, .contato {
                margin: 100px 40px 40px 40px;
            }

            .contato-principal {
                margin: 0px 60px 60px 40px;
            }

            .chamada {
                margin-top: 30px;
                margin-left: 20px;
            }

            .banner-container {
            display: flex;
            justify-content: flex-end; /* Centraliza horizontalmente */
            align-items: center; /* Centraliza verticalmente */
            width: 100%
            position: relative;
            }

            .banner {
            width: 50%;
            max-width: 1000px;
            margin-right: 10%
            position: relative;
            margin-top: -15% !important;  /* Aumente para subir mais */
            right: 50%;  /* Ajuste para trazer mais para o centro */
            left: 50%;
            transform: translateX(-10%);
            box-shadow: 0 0 20px 10px rgba(255, 255, 255, 0.2); /* Ajuste os valores conforme necessário */
            border-radius: 10px; /* Suaviza as bordas */
            }


            .conteudo-pagina {
                width: 100%;
                height: 100%;
                text-align: center;
                margin-bottom: 100px;
            }

            .titulo-pagina {
                padding: 100px 0px 60px 0px;
                background-color: #2a9ee2;
                text-align: center;
            }

            .informacao-pagina {
                text-align: center;
                margin-top: 30px;
            }

            .informacao-pagina p{
                color: #333;
            }

            .rodape {
                width: 100%;
            }

            .redes-sociais, .area-contato, .localizacao {
                width: 33.333%;
                border-top:solid 1px #ccc;
                float: left;
                text-align: center;
                background-color: #f8f8f8;
                height: 250px;
            }

            .redes-sociais, .area-contato, .localizacao p, span {
                color: #333333;
            }

            .redes-sociais img {
                margin: 0px 15px 0px 15px;
            }

        </style>
    </head>

    <body>
        <div class="topo">

            <div class="logo">
                <img src="{{ asset('img/logo.png') }}">
            </div>

            <div class="menu">
                <ul>
                    <li><a href="{{ route('site.index') }}">Principal</a></li>
                    <li><a href="{{ route('site.sobrenos') }}">Sobre Nós</a></li>
                    <li><a href="{{ route('site.contato') }}">Contato</a></li>
                </ul>
            </div>
        </div>

        <div class="conteudo-destaque">
        
            <div class="esquerda">
                <div class="informacoes">
                    <h1>PTECH - Gestão Pecuária</h1>
                    <p>Gerencie seu rebanho de forma eficiente e organizada com nossa plataforma de gestão pecuária.<p>
                    <div class="chamada">
                        <img src="/img/check.png">
                        <span class="texto-branco">Acesse de qualquer lugar, a qualquer momento.</span>
                    </div>
                    <div class="chamada">
                        <img src="img/check.png">
                        <span class="texto-branco">Transforme sua fazenda com tecnologia!</span>
                    </div>
                    <div class="chamada">
                        <img src="img/check.png">
                        <span class="texto-branco">Gerencie a vacinação do seu gado e mantenha a saúde do rebanho em dia.</span>
                    </div>
                    <div class="chamada">
                        <img src="img/check.png">
                        <span class="texto-branco">Registre nascimentos, manejos e ocorrências de forma organizada e segura.</span>
                    </div>
                </div>

            <div class="banner-container">
                <img src="{{ asset('img/inicial.png') }}" alt="Banner" class="banner">
            </div>            

        </div>
    </body>
</html>