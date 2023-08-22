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

    $filterParking=$_GET['filterParking'] ?? 'off';
    $filterVote=$_GET['filterVote'] ?? '0';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <title>PHP Hotel</title>
    </head>
<body>
    <header>
        <h1>
            PHP Hotel
        </h1>
    </header>
    <main>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome Hotel</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Parcheggio</th>
                    <th scope="col">Voto</th>
                    <th scope="col">Distanza dal centro</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($hotels as $index => $hotel) {
                        if (($filterParking == 'off' || $hotel['parking']) && $hotel['vote'] >= $filterVote) {    
                ?>
                    <tr>
                        <th scope="row"><?php echo $index; ?></th>
                        <td><?php echo $hotel['name']; ?></td>
                        <td><?php echo $hotel['description']; ?></td>
                        <td><?php if ($hotel['parking'] == true) {
                            echo 'SI';
                        } else {
                            echo 'NO';
                        }  ?></td>
                        <td><?php echo $hotel['vote']; ?></td>
                        <td><?php echo $hotel['distance_to_center']; ?> km</td>
                    </tr>
                <?php
                    }
                    }
                ?>
            </tbody>
        </table>
        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
            <form action="index.php" method="get">
                <select class="form-select mb-3" aria-label="Default select example" name="filterVote">
                    <option <?php echo $filterVote == '0' ? 'selected' : ''; ?> value="0">Scegli il tuo hotel in base al voto</option>
                    <option <?php echo $filterVote == '1' ? 'selected' : ''; ?> value="1">1</option>
                    <option <?php echo $filterVote == '2' ? 'selected' : ''; ?> value="2">2</option>
                    <option <?php echo $filterVote == '3' ? 'selected' : ''; ?> value="3">3</option>
                    <option <?php echo $filterVote == '4' ? 'selected' : ''; ?> value="4">4</option>
                    <option <?php echo $filterVote == '5' ? 'selected' : ''; ?> value="5">5</option>
                </select>
                <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off" name="filterParking" <?php if ($filterParking == 'on') {
                    echo 'checked';
                } ?>>
                <label class="btn btn-outline-primary" for="btncheck1">Parcheggio</label>
                <button type="submit" class="btn btn-outline-primary">INVIA</button>
            </form>
        </div>
    </main>
</body>
</html>