<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Demandes</title>
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
                        <a href="{{ route('admin.demandes') }}" class="flex items-center px-4 py-2 bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l-4-4m0 0l4-4m-4 4h16" />
                            </svg>
                            Demandes
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <h1 class="text-3xl font-bold mb-6">Tableau de Bord - Demandes</h1>

            <!-- Filter Buttons and Search -->
            <div class="mb-4 flex items-center justify-between relative">
                <!-- Filter Buttons -->
                <div class="flex space-x-4">
                    <button class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700" onclick="filterTable('all')">Toutes</button>
                    <button class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-500" onclick="filterTable('En attente')">En attente</button>
                    <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-500" onclick="filterTable('Approuvée')">Approuvées</button>
                    <button class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500" onclick="filterTable('Refusée')">Refusées</button>
                </div>

                <!-- Search and Filter -->
                <div class="flex items-center space-x-4">
                    <!-- Search Bar -->
                    <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Rechercher..." class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" />

                    <!-- Filter Button -->
                    <button class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700 flex items-center" onclick="toggleDropdown()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zm0 6a1 1 0 011-1h10a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1v-2zm0 6a1 1 0 011-1h7a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1v-2z" />
                        </svg>
                        Filtrer
                    </button>
                </div>

                <!-- Dropdown Card -->
                <div id="filterDropdown" class="absolute top-16 left-0 right-0 mx-auto w-3/4 bg-white shadow-lg rounded-lg p-6 hidden z-10">
                    <h3 class="text-lg font-bold mb-4">Filtre Avancé</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="department" class="block text-sm font-medium text-gray-700">Département</label>
                            <select id="department" class="mt-1 block w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                                <option value="">Tous</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Développement">Développement</option>
                                <option value="Finance">Finance</option>
                            </select>
                        </div>
                        <div>
                            <label for="startDate" class="block text-sm font-medium text-gray-700">Date de début</label>
                            <input type="date" id="startDate" class="mt-1 block w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" />
                        </div>
                        <div>
                            <label for="sortBy" class="block text-sm font-medium text-gray-700">Trier par</label>
                            <select id="sortBy" class="mt-1 block w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                                <option value="name">Nom</option>
                                <option value="date">Date</option>
                                <option value="status">Statut</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-4 flex justify-end">
                        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Appliquer</button>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full table-auto" id="demandesTable">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-4 py-2 text-left">Nom</th>
                            <th class="px-4 py-2 text-left">Email</th>
                            <th class="px-4 py-2 text-left">Département</th>
                            <th class="px-4 py-2 text-left">Dates</th>
                            <th class="px-4 py-2 text-left">Statut</th>
                            <th class="px-4 py-2 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <!-- Exemple de ligne -->
                        <tr class="border-b" data-status="En attente">
                            <td class="px-4 py-2">Sophie Martin</td>
                            <td class="px-4 py-2">sophie.martin@example.com</td>
                            <td class="px-4 py-2">Marketing</td>
                            <td class="px-4 py-2">01/03/2025 - 30/06/2025</td>
                            <td class="px-4 py-2">
                                <span class="bg-yellow-100 text-yellow-600 px-2 py-1 rounded-full text-sm">En attente</span>
                            </td>
                            <td class="px-4 py-2">
                                <a href="#" class="text-blue-600 hover:text-blue-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12m0 0a3 3 0 11-6 0 3 3 0 016 0zm0 0c4.418 0 8 1.79 8 4m-16 0c0-2.21 3.582-4 8-4m0 0c-4.418 0-8-1.79-8-4m16 0c0 2.21-3.582 4-8 4" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        <tr class="border-b" data-status="Approuvée">
                            <td class="px-4 py-2">Jean Dupont</td>
                            <td class="px-4 py-2">jean.dupont@example.com</td>
                            <td class="px-4 py-2">Développement</td>
                            <td class="px-4 py-2">01/02/2025 - 31/05/2025</td>
                            <td class="px-4 py-2">
                                <span class="bg-green-100 text-green-600 px-2 py-1 rounded-full text-sm">Approuvée</span>
                            </td>
                            <td class="px-4 py-2">
                                <a href="#" class="text-blue-600 hover:text-blue-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12m0 0a3 3 0 11-6 0 3 3 0 016 0zm0 0c4.418 0 8 1.79 8 4m-16 0c0-2.21 3.582-4 8-4m0 0c-4.418 0-8-1.79-8-4m16 0c0 2.21-3.582 4-8 4" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        <tr class="border-b" data-status="Refusée">
                            <td class="px-4 py-2">Alice Durand</td>
                            <td class="px-4 py-2">alice.durand@example.com</td>
                            <td class="px-4 py-2">Finance</td>
                            <td class="px-4 py-2">01/01/2025 - 31/03/2025</td>
                            <td class="px-4 py-2">
                                <span class="bg-red-100 text-red-600 px-2 py-1 rounded-full text-sm">Refusée</span>
                            </td>
                            <td class="px-4 py-2">
                                <a href="#" class="text-blue-600 hover:text-blue-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12m0 0a3 3 0 11-6 0 3 3 0 016 0zm0 0c4.418 0 8 1.79 8 4m-16 0c0-2.21 3.582-4 8-4m0 0c-4.418 0-8-1.79-8-4m16 0c0 2.21-3.582 4-8 4" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <script>
        function filterTable(status) {
            const rows = document.querySelectorAll('#demandesTable tbody tr');
            rows.forEach(row => {
                if (status === 'all' || row.getAttribute('data-status') === status) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        function searchTable() {
            const input = document.getElementById('searchInput');
            const filter = input.value.toLowerCase();
            const rows = document.querySelectorAll('#demandesTable tbody tr');
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        }

        function toggleDropdown() {
            const dropdown = document.getElementById('filterDropdown');
            dropdown.classList.toggle('hidden');
        }
    </script>
</body>
</html>