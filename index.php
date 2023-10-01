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

$has_filters = !empty($_GET);

if ($has_filters) {
    $filters = $_GET;
    if (isset($filters['parking'])) {
        if ($filters['parking'] != 'all') {

            $filtro_hotels = [];
            foreach ($hotels as $hotel) {
                if ((bool) $filters['parking'] === $hotel['parking']) {
                    $filtro_hotels[] = $hotel;
                }
            }
            $hotels = $filtro_hotels;
        }
    }
    if (isset($filters['vote'])) {
        $temp_hotels = [];
        foreach ($hotels as $hotel) {
            if ($hotel['vote'] >= (int) $filters['vote']) {
                $temp_hotels[] = $hotel;
            }
        }

        $hotels = $temp_hotels;
    }

}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>

    <!-- BOOTSTRAP -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>

    <div class="container mt-5">

        <form class="mb-5" method="GET">
            <label for="parking" class="form-label">Parcheggio</label>
            <select class="form-select" id="parking" name="parking" aria-label="Default select example" required>
                <option value="" selected>Selezionare il valore</option>
                <option value="1">Si</option>
                <option value="0">No</option>
                <option value="all">Tutti</option>
            </select>


            <div class="mb-3">
                <label for="vote" class="mb-2">Voto</label>
                <input type="number" min="0" max="5" step="1" name="vote" id="vote" class="form-control"
                    value="<?php echo $filters['vote'] ?>" />
            </div>

            <button class="btn btn-primary my-3">Invia</button>
        </form>
        <h3>

            <?php

            foreach ($hotels as $key => $hotel) {

                //$key = 0, 1, 2, etc..
            
                echo "Key : " . $key . "<br>";
                foreach ($hotel as $key_description => $info) {

                    //$key_description = name, description, parking etc..
                    //$info = "stringhe";
            
                    echo $key_description . ": " . $info . "<br>";

                }
                echo "<hr>";
            }
            ?>
        </h3>


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <?php

                    //Con $hotels[0] prendo le chiavi dell'array in posizione zero una sola 
                    //volta = name, description, parking etc..
                    
                    foreach ($hotels[0] as $key => $hotel): ?>

                        <th scope="col">
                            <?php echo $key; ?>
                        </th>

                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>

                <?php

                //Da info recupero i dati all'interno di ogni elemento
                
                foreach ($hotels as $index => $info):
                    ?>
                    <tr>
                        <th scope="row">
                            <?php echo $index; ?>
                        </th>
                        <td>
                            <?php echo $info["name"]; ?>
                        </td>
                        <td>
                            <?php echo $info["description"]; ?>
                        </td>
                        <td>
                            <?php echo $info["parking"] ? 'Sì' : 'No'; ?>
                        </td>
                        <td>
                            <?php echo $info["vote"]; ?>
                        </td>
                        <td>
                            <?php echo $info["distance_to_center"]; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>


        </table>
    </div>
</body>

</html>