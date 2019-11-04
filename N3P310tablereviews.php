<?php
//connect to mysqli
$db = mysqli_connect('localhost', 'root') or 
    die ('Unable to connect. Check your connection parameters.');

// make sure you're using the right database
mysqli_select_db($db,'animalsite') or die(mysqli_error($db));

//create the reviews table
$query = 'CREATE TABLE reviews (
        review_serie_id INTEGER UNSIGNED NOT NULL, 
        review_date     DATE             NOT NULL, 
        reviewer_name   VARCHAR(255)     NOT NULL, 
        review_comment  VARCHAR(255)     NOT NULL, 
        review_rating   TINYINT UNSIGNED NOT NULL  DEFAULT 0, 

        KEY (review_serie_id)
    )
    ENGINE=MyISAM';
mysqli_query($db, $query) or die (mysqli_error($db));

//insert new data into the reviews table
$query = <<<ENDSQL
INSERT INTO reviews
    (review_serie_id, review_date, reviewer_name, review_comment,
        review_rating)
VALUES 
    (1, "2014-02-12", "Mariela Toya", "La serie fue estupenda tenia unos efectos especiales como los de star wars.", 5),
    (1, "2018-08-08", "Aurelio", "La serie era amorsa pero demasido se estaban follando en todas las escenas y yo la veia con mi hija pequeña la tueve que llevar al psicólogo", 1),
    (1, "2011-08-24", "Lucia Artengo", "La serie no era ni buena ni mala.", 3),
    (2, "2019-09-10", "Pablo Fernandez", "La serie de risa era trinchate lloraba de la risa al verla.", 5),
    (3, "2011-12-02", "Replica Danielo", "Las peleas eran super realista y entretenida se notaba la tension de cada uno de sus movimientos.", 5)
ENDSQL;
mysqli_query($db, $query) or die(mysqli_error($db));

echo 'Animal database successfully updated!';
?>
