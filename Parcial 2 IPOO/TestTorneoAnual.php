<?php
include "MinisterioDeporte.php";
require_once  "Equipo.php";
require_once "Partido.php";

//Equipos
$categoria = new Categoria(1, "liga A Nacional");
$objE1 = new Equipo("E1", "Messi", "11", $categoria);
$objE2 = new Equipo("E2", "Riveri", "11", $categoria);
$objE3 = new Equipo("E3", "Cristiano", "11", $categoria);
$objE4 = new Equipo("E4", "Pepe", "11", $categoria);
$objE5 = new Equipo("E5", "Pele", "11", $categoria);
$objE6 = new Equipo("E6", "Sorin", "11", $categoria);
$objE7 = new Equipo("E7", "Crespo", "11", $categoria);
$objE8 = new Equipo("E8", "Riquelme", "11", $categoria);
$objE9 = new Equipo("E9", "Aguero", "11", $categoria);
$objE10 = new Equipo("E10", "Simeone", "11", $categoria);
$objE11 = new Equipo("E11", "Palermo", "11", $categoria);
$objE12 = new Equipo("E12", "Diego Armando", "11", $categoria);

//Partidos
$objPart1 = new Partido(1, "10/10/20", $objE7,80,  $objE8, 120);
$objPart2 = new Partido(2, "11/10/20", $objE9,81,  $objE10,110);
$objPart3 = new Partido(3, "12/10/20",  $objE11,115,  $objE12,85);
$objPart4 = new Partido(4, "13/10/20",  $objE1,3,  $objE2,2);
$objPart5 = new Partido(5, "14/10/20",  $objE3,0,  $objE4,1);
$objPart6 = new Partido(6, "15/10/20",  $objE5,2,  $objE6,3);

//test 2
$colProv = array($objPart1, $objPart1, $objPart1);
//test 3
$colNac = array($objPart4, $objPart5, $objPart6);


// test 4
$unMinisterioDeporte = new MinisterioDeporte(2005);

// test 5
//Por alguna razon no me reconoce las Claves de los arreglos asociativos y no ejecuta el codigo en MinisterioDeporte

$arrayAsociativo1 = array(['idTorneo' => "001", 'montoPremio' => 10000, 'localidad' => "Rosario", 'provincia' => "Santa Fe"]);
$torneo5 = $unMinisterioDeporte->registrarTorneo($colProv, 'provincial', $arrayAsociativo1);
echo $torneo5;

//test 6

$arrayAsociativo2 = array(['idTorneo' => "002", 'montoPremio' => 20000, 'localidad' => "CABA"]);
$torneo6 = $unMinisterioDeporte->registrarTorneo($colNac, 'nacional', $arrayAsociativo2);
echo $torneo6;

//test 7
$idtorneo = $torneo5->getIdTorneo();
$premios5 = $unMinisterioDeporte->otorgarPremioTorneo($idtorneo);

echo print_r($premios5);
//test 8
$idtorneo2 = $torneo5->getIdTorneo();
$premios6 = $unMinisterioDeporte->otorgarPremioTorneo($idtorneo2);


echo print_r($premios6);



echo $unMinisterioDeporte;