<!-- views/profile/tickets.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes billets - YouEvent</title>
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
                    <a href="profile/tickets.php" class="text-orange-500">Mes billets</a>
                    <a href="profile/settings.php" class="text-gray-600 hover:text-gray-900">Paramètres</a>
                    <a href="#" class="text-gray-600 hover:text-gray-900">Déconnexion</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-4xl mx-auto py-12 px-4">
        <h1 class="text-2xl font-bold mb-8">Mes billets</h1>

        <!-- Liste des billets -->
        <div class="space-y-6">
            <!-- Billet 1 -->
            <div class="bg-white rounded-xl shadow p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-xl font-semibold mb-2">Festival de Jazz de Paris</h3>
                        <div class="text-gray-600 space-y-1">
                            <p>Date : 15 juillet 2024 à 20h00</p>
                            <p>Lieu : Parc de la Villette, Paris</p>
                            <p>Numéro de billet : #12345678</p>
                        </div>
                    </div>
                    <button class="px-4 py-2 text-red-500 hover:bg-red-50 rounded-lg transition"
                            onclick="confirmCancellation()">
                        Demander une annulation
                    </button>
                </div>
            </div>

            <!-- Billet 2 -->
            <div class="bg-white rounded-xl shadow p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-xl font-semibold mb-2">Concert Rock en Seine</h3>
                        <div class="text-gray-600 space-y-1">
                            <p>Date : 25 août 2024 à 19h30</p>
                            <p>Lieu : Domaine de Saint-Cloud</p>
                            <p>Numéro de billet : #12345679</p>
                        </div>
                    </div>
                    <button class="px-4 py-2 text-red-500 hover:bg-red-50 rounded-lg transition"
                            onclick="confirmCancellation()">
                        Demander une annulation
                    </button>
                </div>
            </div>

            <!-- Billet avec demande d'annulation en cours -->
            <div class="bg-white rounded-xl shadow p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-xl font-semibold mb-2">Festival Électro</h3>
                        <div class="text-gray-600 space-y-1">
                            <p>Date : 10 septembre 2024 à 22h00</p>
                            <p>Lieu : Warehouse, Lyon</p>
                            <p>Numéro de billet : #12345680</p>
                        </div>
                    </div>
                    <span class="px-4 py-2 bg-yellow-50 text-yellow-600 rounded-lg">
                            Annulation en attente
                        </span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmCancellation() {
        if (confirm("Êtes-vous sûr de vouloir demander l'annulation de ce billet ? Cette demande sera examinée par un administrateur.")) {
            // Ici on mettra la logique d'envoi de la demande
            alert("Votre demande d'annulation a été envoyée à l'administrateur.");
        }
    }
</script>
</body>
</html>
