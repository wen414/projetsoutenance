<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demandes de Stage</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto py-20">
        <h1 class="text-3xl font-bold mb-6">Demandes de Stage</h1>
        <p class="text-gray-600 mb-6">Ici, vous pouvez consulter toutes les demandes de stage.</p>

        <!-- Tableau des demandes -->
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
                                        <option value="1">C/SRHDS 1</option>
                                        <option value="2">C/SRHDS 2</option>
                                    </select>
                                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Affecter</button>
                                </form>
                                <button onclick="openModal(event, {{ json_encode($demande->only(['nom', 'prenom', 'email', 'filiere', 'niveau', 'diplome', 'type_stage', 'statut_stage', 'date_debut', 'date_fin', 'contact', 'pdf_path'])) }})" class="bg-gray-600 text-white px-4 py-2 rounded-lg ml-2 hover:bg-gray-700">Voir Détails</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
    </div>

    <!-- Modale pour afficher les détails -->
    <div id="detailsModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg shadow-lg w-11/12 md:w-2/3 lg:w-1/2 p-6 relative">
            <!-- Bouton de fermeture -->
            <button onclick="closeModal()" class="absolute top-4 right-4 text-gray-500 hover:text-gray-800">
                <i class="bx bx-x text-3xl"></i>
            </button>

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
</body>
</html>