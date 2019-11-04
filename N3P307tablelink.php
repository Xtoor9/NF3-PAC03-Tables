<?php
// take in the id of a director and return his/her full name
function get_autor1($id_autor1) {

    global $db;

    $query = 'SELECT 
            cliente_fullname 
       FROM
           cliente
       WHERE
           cliente_id = ' . $id_autor1;
    $result = mysqli_query($db, $query) or die(mysqli_error($db));

    $row = mysqli_fetch_assoc($result);
    extract($row);

    return $cliente_fullname;
}

// take in the id of a lead actor and return his/her full name
function get_autor2($id_autor2) {

    global $db;

    $query = 'SELECT
            cliente_fullname
        FROM
            cliente
        WHERE
            cliente_id = ' . $id_autor2;
    $result = mysqli_query($db, $query) or die(mysqli_error($db));

    $row = mysqli_fetch_assoc($result);
    extract($row);

    return $cliente_fullname;
}

// take in the id of a movie type and return the meaningful textual
// description
function get_tiposerie($tiposerie_id) {

    global $db;

    $query = 'SELECT 
            tiposerie_label
       FROM
           tiposerie
       WHERE
           tiposerie_id = ' . $tiposerie_id;
    $result = mysqli_query($db, $query) or die(mysqli_error($db));

    $row = mysqli_fetch_assoc($result);
    extract($row);

    return $tiposerie_label;
}

//connect to mysqli
$db = mysqli_connect('localhost', 'root') or 
    die ('Unable to connect. Check your connection parameters.');

// make sure you're using the right database
mysqli_select_db($db, 'animalsite') or die(mysqli_error($db));

// retrieve information
$query = 'SELECT
        id_serie, nombre_serie, ano_serie, autor1_serie,
        autor2_serie, tipo_serie
    FROM
        serie
    ORDER BY
        nombre_serie ASC,
        ano_serie DESC';
$result = mysqli_query($db, $query) or die(mysqli_error($db));

// determine number of rows in returned result
$num_series = mysqli_num_rows($result);

$table.= <<<ENDHTML
<div style="text-align: center;">
 <h2>series Reviews</h2>
 <table border="1" cellpadding="2" cellspacing="2"
  style="width: 70%; margin-left: auto; margin-right: auto; text-align: center;">
  <tr>
   <th>Nombre del serie</th>
   <th>Año del serie</th>
   <th>Autor 1</th>
   <th>Autor 2</th>
   <th>Tipo de serie</th>
  </tr>
ENDHTML;

// loop through the results
while ($row = mysqli_fetch_assoc($result)) {
    extract($row);
    $autor1 = get_autor1($autor1_serie);
    $autor2 = get_autor2($autor2_serie);
    $tipo = get_tiposerie($tipo_serie);

    $table .= <<<ENDHTML
    <tr>
     <td><a href="N3P308details.php?idserie2=$id_serie&orden=review_date">$nombre_serie</a></td>
     <td>$ano_serie</td>
     <td>$autor1</td>
     <td>$autor2</td>
     <td>$tipo</td>
    </tr>
ENDHTML;
}

$table .= <<<ENDHTML
 </table>
<p>$num_series series</p>
</div>
ENDHTML;

echo $table;
?>
