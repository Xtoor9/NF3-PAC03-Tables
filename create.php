<?php
//connect to MySQL
$db = mysqli_connect('localhost', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
    
//create the main database if it doesn't already exist
$query = 'CREATE DATABASE IF NOT EXISTS serie';
mysqli_query($db,$query) or die(mysqli_error($db));
//make sure our recently created database is the active one
mysqli_select_db($db,'animalsite') or die(mysqli_error($db));

//create the movie table
$query = 'CREATE TABLE serie (
        id_serie        INTEGER UNSIGNED  NOT NULL AUTO_INCREMENT, 
        nombre_serie      VARCHAR(255)      NOT NULL, 
        tipo_serie      TINYINT           NOT NULL DEFAULT 0, 
        ano_serie      SMALLINT UNSIGNED NOT NULL DEFAULT 0, 
        autor1_serie INTEGER UNSIGNED NOT NULL DEFAULT 0,
        autor2_serie  INTEGER UNSIGNED  NOT NULL DEFAULT 0, 
        PRIMARY KEY (id_serie),
        KEY tipo_serie (tipo_serie, ano_serie) 
    ) 
    ENGINE=MyISAM';
mysqli_query($db,$query) or die (mysqli_error($db));
//create the serietype table
$query = 'CREATE TABLE tiposerie ( 
        tiposerie_id    TINYINT UNSIGNED NOT NULL AUTO_INCREMENT, 
        tiposerie_label VARCHAR(100)     NOT NULL, 
        PRIMARY KEY (tiposerie_id) 
    ) 
    ENGINE=MyISAM';
mysqli_query($db,$query) or die(mysqli_error($db));
//create the serie table
$query = 'CREATE TABLE cliente ( 
        cliente_id         INTEGER UNSIGNED    NOT NULL AUTO_INCREMENT, 
        cliente_fullname   VARCHAR(255)        NOT NULL, 
        cliente_isman    TINYINT(1) UNSIGNED NOT NULL DEFAULT 0, 
        cliente_iswoman TINYINT(1) UNSIGNED NOT NULL DEFAULT 0, 
        PRIMARY KEY (cliente_id)
    ) 
    ENGINE=MyISAM';
mysqli_query($db,$query) or die(mysqli_error($db));
echo 'La Base de datos serie ha sido creada correctamente';
?>
