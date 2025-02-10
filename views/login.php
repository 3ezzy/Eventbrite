<!-- views/login.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - FestiFrance</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50">
    <div class="min-h-screen py-12 px-4">
        <div class="max-w-md mx-auto">
            <div class="text-center mb-8">
                <a href="/" class="text-2xl font-black tracking-tight inline-block">
                    Festi<span class="text-orange-500">France</span>
                </a>
                <h1 class="text-2xl font-bold mt-6 mb-2">Bon retour parmi nous !</h1>
                <p class="text-gray-600">Connectez-vous pour continuer</p>
            </div>

            <div class="bg-white p-8 rounded-xl shadow">
                <form>
                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2">Email</label>
                        <input type="email" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2">Mot de passe</label>
                        <input type="password" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                    </div>

                    <div class="flex items-center justify-between mb-6">
                        <label class="flex items-center">
                            <input type="checkbox" class="rounded text-orange-500 focus:ring-orange-500">
                            <span class="ml-2 text-sm text-gray-600">Se souvenir de moi</span>
                        </label>
                        <a href="#" class="text-sm text-orange-500 hover:underline">
                            Mot de passe oublié ?
                        </a>
                    </div>

                    <button class="w-full bg-orange-500 text-white py-3 rounded-lg hover:bg-orange-600 transition">
                        Se connecter
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Pas encore de compte ? 
                        <a href="register.php" class="text-orange-500 hover:underline">Créer un compte</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

