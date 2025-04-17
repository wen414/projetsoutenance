<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faire une Demande</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-blue-50 via-blue-100 to-blue-200 text-gray-800">
    <div class="container mx-auto py-20">
        <div class="bg-white shadow-lg rounded-lg p-8 max-w-3xl mx-auto">
            <h1 class="text-4xl font-bold text-center text-blue-600 mb-6">Faire une Demande de Stage</h1>
            <p class="text-center text-gray-600 mb-8">Remplissez le formulaire ci-dessous pour soumettre votre demande de stage.</p>

            <!-- Message de succès -->
            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Formulaire -->
            <form action="{{ route('demande.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Prénom -->
                    <div>
                        <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom</label>
                        <div class="relative">
                            <i class="bx bx-user absolute left-3 top-3 text-gray-400 text-xl"></i>
                            <input type="text" name="prenom" id="prenom" class="mt-1 block w-full pl-10 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Votre prénom" required>
                        </div>
                    </div>
                    <!-- Nom -->
                    <div>
                        <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
                        <div class="relative">
                            <i class="bx bx-user-circle absolute left-3 top-3 text-gray-400 text-xl"></i>
                            <input type="text" name="nom" id="nom" class="mt-1 block w-full pl-10 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Votre nom" required>
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="mt-6">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <div class="relative">
                        <i class="bx bx-envelope absolute left-3 top-3 text-gray-400 text-xl"></i>
                        <input type="email" name="email" id="email" class="mt-1 block w-full pl-10 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Votre email" required>
                    </div>
                </div>

                <!-- Filière / Spécialité -->
                <div class="mt-6">
                    <label for="filiere" class="block text-sm font-medium text-gray-700">Filière / Spécialité</label>
                    <div class="relative">
                        <i class="bx bx-bookmark absolute left-3 top-3 text-gray-400 text-xl"></i>
                        <input type="text" name="filiere" id="filiere" class="mt-1 block w-full pl-10 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Votre filière ou spécialité" required>
                    </div>
                </div>

                <!-- Niveau d'étude -->
                <div class="mt-6">
                    <label for="niveau" class="block text-sm font-medium text-gray-700">Niveau d'étude</label>
                    <div class="relative">
                        <i class="bx bx-graduation absolute left-3 top-3 text-gray-400 text-xl"></i>
                        <input type="text" name="niveau" id="niveau" class="mt-1 block w-full pl-10 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Votre niveau d'étude" required>
                    </div>
                </div>

                <!-- Diplôme -->
                <div class="mt-6">
                    <label for="diplome" class="block text-sm font-medium text-gray-700">Diplôme</label>
                    <div class="relative">
                        <i class="bx bx-certificate absolute left-3 top-3 text-gray-400 text-xl"></i>
                        <input type="text" name="diplome" id="diplome" class="mt-1 block w-full pl-10 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Votre diplôme" required>
                    </div>
                </div>

                <!-- Type de stage -->
                <div class="mt-6">
                    <label for="type_stage" class="block text-sm font-medium text-gray-700">Type de stage</label>
                    <select name="type_stage" id="type_stage" class="mt-1 block w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                        <option value="">Choisir un type</option>
                        <option value="Professionnel">Professionnel</option>
                        <option value="Académique">Académique</option>
                    </select>
                </div>

                <!-- Statut de stage -->
                <div class="mt-6">
                    <label for="statut_stage" class="block text-sm font-medium text-gray-700">Statut de stage</label>
                    <select name="statut_stage" id="statut_stage" class="mt-1 block w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                        <option value="">Choisir un statut</option>
                        <option value="Initial">Initial</option>
                        <option value="Renouvellement">Renouvellement</option>
                    </select>
                </div>

                <!-- Dates de stage -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <!-- Date de début -->
                    <div>
                        <label for="date_debut" class="block text-sm font-medium text-gray-700">Date de début</label>
                        <input type="date" name="date_debut" id="date_debut" class="mt-1 block w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                    </div>
                    <!-- Date de fin -->
                    <div>
                        <label for="date_fin" class="block text-sm font-medium text-gray-700">Date de fin</label>
                        <input type="date" name="date_fin" id="date_fin" class="mt-1 block w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                    </div>
                </div>

                <!-- Contact -->
                <div class="mt-6">
                    <label for="contact" class="block text-sm font-medium text-gray-700">Contact</label>
                    <div class="relative">
                        <i class="bx bx-phone absolute left-3 top-3 text-gray-400 text-xl"></i>
                        <input type="text" name="contact" id="contact" class="mt-1 block w-full pl-10 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Votre numéro de téléphone" required>
                    </div>
                </div>

                <!-- PDF -->
                <div class="mt-6">
                    <label for="pdf" class="block text-sm font-medium text-gray-700">Télécharger votre demande (PDF)</label>
                    <input type="file" name="pdf" id="pdf" accept="application/pdf" class="mt-1 block w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                </div>

                <!-- Bouton de soumission -->
                <div class="mt-8 text-center">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-700">Soumettre</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>