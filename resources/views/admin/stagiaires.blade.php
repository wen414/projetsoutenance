<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Stagiaires</title>
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
                        <a href="{{ route('admin.stagiaires') }}" class="flex items-center px-4 py-2 bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Stagiaires
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <h1 class="text-3xl font-bold mb-6">Tableau de Bord - Stagiaires</h1>

            <!-- Filter Buttons and Search -->
            <div class="mb-4 flex items-center justify-between relative">
                <!-- Filter Buttons -->
                <div class="flex space-x-4">
                    <button class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700" onclick="filterTable('all')">Tous</button>
                    <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-500" onclick="filterTable('Actifs')">Actifs</button>
                    <button class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500" onclick="filterTable('Terminés')">Terminés</button>
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
                            <label for="supervisor" class="block text-sm font-medium text-gray-700">Superviseur</label>
                            <select id="supervisor" class="mt-1 block w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                                <option value="">Tous</option>
                                <option value="John Doe">John Doe</option>
                                <option value="Jane Smith">Jane Smith</option>
                            </select>
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
                <table class="min-w-full table-auto" id="stagiairesTable">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-4 py-2 text-left">ID</th>
                            <th class="px-4 py-2 text-left">Nom</th>
                            <th class="px-4 py-2 text-left">Département</th>
                            <th class="px-4 py-2 text-left">Superviseur</th>
                            <th class="px-4 py-2 text-left">Dates</th>
                            <th class="px-4 py-2 text-left">Statut</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <!-- Exemple de ligne -->
                        <tr class="border-b" data-status="Actifs">
                            <td class="px-4 py-2">1</td>
                            <td class="px-4 py-2">Sophie Martin</td>
                            <td class="px-4 py-2">Marketing</td>
                            <td class="px-4 py-2">John Doe</td>
                            <td class="px-4 py-2">01/03/2025 - 30/06/2025</td>
                            <td class="px-4 py-2">
                                <span class="bg-green-100 text-green-600 px-2 py-1 rounded-full text-sm">Actifs</span>
                            </td>
                        </tr>
                        <tr class="border-b" data-status="Terminés">
                            <td class="px-4 py-2">2</td>
                            <td class="px-4 py-2">Alice Durand</td>
                            <td class="px-4 py-2">Finance</td>
                            <td class="px-4 py-2">Jane Smith</td>
                            <td class="px-4 py-2">01/01/2025 - 31/03/2025</td>
                            <td class="px-4 py-2">
                                <span class="bg-red-100 text-red-600 px-2 py-1 rounded-full text-sm">Terminés</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('filterDropdown');
            dropdown.classList.toggle('hidden');
        }

        function filterTable(status) {
            const rows = document.querySelectorAll('#stagiairesTable tbody tr');
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
            const rows = document.querySelectorAll('#stagiairesTable tbody tr');
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        }
    </script>
</body>
</html>