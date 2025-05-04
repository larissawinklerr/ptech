<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Super Gestão - Sobre Nós</title>
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
            top: 50%;
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
    
            /*imagem de fundo */
            background-image: url("{{ asset('img/fundoprincipal.png') }}");
            background-size: cover;
            background-position: top center;
            background-attachment: fixed;
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

            .conteudo-pagina {
                width: 100%;
                height: 100%;
                text-align: center;
                margin-bottom: 100px;
            }

            .titulo-pagina {
                padding: 100px 0px 10px 0px;
                background-color: #c77e09;
                text-align: center;
            }

            .informacao-pagina {
                text-align: center;
                margin-top: 5px;
            }

            .informacao-pagina p{
                color: #ffffff;
            }

            .rodape {
                width: 100%;
            }

            .redes-sociais, .area-contato, .localizacao {
                width: 33.333%;
                border-top:solid 1px #c77e09;
                float: left;
                text-align: center;
                background-color: #c77e09;
                height: 200px;
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
                <img src="img/logo.png">
            </div>

            <div class="menu">
                <ul>
                    <li><a href="{{ route('site.index') }}">Principal</a></li>
                    <li><a href="{{ route('site.sobrenos') }}">Sobre Nós</a></li>
                    <li><a href="{{ route('site.contato') }}">Contato</a></li>
                </ul>
            </div>
        </div>

        <div class="conteudo-pagina">
            <div class="titulo-pagina">
                <h1>Sobre Nós – PTECH 2025</h1>
            </div>

            <div class="informacao-pagina">
                <p>Na PTECH, acreditamos que a tecnologia é a chave para uma pecuária mais eficiente, sustentável e lucrativa. Nossa missão é transformar a maneira como os pecuaristas gerenciam seus rebanhos, oferecendo uma plataforma intuitiva e poderosa para facilitar o dia a dia no campo.</p>
                <p>Com anos de experiência no setor agropecuário e uma equipe apaixonada por inovação, desenvolvemos uma solução que permite acompanhar de perto cada detalhe da sua fazenda. Desde o monitoramento do rebanho até o controle de vacinas, manejos e finanças, nossa plataforma garante mais controle, segurança e praticidade.</p>
            </div>  
        </div>

        <div class="rodape">
            <div class="redes-sociais">
                <h2>Redes sociais</h2>
                <img src="{{ asset('img/facebook.png') }}">
                <img src="{{ asset('img/linkedin.png') }}">
            </div>
            <div class="area-contato">
                <h2>Contato</h2>
                <span>(42) 9 8834-2659</span>
                <br>
                <span>gestaoptech@gmail.com.br</span>
            </div>
            <div class="localizacao">
                <h2>Localização</h2>
                <img src="{{ asset('img/mapa.png') }}">
            </div>
        </div>
    </body>
</html>