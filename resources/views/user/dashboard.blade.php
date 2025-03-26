<!-- filepath: /Users/obeyowen/GestionStagiaires/resources/views/user/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Utilisateur</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="#" class="text-2xl font-bold text-blue-600">Utilisateur Dashboard</a>
            <ul class="flex space-x-6">
                <li><a href="#" class="text-gray-600 hover:text-blue-600">Accueil</a></li>
                <li><a href="#" class="text-gray-600 hover:text-blue-600">Mes Tâches</a></li>
                <li><a href="#" class="text-gray-600 hover:text-blue-600">Mes Documents</a></li>
                <li><a href="#" class="text-gray-600 hover:text-blue-600">Profil</a></li>
            </ul>
            <div class="flex items-center space-x-4">
                <img src="https://via.placeholder.com/40" alt="User" class="w-10 h-10 rounded-full">
                <span class="text-gray-600">Bonjour, Stagiaire</span>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container mx-auto py-10">
        <h1 class="text-3xl font-bold mb-6">Bienvenue, Stagiaire</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-xl font-bold mb-4">Mes Tâches</h3>
                <p class="text-gray-600">Consultez et complétez vos tâches assignées.</p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-xl font-bold mb-4">Mes Documents</h3>
                <p class="text-gray-600">Téléchargez et gérez vos documents.</p>
            </div>
        </div>
    </div>
</body>
</html>