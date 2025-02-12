<?php

require_once __DIR__ . '/app/Database/Database.php';

try {
    $db = Database::getInstance();
    echo "✅ Connexion à la base de données réussie !\n";

    $stmt = $db->query('SELECT current_timestamp');
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "🕒 Heure du serveur : " . $result['current_timestamp'] . "\n";

} catch (Exception $e) {
    echo "❌ Erreur : " . $e->getMessage() . "\n";
}
