<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, max-age=0, post-check=0, pre-check=0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="Sat, 01 Jan 2000 00:00:00 GMT">
    <meta http-equiv="X-Frame-Options" content="DENY">
    <meta http-equiv="X-Content-Type-Options" content="nosniff">
    <meta http-equiv="X-XSS-Protection" content="1; mode=block">
    <title>@yield('titulo')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <script>
        // Previne cache do navegador
        window.addEventListener('pageshow', function(event) {
            if (event.persisted) {
                window.location.href = '{{ route("site.login") }}';
            }
        });

        // Previne navegação para trás
        window.addEventListener('popstate', function(event) {
            window.location.href = '{{ route("site.login") }}';
        });
    </script>

    @yield('conteudo')
</body>
</html> 