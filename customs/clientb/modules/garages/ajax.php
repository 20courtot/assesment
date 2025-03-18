<?php
// Fichier de data des garages
$garageData = json_decode(file_get_contents(__DIR__ . '/../../../../data/garages.json'), true);

// Filtre la liste sur les garages du client B
$filteredGarages = array_filter($garageData, function($garage) {
    return $garage['customer'] === 'clientb';
});

// Fichier de transcription de la langue pour passer la DataTable en Francais
$lang = json_decode(file_get_contents(__DIR__ . '/../../../../public/lang/fr.json'), true);
?>

<h1>Garages Client B</h1>

<table id="garagesTable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Nom du garage</th>
            <th>Adresse</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($filteredGarages as $garage) { ?>
            <tr>
                <td><?php echo $garage['title']; ?></td>
                <td><?php echo $garage['address']; ?></td>
                <td>
                    <button class="btn btn-primary viewGarageDetails" data-garage-id="<?php echo $garage['id']; ?>">
                        <i class="bi bi-eye"></i>
                    </button>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<script>
    // Initialisation de la DataTable
    $('#garagesTable').DataTable({
        "language": <?php echo json_encode($lang); ?>
    });
</script>
