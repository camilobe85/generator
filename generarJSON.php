<?php

$server = "127.0.0.1";
$user = "root";
$pass = "";
$bd = "novadev_generator";

//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass,$bd) 
or die("Ha sucedido un error inexperado en la conexion de la base de datos");

//generamos la consulta
$sql = "SELECT * FROM generator.tgenerator";
mysqli_set_charset($conexion, "utf8"); //formato de datos utf8

if(!$result = mysqli_query($conexion, $sql)) die();

$generator = array(); //creamos un array

while($row = mysqli_fetch_array($result)) 
{ 
	$id=$row['idtGenerator'];
	$frase=$row['gFrase'];

	$generator[] = array('id'=> $id, 'frase'=> $frase);

}
	
//desconectamos la base de datos
$close = mysqli_close($conexion) 
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
  

//Creamos el JSON
//$clientes['clientes'] = $clientes;
$json_string = json_encode($generator);
echo $json_string;

//Si queremos crear un archivo json, sería de esta forma:
/*
$file = 'clientes.json';
file_put_contents($file, $json_string);
*/
	

?>
