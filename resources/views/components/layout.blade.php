<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title . ' | Brodhagens' ?? 'Brodhagens' }}</title>
    
    @basset('/css/brodhagens.css')
    
    @stack('preload')
    
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,200" as="style" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,200" />
    
    @basset('/js/app.js')
</head>

<body>
    <header>
        <button class="hamburger" onclick="toggleMenu()">
            <span class="material-symbols-outlined">menu</span>
        </button>
        
        <div class="menu">
            <x-menu></x-menu>
        </div>
        <div class="author">
                <h2>
                    Tanner Brodhagen
                </h2>
        </div>
    </header>
    <main>
        {{ $slot }}
    </main>
    <footer>
        <p>&copy; {{ date('Y') }} <a href="https://tannerbrodhagen.com" target="_blank">Tanner Brodhagen</a></p>
    </footer>
</body>
</html>
