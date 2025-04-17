<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard DPAF</title>
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
                Dashboard DPAF
            </a>

            <!-- Menu -->
            <ul class="flex space-x-6">
                <!-- Accueil -->
                <li>
                    <a href="#" class="text-gray-600 hover:text-blue-600 font-medium flex items-center">
                        <i class="bx bx-home-alt text-2xl mr-2"></i>
                        Accueil
                    </a>
                </li>
                <!-- Affectation -->
                <li>
                    <a href="#" class="text-gray-600 hover:text-blue-600 font-medium flex items-center">
                        <i class="bx bx-task text-2xl mr-2"></i>
                        Affectation
                    </a>
                </li>
                <!-- Documents -->
                <li>
                    <a href="#" class="text-gray-600 hover:text-blue-600 font-medium flex items-center">
                        <i class="bx bx-folder text-2xl mr-2"></i>
                        Documents
                    </a>
                </li>
                <!-- Profil -->
                <li>
                    <a href="#" class="text-gray-600 hover:text-blue-600 font-medium flex items-center">
                        <i class="bx bx-user text-2xl mr-2"></i>
                        Profil
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Content -->
    <div class="container mx-auto py-20">
        <h1 class="text-3xl font-bold mb-6 animate__animated animate__fadeInDown">Bienvenue, DPAF</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Card 1 -->
            <div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-xl transition-shadow duration-300 animate__animated animate__zoomIn">
                <div class="flex items-center justify-center bg-blue-100 text-blue-600 w-16 h-16 rounded-full mb-4">
                    <i class="bx bx-file text-4xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Demandes de Stage</h3>
                <p class="text-gray-600">Consultez et gérez les demandes de stage assignées.</p>
                <a href="{{ route('dpaf.demandes') }}" class="text-blue-600 hover:underline mt-4 inline-block">Voir plus</a>
            </div>
            <!-- Card 2 -->
            <div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-xl transition-shadow duration-300 animate__animated animate__zoomIn animate__delay-1s">
                <div class="flex items-center justify-center bg-green-100 text-green-600 w-16 h-16 rounded-full mb-4">
                    <i class="bx bx-folder text-4xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Gestion des Documents</h3>
                <p class="text-gray-600">Téléchargez et gérez les documents administratifs.</p>
                <a href="#" class="text-blue-600 hover:underline mt-4 inline-block">Voir plus</a>
            </div>
            <!-- Card 3 -->
            <div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-xl transition-shadow duration-300 animate__animated animate__zoomIn animate__delay-2s">
                <div class="flex items-center justify-center bg-yellow-100 text-yellow-600 w-16 h-16 rounded-full mb-4">
                    <i class="bx bx-calendar text-4xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Planification</h3>
                <p class="text-gray-600">Planifiez les activités et les échéances importantes.</p>
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

    <div class="container mx-auto py-20">
        <h1 class="text-3xl font-bold mb-6">Demandes de Stage</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('affectation.affecterMultiple') }}" method="POST">
            @csrf
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">
                            <input type="checkbox" id="select-all" class="form-checkbox">
                        </th>
                        <th class="py-3 px-6 text-left">Nom</th>
                        <th class="py-3 px-6 text-left">Email</th>
                        <th class="py-3 px-6 text-left">Filière</th>
                        <th class="py-3 px-6 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach($demandes as $demande)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left">
                                <input type="checkbox" name="demande_ids[]" value="{{ $demande->id }}" class="form-checkbox">
                            </td>
                            <td class="py-3 px-6 text-left">{{ $demande->nom }} {{ $demande->prenom }}</td>
                            <td class="py-3 px-6 text-left">{{ $demande->email }}</td>
                            <td class="py-3 px-6 text-left">{{ $demande->filiere }}</td>
                            <td class="py-3 px-6 text-center">
                                <form action="{{ route('affectation.affecter', $demande->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    <select name="c_srhds_id" class="border rounded-lg px-4 py-2">
                                        <option value="">Choisir un C/SRHDS</option>
                                        <!-- Remplacez par une liste dynamique des C/SRHDS -->
                                        <option value="1">C/SRHDS 1</option>
                                        <option value="2">C/SRHDS 2</option>
                                    </select>
                                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Affecter</button>
                                </form>
                                <button onclick="openModal(event, {{ json_encode($demande) }})" class="bg-gray-600 text-white px-4 py-2 rounded-lg ml-2 hover:bg-gray-700">Voir Détails</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-6">
                <label for="c_srhds_id" class="block text-sm font-medium text-gray-700">Affecter à :</label>
                <select name="c_srhds_id" id="c_srhds_id" class="border rounded-lg px-4 py-2 w-full">
                    <option value="">Choisir un C/SRHDS</option>
                    <!-- Remplacez par une liste dynamique des C/SRHDS -->
                    <option value="1">C/SRHDS 1</option>
                    <option value="2">C/SRHDS 2</option>
                </select>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-md mt-4 hover:bg-blue-700">
                Affecter Générale
            </button>
        </form>
    </div>

    <!-- Modal -->
    <div id="detailsModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg shadow-lg w-11/12 md:w-2/3 lg:w-1/2 p-6 relative">
            <!-- Bouton de fermeture -->
            <button onclick="closeModal()" class="absolute top-4 right-4 text-gray-500 hover:text-gray-800">
                <i class="bx bx-x text-3xl"></i>
            </button>

            <!-- Titre -->
            <h2 class="text-2xl font-bold mb-6 text-center text-blue-600">Détails du Stagiaire</h2>

            <!-- Contenu -->
            <div id="modalContent" class="space-y-4 text-gray-700">
                <!-- Les informations du stagiaire seront insérées ici -->
            </div>

            <!-- Bouton de fermeture -->
            <div class="mt-6 text-center">
                <button onclick="closeModal()" class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700">
                    Fermer
                </button>
            </div>
        </div>
    </div>

    <script>
        // Script pour sélectionner/désélectionner toutes les cases à cocher
        document.getElementById('select-all').addEventListener('change', function(e) {
            const checkboxes = document.querySelectorAll('input[name="demande_ids[]"]');
            checkboxes.forEach(checkbox => checkbox.checked = e.target.checked);
        });

        // Script pour ouvrir et fermer le modal
        function openModal(event, demande) {
            // Empêcher le rechargement de la page
            event.preventDefault();

            const modal = document.getElementById('detailsModal');
            const modalContent = document.getElementById('modalContent');

            // Insérer les informations du stagiaire dans la modale
            modalContent.innerHTML = `
                <p><strong>Nom :</strong> ${demande.nom}</p>
                <p><strong>Prénom :</strong> ${demande.prenom}</p>
                <p><strong>Email :</strong> ${demande.email}</p>
                <p><strong>Filière :</strong> ${demande.filiere}</p>
                <p><strong>Niveau :</strong> ${demande.niveau}</p>
                <p><strong>Diplôme :</strong> ${demande.diplome}</p>
                <p><strong>Type de Stage :</strong> ${demande.type_stage}</p>
                <p><strong>Statut de Stage :</strong> ${demande.statut_stage}</p>
                <p><strong>Date de Début :</strong> ${demande.date_debut}</p>
                <p><strong>Date de Fin :</strong> ${demande.date_fin}</p>
                <p><strong>Contact :</strong> ${demande.contact}</p>
                <p><strong>Document PDF :</strong> 
                    <a href="/storage/${demande.pdf_path}" target="_blank" class="text-blue-600 hover:underline">Télécharger</a>
                </p>
            `;

            // Afficher la modale
            modal.classList.remove('hidden');
        }

        function closeModal() {
            const modal = document.getElementById('detailsModal');
            modal.classList.add('hidden');
        }
    </script>

    <!-- Footer -->
    <footer class="py-6 bg-gray-800 text-gray-400">
        <div class="container mx-auto text-center">
            <p>&copy; 2025 Ministère des Affaires Sociales et de la Microfinance. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>