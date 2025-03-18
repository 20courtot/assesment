<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tool4cars</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Tool4cars - Choix Client</h1>
        
        <!-- Boutons choix du client -->
        <div class="d-flex justify-content-center mb-4">
            <div class="btn-group" role="group" aria-label="Client Selection">
                <button class="btn btn-outline-primary" id="setClientA">Client A</button>
                <button class="btn btn-outline-primary" id="setClientB">Client B</button>
                <button class="btn btn-outline-primary" id="setClientC">Client C</button>
            </div>
            
        </div>
        <div class="d-flex justify-content-center mb-4">
            <select id="moduleSelector" class="form-select w-auto mx-3">
                <option value="cars">Voitures</option>
                <option value="garages">Garages</option>
            </select>
        </div>

        <!-- affichage de la liste des voitures en fonction du client -->
        <div class="dynamic-div" data-module="cars" data-script="ajax"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
    <script type="module" src="public/js/main.js"></script>
</body>
</html>
