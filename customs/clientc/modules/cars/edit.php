<?php
// Récupération du cookie pour déterminer le client actuel
$client = isset($_COOKIE['client']) ? $_COOKIE['client'] : null;

if ($client !== 'clientc') {
    echo "<p>Vous n'avez pas l'autorisation d'accéder à cette page.</p>";
    exit;
}

// On récupère l'ID de la voiture depuis l'URL
$carId = isset($_GET['id']) ? $_GET['id'] : null;

if ($carId === null) {
    echo "<p>Aucune voiture sélectionnée.</p>";
    exit;
}

// Fichier des données des voitures et les garages
$carData = json_decode(file_get_contents(__DIR__ . '/../../../../data/cars.json'), true);
$garageData = json_decode(file_get_contents(__DIR__ . '/../../../../data/garages.json'), true);

$car = null;
foreach ($carData as $carItem) {
    if ($carItem['id'] == $carId && $carItem['customer'] === 'clientc') {
        $car = $carItem;
        break;
    }
}

if ($car === null) {
    echo "<p>Voiture non trouvée ou vous n'avez pas l'autorisation d'accéder à cette voiture.</p>";
    exit;
}

// Trouver le garage associé à la voiture
$garage = "Inconnu"; 
foreach ($garageData as $garageItem) {
    if ($garageItem['id'] == $car['garageId'] && $garageItem['customer'] === $car['customer']) {
        $garage = $garageItem['title'];
        break;
    }
}
?>

<div class="car-details-container mt-5">
    <h3 class="car-details-header text-center">Détails de la voiture</h3>

    <div class="car-details-card shadow-sm">
        <div class="car-details-body">
            <h4 class="car-details-title"><?php echo $car['modelName']; ?></h4>
            <p class="car-details-text"><strong>Marque :</strong> <?php echo $car['brand']; ?></p>
            <p class="car-details-text"><strong>Année :</strong> <?php echo date('Y', $car['year']); ?></p>
            <p class="car-details-text"><strong>Puissance :</strong> <?php echo $car['power']; ?> ch</p>
            <p class="car-details-text">
                <strong>Couleur :</strong>
                <i class="bi bi-car-front-fill" style="color: <?php echo $car['colorHex']; ?>; font-size: 1.5rem;"></i>
            </p>
            <p class="car-details-text"><strong>Garage :</strong> <?php echo $garage; ?></p>

            <button class="btn btn-primary backToList">Retour à la liste des voitures</button>
        </div>
    </div>
</div>
