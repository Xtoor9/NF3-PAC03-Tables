<?php
// connect to mysqli
$db = mysqli_connect('localhost', 'root') or die ('Unable to connect. Check your connection parameters.');
//make sure you're using the correct database
mysqli_select_db($db,'animalsite') or die(mysqli_error($db));
// insert data into the movie table
$query = 'INSERT INTO serie
        (id_serie, nombre_serie, tipo_serie, ano_serie, autor1_serie,
        autor2_serie)
    VALUES
        (1, "Elite", 2, 2019, 1, 2),
        (2, "La Casa de Papel", 2, 2018, 5, 6),
        (3, "Juego de Tronos", 1, 2017, 4, 3)';
mysqli_query($db,$query) or die(mysqli_error($db));
// insert data into the movietype table
$query = 'INSERT INTO tiposerie 
        (tiposerie_id, tiposerie_label)
    VALUES 
        (1,"Ciencia Ficción"),
        (2, "Novela"), 
        (3, "Aventuras"),
        (4, "Guerra"), 
        (5, "Comedia"),
        (6, "Terror"),
        (7, "Acción"),
        (8, "Niños")';
mysqli_query($db,$query) or die(mysqli_error($db));
// insert data into the people table
$query  = 'INSERT INTO cliente
        (cliente_id, cliente_fullname, cliente_isman, cliente_iswoman)
    VALUES
        (1, "Blanca Suarez", 0, 1),
        (2, "Sergio Vazquez", 1, 0),
        (3, "Jordi Rodriguez", 1, 0),
        (4, "Lucia Toledo", 0, 1),
        (5, "Raul Gimenes", 1, 0),
        (6, "Marc Fernandez", 0, 1)';
mysqli_query($db,$query) or die(mysqli_error($db));
echo 'Data inserted successfully!';
?>