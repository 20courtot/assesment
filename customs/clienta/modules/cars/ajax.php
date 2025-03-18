<?php
// fichier de data des voitures
$carData = json_decode(file_get_contents(__DIR__ . '/../../../../data/cars.json'), true);

// Filtre la liste sur les voitures de notre client
$filteredCars = array_filter($carData, function($car) {
    return $car['customer'] === 'clienta';
});

// fichier de transcription de la langue pour passer la DataTable en Francais
$lang = json_decode(file_get_contents(__DIR__ . '/../../../../public/lang/fr.json'), true);
?>

<h1>Voitures Client A</h1>

<table id="carsTable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Modèle</th>
            <th>Marque</th>
            <th>Année</th>
            <th>Puissance (ch)</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($filteredCars as $car) { 
            // On recupere le timestamps
            $carYearTimestamp = $car['year'];
            // Calcul de la difference en annees
            $carAge = (time() - $carYearTimestamp) / (60 * 60 * 24 * 365);

            $rowClass = '';
            if ($carAge > 10) {
                $rowClass = 'old-car';
            } elseif ($carAge < 2) {
                $rowClass = 'new-car';
            }
            ?>
            <tr class="<?php echo $rowClass; ?>">
                <td><?php echo $car['modelName'];  ?></td>
                <td><?php echo $car['brand']; ?></td>
                <td><?php echo date("Y", $car['year']); ?></td>
                <td><?php echo $car['power']; ?></td>
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
    $('#carsTable').DataTable({
        "language": <?php echo json_encode($lang); ?>
    });
</script>
