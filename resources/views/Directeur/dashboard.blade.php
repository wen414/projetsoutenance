<!-- filepath: /Users/obeyowen/GestionStagiaires/resources/views/Directeur/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Directeur</title>
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
            <a href="#" class="text-2xl font-bold text-blue-600 flex items-center">
                <i class="bx bx-home-alt-2 text-3xl mr-2"></i>
                Dashboard Directeur
            </a>

            <!-- Menu -->
            <ul class="flex space-x-6">
                <li>
                    <a href="#" class="text-gray-600 hover:text-blue-600 font-medium flex items-center">
                        <i class="bx bx-home-alt text-2xl mr-2"></i>
                        Accueil
                    </a>
                </li>
                <li>
                    <a href="#" class="text-gray-600 hover:text-blue-600 font-medium flex items-center">
                        <i class="bx bx-folder text-2xl mr-2"></i>
                        Documents
                    </a>
                </li>
                <li>
                    <a href="#" class="text-gray-600 hover:text-blue-600 font-medium flex items-center">
                        <i class="bx bx-bar-chart-alt text-2xl mr-2"></i>
                        Rapports
                    </a>
                </li>
            </ul>

            <!-- User Info -->
            <div class="flex items-center space-x-4">
                <img src="https://via.placeholder.com/40" alt="User" class="w-10 h-10 rounded-full">
                <span class="text-gray-600">Bonjour, Directeur</span>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container mx-auto py-20">
        <h1 class="text-3xl font-bold mb-6 animate__animated animate__fadeInDown">Bienvenue, Directeur</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Card 1 -->
            <div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-xl transition-shadow duration-300 animate__animated animate__zoomIn">
                <div class="flex items-center justify-center bg-blue-100 text-blue-600 w-16 h-16 rounded-full mb-4">
                    <i class="bx bx-task text-4xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Gestion des Tâches</h3>
                <p class="text-gray-600">Attribuez et suivez les tâches des membres de votre équipe.</p>
                <a href="#" class="text-blue-600 hover:underline mt-4 inline-block">Voir plus</a>
            </div>
            <!-- Card 2 -->
            <div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-xl transition-shadow duration-300 animate__animated animate__zoomIn animate__delay-1s">
                <div class="flex items-center justify-center bg-green-100 text-green-600 w-16 h-16 rounded-full mb-4">
                    <i class="bx bx-folder text-4xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Gestion des Documents</h3>
                <p class="text-gray-600">Téléchargez et gérez les documents importants.</p>
                <a href="#" class="text-blue-600 hover:underline mt-4 inline-block">Voir plus</a>
            </div>
            <!-- Card 3 -->
            <div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-xl transition-shadow duration-300 animate__animated animate__zoomIn animate__delay-2s">
                <div class="flex items-center justify-center bg-yellow-100 text-yellow-600 w-16 h-16 rounded-full mb-4">
                    <i class="bx bx-bar-chart text-4xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Rapports</h3>
                <p class="text-gray-600">Consultez et analysez les rapports d'activité.</p>
                <a href="#" class="text-blue-600 hover:underline mt-4 inline-block">Voir plus</a>
            </div>
            <!-- Card 4 -->
            <div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-xl transition-shadow duration-300 animate__animated animate__zoomIn animate__delay-3s">
                <div class="flex items-center justify-center bg-red-100 text-red-600 w-16 h-16 rounded-full mb-4">
                    <i class="bx bx-envelope text-4xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Messages</h3>
                <p class="text-gray-600">Consultez vos messages et notifications.</p>
                <a href="#" class="text-blue-600 hover:underline mt-4 inline-block">Voir plus</a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="py-6 bg-gray-800 text-gray-400">
        <div class="container mx-auto text-center">
            <p>&copy; 2025 Ministère des Affaires Sociales et de la Microfinance. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>