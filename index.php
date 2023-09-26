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

var_dump($hotels);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>

    BOOTSTRAP
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>

    <h3>

        <?php

        $key = array_keys($hotels);

        var_dump($key);

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
        <?php foreach ($hotels as $key => $hotel):
            foreach ($hotel as $key_description => $info): ?>
                <thead>
                    <tr>

                        <th scope="col">
                            <?php echo $key_description; ?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">
                            <?php echo $key; ?>
                        </th>
                        <td>
                            <?php echo $info; ?>
                        </td>
                    </tr>

                </tbody>
            <?php endforeach; endforeach; ?>
    </table>


</body>

</html>