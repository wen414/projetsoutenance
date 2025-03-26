<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Rapports</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white flex flex-col">
            <div class="p-4 text-center border-b border-gray-700">
                <h3 class="text-lg font-semibold">Admin</h3>
                <p class="text-sm text-gray-400">Administrateur</p>
            </div>
            <nav class="flex-1">
                <ul class="space-y-2 mt-4">
                    <li>
                        <a href="{{ route('admin.rapports') }}" class="flex items-center px-4 py-2 bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18m-9 5h9" />
                            </svg>
                            Rapports
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <h1 class="text-3xl font-bold mb-6">Tableau de Bord - Rapports</h1>
            <p>Contenu spécifique aux rapports ici...</p>
        </main>
    </div>
</body>
</html>