<!-- views/profile/settings.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paramètres du compte - YouEvent</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50">
    <div class="min-h-screen">
        <!-- Navigation -->
        <nav class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <a href="/" class="flex items-center">
                            <span class="text-xl font-black">You<span class="text-orange-500">Event</span></span>
                        </a>
                    </div>
                    <div class="flex items-center gap-4">
                        <a href="profile/tickets.php" class="text-gray-600 hover:text-gray-900">Mes billets</a>
                        <a href="profile/settings.php" class="text-orange-500">Paramètres</a>
                        <a href="#" class="text-gray-600 hover:text-gray-900">Déconnexion</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="max-w-4xl mx-auto py-12 px-4">
            <h1 class="text-2xl font-bold mb-8">Paramètres du compte</h1>

            <div class="bg-white rounded-xl shadow p-8">
                <form>
                    <!-- Informations personnelles -->
                    <div class="mb-8">
                        <h2 class="text-lg font-semibold mb-4">Informations personnelles</h2>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-2">Prénom</label>
                                <input type="text" value="John" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2">Nom</label>
                                <input type="text" value="Doe" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                            </div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="mb-8">
                        <h2 class="text-lg font-semibold mb-4">Email</h2>
                        <input type="email" value="john.doe@example.com" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                    </div>

                    <!-- Changer le mot de passe -->
                    <div class="mb-8">
                        <h2 class="text-lg font-semibold mb-4">Changer le mot de passe</h2>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium mb-2">Mot de passe actuel</label>
                                <input type="password" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2">Nouveau mot de passe</label>
                                <input type="password" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2">Confirmer le nouveau mot de passe</label>
                                <input type="password" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="px-6 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition">
                            Enregistrer les modifications
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>