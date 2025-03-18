<?php
// fichier de data des voitures
$carData = json_decode(file_get_contents(__DIR__ . '/../../../../data/cars.json'), true);

// Filtre la liste sur les voitures de notre client
$filteredCars = array_filter($carData, function($car) {
    return $car['customer'] === 'clientc';
});

// fichier de transcription de la langue pour passer la DataTable en Francais
$lang = json_decode(file_get_contents(__DIR__ . '/../../../../public/lang/fr.json'), true);
?>

<h1>Voitures Client C</h1>

<table id="carsTable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Modèle</th>
            <th>Marque</th>
            <th>Couleur</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($filteredCars as $car) { ?>
            <tr>
                <td><?php echo $car['modelName']; ?></td>
                <td><?php echo $car['brand']; ?></td>
                <td>
                    <!-- icone voiture pour afficher la couleur de la voiture -->
                    <i class="bi bi-car-front-fill" style="color: <?php echo $car['colorHex']; ?>; font-size: 1.5rem;"></i>
                </td>
                <td>
                    <button class="btn btn-primary viewCarDetails" data-car-id="<?php echo $car['id']; ?>">
                        <i class="bi bi-eye"></i>
                    </button>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<script>
    // init de la DataTable
    $(document).ready(function() {
        $('#carsTable').DataTable({
            "language": <?php echo json_encode($lang); ?>
        });
    });
</script>
