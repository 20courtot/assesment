<?php
// fichier de data des voitures
$carData = json_decode(file_get_contents(__DIR__ . '/../../../../data/cars.json'), true);

// fichier de data des garages
$garageData = json_decode(file_get_contents(__DIR__ . '/../../../../data/garages.json'), true);

// Filtre la liste sur les voitures de notre client
$filteredCars = array_filter($carData, function($car) {
    return $car['customer'] === 'clientb';
});

$garages = [];
foreach ($garageData as $garage) {
    // Verification que le garage est bien au clientb
    if ($garage['customer'] === 'clientb') {
        $garages[$garage['id']] = $garage['title']; // l'id est la clé pour retrouver le garage
    }
}

// fichier de transcription de la langue pour passer la DataTable en Francais
$lang = json_decode(file_get_contents(__DIR__ . '/../../../../public/lang/fr.json'), true);
?>

<h1>Voitures Client B</h1>

<table id="carsTable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Modèle</th>
            <th>Marque</th>
            <th>Garage</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($filteredCars as $car) { ?>
            <tr>
                <!-- strtolower pour passer en minuscules -->
                <td><?php echo strtolower($car['modelName']); ?></td>
                <td><?php echo $car['brand']; ?></td>
                <td><?php echo $garages[$car['garageId']] ?? 'Inconnu'; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<script>
    // init de la DataTable
    $('#carsTable').DataTable({
        "language": <?php echo json_encode($lang); ?>
    });
</script>
