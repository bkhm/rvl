<?php
require 'conexion.php';

$sql = "SELECT PaginaPeriodico AS 'Pagina',	COUNT(idEditorial) AS 'Elementos' FROM noticiasSemana n, 	periodicos p WHERE	n.Fecha=DATE('2017-03-31') AND	p.idPeriodico=n.Periodico AND	n.Periodico=33
GROUP BY PaginaPeriodico ORDER by idEditorial SELECT PaginaPeriodico AS 'Pagina',	COUNT(idEditorial) AS 'Elementos' FROM 	noticiasSemana n, 	periodicos p WHERE	n.Fecha=DATE('2017-04-03') AND 	p.idPeriodico=n.Periodico AND	n.Periodico=33 GROUP BY PaginaPeriodico ORDER by idEditorial";


$result = mysql_query($sql);

if(!$result){
  echo "Hay un problema ne la conexion"."<br>".mysql_error();
}else{
  echo "se realizo la conexion saticafotiramente";
}


 ?>
