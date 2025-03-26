<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white flex flex-col">
            <!-- Profile Section -->
            <div class="p-4 text-center border-b border-gray-700">
                <img src="https://via.placeholder.com/80" alt="Profile" class="w-20 h-20 rounded-full mx-auto mb-2">
                <h3 class="text-lg font-semibold">Admin</h3>
                <p class="text-sm text-gray-400">Administrateur</p>
            </div>

            <!-- Menu -->
            <nav class="flex-1">
                <ul class="space-y-2 mt-4">
                    <li>
                        <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21V3m12 7h-3m0 0l-3 3m3-3l3 3" />
                            </svg>
                            Tableau de Bord
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.demandes') }}" class="flex items-center px-4 py-2 hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l-4-4m0 0l4-4m-4 4h16" />
                            </svg>
                            Demandes
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.stagiaires') }}" class="flex items-center px-4 py-2 hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Stagiaires
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6h6v6m-6 0h6m-6 0v-6m6 0v6" />
                            </svg>
                            Tâches
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.rapports') }}" class="flex items-center px-4 py-2 hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18m-9 5h9" />
                            </svg>
                            Rapports
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Logout Button -->
            <div class="p-4">
                <a href="#" class="flex items-center px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7" />
                    </svg>
                    Déconnexion
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <h1 class="text-3xl font-bold mb-6">Bienvenue, Administrateur</h1>

            <!-- Cards Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <!-- Card: Stagiaires -->
                <div class="bg-white shadow-lg rounded-lg p-6 flex items-center">
                    <div class="bg-blue-100 text-blue-600 p-3 rounded-full mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A4 4 0 0112 15h0a4 4 0 016.879 2.804M15 11a4 4 0 10-8 0 4 4 0 008 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold mb-2">Stagiaires</h3>
                        <p class="text-gray-600">Total : <span class="font-bold">120</span></p>
                        <p class="text-gray-600">Actifs : <span class="font-bold">80</span></p>
                        <p class="text-gray-600">Terminés : <span class="font-bold">40</span></p>
                    </div>
                </div>

                <!-- Card: Demandes -->
                <div class="bg-white shadow-lg rounded-lg p-6 flex items-center">
                    <div class="bg-yellow-100 text-yellow-600 p-3 rounded-full mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21V3m12 7h-3m0 0l-3 3m3-3l3 3" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold mb-2">Demandes</h3>
                        <p class="text-gray-600">En attente : <span class="font-bold">15</span></p>
                    </div>
                </div>

                <!-- Card: Tâches -->
                <div class="bg-white shadow-lg rounded-lg p-6 flex items-center">
                    <div class="bg-green-100 text-green-600 p-3 rounded-full mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6h6v6m-6 0h6m-6 0v-6m6 0v6" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold mb-2">Tâches</h3>
                        <p class="text-gray-600">Total : <span class="font-bold">50</span></p>
                        <p class="text-gray-600">Complétées : <span class="font-bold">30</span></p>
                        <div class="mt-2">
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-blue-600 h-2.5 rounded-full" style="width: 60%;"></div>
                            </div>
                            <p class="text-sm text-gray-500 mt-1">60% complétées</p>
                        </div>
                    </div>
                </div>

                <!-- Card: Rapports -->
                <div class="bg-white shadow-lg rounded-lg p-6 flex items-center">
                    <div class="bg-red-100 text-red-600 p-3 rounded-full mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18m-9 5h9" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold mb-2">Rapports</h3>
                        <p class="text-gray-600">Total : <span class="font-bold">20</span></p>
                        <p class="text-gray-600">En attente : <span class="font-bold">5</span></p>
                    </div>
                </div>
            </div>

            <!-- New Cards Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Card: Activités Récentes -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h3 class="text-lg font-bold mb-4">Activités Récentes</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <div class="bg-blue-100 text-blue-600 p-3 rounded-full mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21V3m12 7h-3m0 0l-3 3m3-3l3 3" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold">Nouvelle demande de stage reçue</p>
                                <p class="text-sm text-gray-500">Sophie Martin • Marketing • Il y a 15 minutes</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <div class="bg-green-100 text-green-600 p-3 rounded-full mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6h6v6m-6 0h6m-6 0v-6m6 0v6" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold">Tâche complétée en attente de validation</p>
                                <p class="text-sm text-gray-500">Jean Dupont • Développement Web • Il y a 30 minutes</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <div class="bg-red-100 text-red-600 p-3 rounded-full mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18m-9 5h9" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold">Nouveau rapport soumis</p>
                                <p class="text-sm text-gray-500">Alice Durand • Finance • Il y a 1 heure</p>
                            </div>
                        </li>
                    </ul>
                    <button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Voir toutes les activités
                    </button>
                </div>

                <!-- Card: Stages se terminant bientôt -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h3 class="text-lg font-bold mb-4">Stages se terminant bientôt</h3>
                    <ul class="space-y-4">
                        <li>
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="font-bold">Paul Morel</p>
                                    <p class="text-sm text-gray-500">Design Graphique • 5 jours restants</p>
                                </div>
                                <div class="w-1/3">
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                        <div class="bg-green-600 h-2.5 rounded-full" style="width: 90%;"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="font-bold">Claire Fontaine</p>
                                    <p class="text-sm text-gray-500">Ressources Humaines • 10 jours restants</p>
                                </div>
                                <div class="w-1/3">
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                        <div class="bg-green-600 h-2.5 rounded-full" style="width: 75%;"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Voir tous les stagiaires
                    </button>
                </div>
            </div>
        </main>
    </div>
</body>
</html>