<?php

//connect to mysqli
$db = mysqli_connect('localhost', 'root') or 
    die ('Unable to connect. Check your connection parameters.');

// make sure you're using the right database
mysqli_select_db($db,'animalsite') or die(mysqli_error($db));

//alter the movie table to include running time, cost and takings fields
$query = 'ALTER TABLE serie ADD COLUMN (
    episodios_serie TINYINT UNSIGNED NULL,
    coste_serie         DECIMAL(4,1)     NULL,
    ventas_serie      DECIMAL(4,1)     NULL)';
mysqli_query($db, $query) or die (mysqli_error($db));

//insert new data into the movie table for each movie
$query = 'UPDATE serie SET
        episodios_serie = 20,
        coste_serie = 81,
        ventas_serie = 242.6
    WHERE
        id_serie = 1';
mysqli_query($db, $query) or die(mysqli_error($db));

$query = 'UPDATE serie SET
        episodios_serie = 12,
        coste_serie = 10,
        ventas_serie = 10.8
    WHERE
        id_serie = 2';
mysqli_query($db, $query) or die(mysqli_error($db));

$query = 'UPDATE serie SET
        episodios_serie = 30,
        coste_serie = NULL,
        ventas_serie = 33.2
    WHERE
        id_serie = 3';
mysqli_query($db, $query) or die(mysqli_error($db));

echo 'seriestexto database successfully updated!';
?>
