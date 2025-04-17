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

            <!-- Filter Buttons and Search -->
            <div class="mb-4 flex items-center justify-between relative">
                <!-- Filter Buttons -->
                <div class="flex space-x-4">
                    <button class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700" onclick="filterTable('all')">Tous</button>
                    <button class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-500" onclick="filterTable('En attente')">En attente</button>
                    <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-500" onclick="filterTable('Approuvé')">Approuvés</button>
                    <button class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500" onclick="filterTable('Refusé')">Refusés</button>
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
                            <label for="reportType" class="block text-sm font-medium text-gray-700">Type de rapport</label>
                            <select id="reportType" class="mt-1 block w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                                <option value="">Tous</option>
                                <option value="Mensuel">Mensuel</option>
                                <option value="Final">Final</option>
                            </select>
                        </div>
                        <div>
                            <label for="stagiaire" class="block text-sm font-medium text-gray-700">Stagiaire</label>
                            <select id="stagiaire" class="mt-1 block w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                                <option value="">Tous</option>
                                <option value="Sophie Martin">Sophie Martin</option>
                                <option value="Alice Durand">Alice Durand</option>
                            </select>
                        </div>
                        <div>
                            <label for="sortBy" class="block text-sm font-medium text-gray-700">Trier par</label>
                            <select id="sortBy" class="mt-1 block w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                                <option value="title">Titre</option>
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
                <table class="min-w-full table-auto" id="rapportsTable">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-4 py-2 text-left">Titre</th>
                            <th class="px-4 py-2 text-left">ID Stagiaire</th>
                            <th class="px-4 py-2 text-left">Type</th>
                            <th class="px-4 py-2 text-left">Date</th>
                            <th class="px-4 py-2 text-left">Statut</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <!-- Exemple de ligne -->
                        <tr class="border-b" data-status="En attente">
                            <td class="px-4 py-2">Rapport Mensuel</td>
                            <td class="px-4 py-2">1</td>
                            <td class="px-4 py-2">Mensuel</td>
                            <td class="px-4 py-2">01/03/2025</td>
                            <td class="px-4 py-2">
                                <span class="bg-yellow-100 text-yellow-600 px-2 py-1 rounded-full text-sm">En attente</span>
                            </td>
                        </tr>
                        <tr class="border-b" data-status="Approuvé">
                            <td class="px-4 py-2">Rapport Final</td>
                            <td class="px-4 py-2">2</td>
                            <td class="px-4 py-2">Final</td>
                            <td class="px-4 py-2">31/03/2025</td>
                            <td class="px-4 py-2">
                                <span class="bg-green-100 text-green-600 px-2 py-1 rounded-full text-sm">Approuvé</span>
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
            const rows = document.querySelectorAll('#rapportsTable tbody tr');
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
            const rows = document.querySelectorAll('#rapportsTable tbody tr');
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        }
    </script>
</body>
</html>