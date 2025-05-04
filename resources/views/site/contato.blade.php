<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Super Gestão - Contato</title>
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

            .esquerda {
                float:left;
                background-color: #268fd0;
                width: 60%;
                height: 100%;
            }

            .direita {
                float:right;
                background-color: #2a9ee2;
                width: 40%;
                height: 100%;
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

            .video {
                margin: 40px;
            }

            .video img {
                max-width: 100%;
                max-height: 100%;
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
                <h1>Entre em contato conosco</h1>
            </div>

            <div class="informacao-pagina">
                <div class="contato-principal">
                    <form action={{ route('site.contato') }} method="get">
                        <input name="nome" type="text" placeholder="Nome" class="borda-preta">
                        <br>
                        <input name="telefone" type="text" placeholder="Telefone" class="borda-preta">
                        <br>
                        <input name="email" type="text" placeholder="E-mail" class="borda-preta">
                        <br>
                        <select class="borda-preta">
                            <option value="">Qual o motivo do contato?</option>
                            <option value="1">Dúvida</option>
                            <option value="2">Elogio</option>
                            <option value="3">Reclamação</option>
                        </select>
                        <br>
                        <textarea class="borda-preta">Preencha aqui a sua mensagem</textarea>
                        <br>
                        <button type="submit" class="borda-preta">ENVIAR</button>
                    </form>
                </div>
            </div>  
        </div>

        <div class="rodape">
            <div class="redes-sociais">
                <h2>Redes sociais</h2>
                <img src="img/facebook.png">
                <img src="img/linkedin.png">
                <img src="img/youtube.png">
            </div>
            <div class="area-contato">
                <h2>Contato</h2>
                <span>(11) 3333-4444</span>
                <br>
                <span>supergestao@dominio.com.br</span>
            </div>
            <div class="localizacao">
                <h2>Localização</h2>
                <img src="img/mapa.png">
            </div>
        </div>
    </body>
</html>