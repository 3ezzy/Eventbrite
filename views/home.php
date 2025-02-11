<!-- views/layout/header.php -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FestiFrance - La plateforme des passionnés d'événements</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/public/css/style.css">
</head>

<body class="bg-slate-50">
    <nav class="py-4 px-6 bg-white border-b">
        <div class="max-w-screen-xl mx-auto flex justify-between items-center">
            <div class="flex items-center gap-12">
                <a href="/" class="text-2xl font-black tracking-tight">
                    Festi<span class="text-orange-500">France</span>
                </a>
                <div class="hidden md:flex gap-8">
                    <a href="/decouvrir" class="hover:text-orange-500">Découvrir</a>
                    <a href="/organiser" class="hover:text-orange-500">Créer un événement</a>
                </div>
            </div>

            <?php if (!isset($_SESSION['user_id'])): ?>
                <div class="flex gap-4 items-center">
                    <a href="/connexion" class="hover:text-orange-500">Se connecter</a>
                    <a href="/inscription" class="px-4 py-2 bg-orange-500 text-white rounded-full
                        hover:bg-orange-600 transition">Rejoindre</a>
                </div>
            <?php else: ?>
                <div class="flex items-center gap-6">
                    <a href="/messages" class="relative">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2
                                2v10a2 2 0 002 2z" />
                        </svg>
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs w-4 h-4 rounded-full
                            flex items-center justify-center">2</span>
                    </a>
                    <div class="relative group">
                        <img src="/public/images/avatars/<?= $_SESSION['avatar'] ?>"
                            class="w-10 h-10 rounded-full cursor-pointer">
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 hidden group-hover:block">
                            <a href="/mon-compte" class="block px-4 py-2 hover:bg-gray-100">Mon compte</a>
                            <a href="/mes-evenements" class="block px-4 py-2 hover:bg-gray-100">Mes événements</a>
                            <a href="/deconnexion" class="block px-4 py-2 hover:bg-gray-100 text-red-600">Déconnexion</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </nav>

    <!-- views/home/index.php -->
    <main>
        <section class="relative h-[80vh] flex items-center">
            <div class="absolute inset-0 overflow-hidden">
                <video autoplay muted loop class="w-full h-full object-cover">
                    <source src="/public/videos/festival-bg.mp4" type="video/mp4">
                </video>
                <div class="absolute inset-0 bg-black/40"></div>
            </div>

            <div class="relative max-w-screen-xl mx-auto px-6">
                <div class="max-w-2xl">
                    <h1 class="text-5xl font-bold text-white mb-6 leading-tight">
                        Vivez des moments uniques partout en France
                    </h1>
                    <p class="text-lg text-white/90 mb-8">
                        Festivals, concerts, expos, sport... Trouvez les meilleurs événements près de chez vous
                    </p>

                    <div class="bg-white p-4 rounded-xl shadow-xl flex gap-4">
                        <div class="flex-1">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Je recherche</label>
                            <input type="text" placeholder="Nom de l'événement, lieu..."
                                class="w-full px-3 py-2 border rounded focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                        </div>
                        <div class="flex-1">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Quand ?</label>
                            <select class="w-full px-3 py-2 border rounded focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                                <option>Ce week-end</option>
                                <option>Cette semaine</option>
                                <option>Ce mois</option>
                                <option>Choisir une date</option>
                            </select>
                        </div>
                        <button class="self-end px-8 py-2 bg-orange-500 text-white rounded hover:bg-orange-600 transition">
                            Rechercher
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-16 max-w-screen-xl mx-auto px-6">
            <h2 class="text-2xl font-bold mb-8">Les événements à ne pas manquer 🔥</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <?php foreach ($events as $event): ?>
                    <article class="group bg-white rounded-xl overflow-hidden hover:shadow-lg transition">
                        <div class="relative h-48 overflow-hidden">
                            <img src="<?= $event['image'] ?>" class="w-full h-full object-cover
                            group-hover:scale-110 transition duration-300">
                            <span class="absolute top-4 left-4 px-3 py-1 bg-white/90 rounded-full text-sm">
                                <?= $event['category'] ?>
                            </span>
                        </div>

                        <div class="p-6">
                            <time class="text-sm text-gray-500"><?= $event['date'] ?></time>
                            <h3 class="text-xl font-bold mt-2 mb-2"><?= $event['title'] ?></h3>
                            <p class="text-gray-600 text-sm line-clamp-2 mb-4"><?= $event['description'] ?></p>

                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <img src="<?= $event['organizer_avatar'] ?>" class="w-8 h-8 rounded-full">
                                    <span class="text-sm"><?= $event['organizer_name'] ?></span>
                                </div>
                                <span class="font-bold text-orange-500">
                                    <?= $event['price'] === 0 ? 'Gratuit' : $event['price'] . '€' ?>
                                </span>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="py-16 bg-gradient-to-br from-orange-50 to-orange-100">
            <div class="max-w-screen-xl mx-auto px-6">
                <h2 class="text-2xl font-bold mb-12 text-center">Explorez par catégorie</h2>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    <?php foreach ($categories as $category): ?>
                        <a href="/categorie/<?= $category['slug'] ?>"
                            class="flex flex-col items-center p-6 bg-white rounded-xl hover:shadow-md transition">
                            <div class="w-16 h-16 mb-4 rounded-full bg-orange-100 flex items-center justify-center">
                                <img src="<?= $category['icon'] ?>" class="w-8 h-8">
                            </div>
                            <h3 class="font-medium"><?= $category['name'] ?></h3>
                            <span class="text-sm text-gray-500 mt-1"><?= $category['count'] ?> événements</span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-screen-xl mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between gap-8">
                <div class="md:w-1/3">
                    <h3 class="text-2xl font-black mb-4">FestiFrance</h3>
                    <p class="text-gray-400 text-sm">
                        La plateforme qui connecte les passionnés d'événements partout en France.
                    </p>
                </div>

                <div class="flex gap-12 md:gap-24">
                    <div>
                        <h4 class="font-bold mb-4">Explorer</h4>
                        <ul class="space-y-2 text-sm text-gray-400">
                            <li><a href="#" class="hover:text-white">Événements</a></li>
                            <li><a href="#" class="hover:text-white">Catégories</a></li>
                            <li><a href="#" class="hover:text-white">Calendrier</a></li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="font-bold mb-4">À propos</h4>
                        <ul class="space-y-2 text-sm text-gray-400">
                            <li><a href="#" class="hover:text-white">L'équipe</a></li>
                            <li><a href="#" class="hover:text-white">Nous contacter</a></li>
                            <li><a href="#" class="hover:text-white">Blog</a></li>
                        </ul>
                    </div>
                </div>

                <div class="md:w-1/4">
                    <h4 class="font-bold mb-4">Newsletter</h4>
                    <p class="text-sm text-gray-400 mb-4">
                        Recevez les meilleurs événements chaque semaine
                    </p>
                    <form class="flex">
                        <input type="email" placeholder="Votre email"
                            class="flex-1 px-4 py-2 bg-gray-800 rounded-l outline-none">
                        <button class="px-4 py-2 bg-orange-500 text-white rounded-r hover:bg-orange-600">
                            OK
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>