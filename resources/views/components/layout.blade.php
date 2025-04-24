<html>
<head>
    <title>{{ $title . ' | Brodhagens' ?? 'Brodhagens' }}</title>
    @basset('/css/brodhagens.css')
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">

</head>

<body>
    <header>
        <div class="menu">
            <x-menu></x-menu>
        </div>
        <footer>
            &copy; {{ date('Y') }} <a href="https://tannerbrodhagen.com" target="_blank">Tanner Brodhagen</a>
        </footer>
    </header>
    <main>
        {{ $slot }}
    </main>
</body>
</html>
