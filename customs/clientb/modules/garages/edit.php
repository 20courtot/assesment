<?php
// On récupère l'ID du garage depuis l'URL
$garageId = isset($_GET['id']) ? $_GET['id'] : null;

if ($garageId === null) {
    echo "<p>Aucun garage sélectionné.</p>";
    exit;
}

// Fichier des données des garages
$garageData = json_decode(file_get_contents(__DIR__ . '/../../../../data/garages.json'), true);

$garage = null;
foreach ($garageData as $garageItem) {
    if ($garageItem['id'] == $garageId && $garageItem['customer'] === 'clientb') {
        $garage = $garageItem;
        break;
    }
}

if ($garage === null) {
    echo "<p>Garage non trouvé ou vous n'avez pas l'autorisation d'accéder à ce garage.</p>";
    exit;
}
?>

<div class="garage-details-container mt-5">
    <h3 class="garage-details-header text-center">Détails du garage</h3>

    <div class="garage-details-card shadow-sm">
        <div class="garage-details-body">
            <h4 class="garage-details-title"><?php echo $garage['title']; ?></h4>
            <p class="garage-details-text"><strong>Adresse :</strong> <?php echo $garage['address']; ?></p>
            <p class="garage-details-text"><strong>Client :</strong> <?php echo $garage['customer']; ?></p>

            <button class="btn btn-primary backToList">Retour à la liste des garages</button>
        </div>
    </div>
</div>
