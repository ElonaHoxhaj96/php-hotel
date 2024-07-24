<?php

$hotels = [
    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],
];

// Filtro gli hotel in base alla richiesta GET per i parcheggi 
$filter_parking = isset($_GET['parking']) ? $_GET['parking'] : 'all';

$filtered_hotels = [];
foreach ($hotels as $hotel) {
    if ($filter_parking === 'yes' && !$hotel['parking']) {
        continue;
    }
    $filtered_hotels[] = $hotel;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTEL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <section class="container mt-5">  
        <h1>PHP Hotel</h1>
        
        <form action="index.php" method="GET">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="parking" id="parkingAll" value="all" <?php echo $filter_parking === 'all' ? 'checked' : ''; ?> onchange="this.form.submit();">
                <label class="form-check-label" for="parkingAll">
                   Tutti gli hotel
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="parking" id="parkingYes" value="yes" <?php echo $filter_parking === 'yes' ? 'checked' : ''; ?> onchange="this.form.submit();">
                <label class="form-check-label" for="parkingYes">
                   Solo con parcheggio 
                </label>
            </div>
        </form>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Descrizione</th>
                    <th>Parcheggio</th>
                    <th>Voto</th>
                    <th>Distanza dal centro (km)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($filtered_hotels as $hotel): ?>
                    <tr>
                        <th><?php echo $hotel['name']; ?></th>
                        <td><?php echo $hotel['description']; ?></td> 
                        <td><?php echo $hotel['parking'] ? 'SI' : 'NO'; ?></td>
                        <td><?php echo $hotel['vote']; ?></td>
                        <td><?php echo $hotel['distance_to_center']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>      
    </section>
</body>
</html>
