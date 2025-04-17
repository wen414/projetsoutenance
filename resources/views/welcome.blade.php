<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ministère des Affaires Sociales et de la Microfinance</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>
<body class="bg-gray-100 text-gray-800">
    <!-- Navbar -->
    <nav class="bg-white shadow-md fixed w-full z-10">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Logo -->
            <a href="#" class="flex items-center text-2xl font-bold text-blue-600">
                <i class="bx bx-home-alt-2 text-3xl mr-2"></i>
                Ministère des Affaires Sociales
            </a>
            
            <!-- Menu -->
            <ul class="flex space-x-6">
                <li>
                    <a href="#" class="flex items-center text-gray-600 hover:text-blue-600 font-medium">
                        <i class="bx bx-home-alt text-2xl mr-2"></i>
                        Accueil
                    </a>
                </li>
                <li>
                    <a href="{{ route('demande.create') }}" class="flex items-center text-gray-600 hover:text-blue-600 font-medium">
                        <i class="bx bx-file text-2xl mr-2"></i>
                        Demande de Stage
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center text-gray-600 hover:text-blue-600 font-medium">
                        <i class="bx bx-log-in text-2xl mr-2"></i>
                        Connexion
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="pt-32 pb-16 text-center bg-gradient-to-r from-purple-500 via-pink-500 to-red-500 text-white animate__animated animate__fadeIn">
        <div class="container mx-auto px-6">
            <h1 class="text-5xl font-bold animate__animated animate__fadeInDown">Bienvenue au Ministère des Affaires Sociales</h1>
            <p class="text-lg mt-4 animate__animated animate__fadeInUp">Engagés à soutenir le développement social et économique à travers des opportunités de stage.</p>
            <div class="mt-6">
                <a href="{{ route('demande.create') }}" class="bg-white text-blue-600 px-6 py-3 rounded-lg shadow-md font-semibold hover:bg-gray-100 animate__animated animate__pulse animate__infinite">Faire une Demande</a>
                <a href="#" class="ml-4 bg-blue-600 text-white px-6 py-3 rounded-lg shadow-md border hover:bg-blue-800 animate__animated animate__pulse animate__infinite">Se connecter</a>
            </div>
        </div>
    </header>

    <!-- Dashboard Links Section -->
    <section class="py-16 bg-gradient-to-r from-green-50 via-green-100 to-green-200">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-gray-900 animate__animated animate__fadeIn">Accès aux Tableaux de Bord</h2>
            <p class="text-gray-600 mt-2 animate__animated animate__fadeIn">Cliquez sur un tableau de bord pour y accéder directement.</p>
            <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- DPAF Dashboard -->
                <a href="{{ route('dpaf.dashboard') }}" class="bg-white shadow-lg rounded-lg p-6 hover:shadow-xl transition-shadow duration-300 animate__animated animate__zoomIn">
                    <div class="bg-blue-100 text-blue-600 w-16 h-16 flex items-center justify-center rounded-full mx-auto">
                        <i class="bx bx-building text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mt-4">DPAF</h3>
                    <p class="text-gray-600 mt-2">Accéder au tableau de bord du DPAF.</p>
                </a>
                <!-- C/SRHDS Dashboard -->
                <a href="{{ route('c_srhds.dashboard') }}" class="bg-white shadow-lg rounded-lg p-6 hover:shadow-xl transition-shadow duration-300 animate__animated animate__zoomIn animate__delay-1s">
                    <div class="bg-green-100 text-green-600 w-16 h-16 flex items-center justify-center rounded-full mx-auto">
                        <i class="bx bx-group text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mt-4">C/SRHDS</h3>
                    <p class="text-gray-600 mt-2">Accéder au tableau de bord du C/SRHDS.</p>
                </a>
                <!-- Directeur Dashboard -->
                <a href="{{ route('directeur.dashboard') }}" class="bg-white shadow-lg rounded-lg p-6 hover:shadow-xl transition-shadow duration-300 animate__animated animate__zoomIn animate__delay-2s">
                    <div class="bg-yellow-100 text-yellow-600 w-16 h-16 flex items-center justify-center rounded-full mx-auto">
                        <i class="bx bx-user text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mt-4">Directeur</h3>
                    <p class="text-gray-600 mt-2">Accéder au tableau de bord du Directeur.</p>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-6 bg-gray-800 text-gray-400">
        <div class="container mx-auto px-6 text-center">
            <p>&copy; 2025 Ministère des Affaires Sociales et de la Microfinance. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>
