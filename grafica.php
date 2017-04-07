<?php // content="text/plain; charset=utf-8"

/*require_once ('JPGraph/jpgraph.php');
require_once ('JPGraph/jpgraph_pie.php');
require 'conexion.php';*/

require_once ('JPGraph/jpgraph.php');
require_once ('JPGraph/jpgraph_pie.php');
require 'conexion.php';
//
/*
$server="localhost";
$username="lectura";
$password="gacomunicacion";
//$password="";
$database="monitoreoGa";
$conect=mysql_connect($server, $username, $password);
mysql_select_db($database,$conect);
date_default_timezone_set('America/Mexico_City');
*/
mysql_query("set names 'utf8'");
$rangoFechas = "";
$fechaCorte = "";
//Conseguir rango de fechas a buscar
switch(date('N'))
{
case 1:
$rangoFechas = "Fecha BETWEEN DATE_SUB(CURDATE(),INTERVAL 2 DAY) AND CURDATE()";
break;
case 2:
$rangoFechas = "Fecha BETWEEN DATE_SUB(CURDATE(),INTERVAL 3 DAY) AND CURDATE()";
break;
case 3:
$rangoFechas = "Fecha BETWEEN DATE_SUB(CURDATE(),INTERVAL 4 DAY) AND CURDATE()";
break;
case 4:
$rangoFechas = "Fecha BETWEEN DATE_SUB(CURDATE(),INTERVAL 5 DAY) AND CURDATE()";
break;
case 5:
$rangoFechas = "Fecha BETWEEN DATE_SUB(CURDATE(),INTERVAL 6 DAY) AND CURDATE()";
break;
case 6:
$rangoFechas = "Fecha = CURDATE()";
break;
case 7:
$rangoFechas = "Fecha BETWEEN DATE_SUB(CURDATE(),INTERVAL 1 DAY) AND CURDATE()";
break;
}
//Query Corte de Notas Ricardo Villanueva
$qryCorte = "SELECT
	PaginaPeriodico AS 'Página',
	COUNT(idEditorial) as 'Elementos'
FROM
	noticiasSemana n,
	periodicos p
WHERE
	n.Fecha=DATE('2017-03-31') AND
	p.idPeriodico=n.Periodico AND
	n.Periodico=33
GROUP BY PaginaPeriodico
ORDER by idEditorial;

/*Lunes 03 de Abril*/
select
	PaginaPeriodico AS 'Página',
	COUNT(idEditorial) as 'Elementos'
FROM
	noticiasSemana n,
	periodicos p
WHERE
	n.Fecha=DATE('2017-04-03') AND
	p.idPeriodico=n.Periodico AND
	n.Periodico=33
GROUP BY PaginaPeriodico
ORDER by idEditorial
$rangoFechas AND (
  Texto like '%Ricardo Villanueva Lomeli%' OR
  Texto like '%Villanueva Lomeli%' OR
  Texto like '%Ricardo Villanueva%' OR

  Titulo like '%Ricardo Villanueva Lomeli%' OR
  Titulo like '%Villanueva Lomeli%' OR
  Titulo like '%Ricardo Villanueva%' OR

  Encabezado like '%Ricardo Villanueva Lomeli%' OR
  Encabezado like '%Villanueva Lomeli%' OR
  Encabezado like '%Ricardo Villanueva%' OR

  PieFoto like '%Ricardo Villanueva Lomeli%' OR
  PieFoto like '%Villanueva Lomeli%' OR
  PieFoto like '%Ricardo Villanueva%'
) GROUP BY n.Periodico
ORDER BY n.Fecha";
$NotasVillanueva = mysql_query($qryCorte);

//Query Corte de Notas Enrique Alfaro
$qryCorte = "SELECT
p.Nombre,
COUNT(DISTINCT(n.idEditorial)) AS 'Total',
GROUP_CONCAT(DISTINCT(idEditorial) SEPARATOR ',') AS 'idNotas',
GROUP_CONCAT(NumeroPagina SEPARATOR ',') AS 'PDF'
FROM
(SELECT idEditorial,Periodico,Activo,Texto,Titulo,Encabezado,PieFoto,Autor,Fecha,NumeroPagina FROM noticiasDia WHERE $rangoFechas
UNION ALL
SELECT idEditorial,Periodico,Activo,Texto,Titulo,Encabezado,PieFoto,Autor,Fecha,NumeroPagina FROM noticiasSemana WHERE $rangoFechas) n,
periodicos p,
ordenGeneraljalisco o
WHERE
p.idPeriodico=n.Periodico AND
p.idPeriodico=o.periodico AND
n.Activo = 1 AND
$rangoFechas AND (
  Texto like '%Enrique Alfaro Ramirez%' OR
  Texto like '%Enrique Alfaro%' OR
  Texto like '%Alfaro Ramirez%' OR

  Titulo  like '%Enrique Alfaro Ramirez%' OR
  Titulo  like '%Enrique Alfaro%' OR
  Titulo  like '%Alfaro Ramirez%' OR

  Encabezado  like '%Enrique Alfaro Ramirez%' OR
  Encabezado  like '%Enrique Alfaro%' OR
  Encabezado  like '%Alfaro Ramirez%' OR

  PieFoto  like '%Enrique Alfaro Ramirez%' OR
  PieFoto  like '%Enrique Alfaro%' OR
  PieFoto like '%Alfaro Ramirez%'
) GROUP BY n.Periodico
ORDER BY n.Fecha";
$NotasAlfaro = mysql_query($qryCorte);

//Query Corte de Notas Alfonso Petersen
$qryCorte = "SELECT
p.Nombre,
COUNT(DISTINCT(n.idEditorial)) AS 'Total',
GROUP_CONCAT(DISTINCT(idEditorial) SEPARATOR ',') AS 'idNotas',
GROUP_CONCAT(NumeroPagina SEPARATOR ',') AS 'PDF'
FROM
(SELECT idEditorial,Periodico,Activo,Texto,Titulo,Encabezado,PieFoto,Autor,Fecha,NumeroPagina FROM noticiasDia WHERE $rangoFechas
UNION ALL
SELECT idEditorial,Periodico,Activo,Texto,Titulo,Encabezado,PieFoto,Autor,Fecha,NumeroPagina FROM noticiasSemana WHERE $rangoFechas) n,
periodicos p,
ordenGeneraljalisco o
WHERE
p.idPeriodico=n.Periodico AND
p.idPeriodico=o.periodico AND
n.Activo = 1 AND
$rangoFechas AND (
  Texto like '%Alfonso Petersen Farah%' OR
  Texto like '%Alfonso Petersen%' OR

  Titulo like '%Alfonso Petersen Farah%' OR
  Titulo like '%Alfonso Petersen%' OR

  Encabezado like '%Alfonso Petersen Farah%' OR
  Encabezado like '%Alfonso Petersen%' OR

  PieFoto like '%Alfonso Petersen Farah%' OR
  PieFoto like '%Alfonso Petersen%'
) GROUP BY n.Periodico
ORDER BY n.Fecha";
$NotasPetersen = mysql_query($qryCorte);

//Query Corte de Notas Lagrimita
$qryCorte = "SELECT
p.Nombre,
COUNT(DISTINCT(n.idEditorial)) AS 'Total',
GROUP_CONCAT(DISTINCT(idEditorial) SEPARATOR ',') AS 'idNotas',
GROUP_CONCAT(NumeroPagina SEPARATOR ',') AS 'PDF'
FROM
(SELECT idEditorial,Periodico,Activo,Texto,Titulo,Encabezado,PieFoto,Autor,Fecha,NumeroPagina FROM noticiasDia WHERE $rangoFechas
UNION ALL
SELECT idEditorial,Periodico,Activo,Texto,Titulo,Encabezado,PieFoto,Autor,Fecha,NumeroPagina FROM noticiasSemana WHERE $rangoFechas) n,
periodicos p,
ordenGeneraljalisco o
WHERE
p.idPeriodico=n.Periodico AND
p.idPeriodico=o.periodico AND
n.Activo = 1 AND
$rangoFechas AND (
  Texto like '%Guillermo Cienfuegos Perez%' OR
  Texto  like '%Guillermo Cienfuegos%' OR
    Texto  like '%Cienfuegos Perez%' OR
    Texto  like '%lagrimita%' OR

  Titulo  like '%Guillermo Cienfuegos Perez%' OR
  Titulo  like '%Guillermo Cienfuegos%' OR
    Titulo  like '%Cienfuegos Perez%' OR
    Titulo  like '%lagrimita%' OR

  Encabezado  like '%Guillermo Cienfuegos Perez%' OR
  Encabezado  like '%Guillermo Cienfuegos%' OR
    Encabezado  like '%Cienfuegos Perez%' OR
    Encabezado  like '%lagrimita%' OR

  PieFoto  like '%Guillermo Cienfuegos Perez%' OR
  PieFoto  like '%Guillermo Cienfuegos%' OR
    PieFoto like '%Cienfuegos Perez%' OR
    PieFoto  like '%lagrimita%'
) GROUP BY n.Periodico
ORDER BY n.Fecha";
$NotasLagrimita = mysql_query($qryCorte);


//Query Corte de Notas Celia Fausto
$qryCorte = "SELECT
p.Nombre,
COUNT(DISTINCT(n.idEditorial)) AS 'Total',
GROUP_CONCAT(DISTINCT(idEditorial) SEPARATOR ',') AS 'idNotas',
GROUP_CONCAT(NumeroPagina SEPARATOR ',') AS 'PDF'
FROM
(SELECT idEditorial,Periodico,Activo,Texto,Titulo,Encabezado,PieFoto,Autor,Fecha,NumeroPagina FROM noticiasDia WHERE $rangoFechas
UNION ALL
SELECT idEditorial,Periodico,Activo,Texto,Titulo,Encabezado,PieFoto,Autor,Fecha,NumeroPagina FROM noticiasSemana WHERE $rangoFechas) n,
periodicos p,
ordenGeneraljalisco o
WHERE
p.idPeriodico=n.Periodico AND
p.idPeriodico=o.periodico AND
n.Activo = 1 AND
$rangoFechas AND (
  Texto like '%Celia fausto Lizaola%' OR
  Texto like '%Celia fausto%' OR
  Texto like '%fausto Lizaola%' OR

  Titulo like '%Celia fausto Lizaola%' OR
  Titulo like '%Celia fausto%' OR
  Titulo like '%fausto Lizaola%' OR

  Encabezado like '%Celia fausto Lizaola%' OR
  Encabezado like '%Celia fausto%' OR
  Encabezado like '%fausto Lizaola%' OR

  PieFoto like '%Celia fausto Lizaola%' OR
  PieFoto like '%Celia fausto%' OR
  PieFoto like '%fausto Lizaola%' OR

  Autor like '%Celia fausto Lizaola%' OR
  Autor like '%Celia fausto%' OR
  Autor like '%fausto Lizaola%'
) GROUP BY n.Periodico
ORDER BY n.Fecha";
$NotasFausto = mysql_query($qryCorte);


/************Fin de Querys***************/
$tablaVillanueva = "";
$respNotasVillanueva = 0;

while($row = mysql_fetch_array($NotasVillanueva))
{
	$tablaVillanueva .= "<div class='row'>
						<div class='col-md-4'><strong>".$row['Nombre']."</strong></div>
						<div class='col-md-4'><strong>".$row['Total']."</strong></div>
						<div class='col-md-4'><strong>Testigos</div>
						</div>";
	$respNotasVillanueva += intval($row['Total']);
}
$respMediosVillanueva = mysql_num_rows($NotasVillanueva);


$tablaAlfaro = "";
$respNotasAlfaro = 0;

while($row = mysql_fetch_array($NotasAlfaro))
{
	$tablaAlfaro .= "<div class='row'>
					<div class='col-md-4'><strong>".$row['Nombre']."</strong></div>
					<div class='col-md-4'><strong>".$row['Total']."</strong></div>
					<div class='col-md-4'><strong>Testigos</div>
					</div>";
	$respNotasAlfaro += intval($row['Total']);
}
$respMediosAlfaro = mysql_num_rows($NotasAlfaro);

$tablaPetersen = "";
$respNotasPetersen = 0;

while($row = mysql_fetch_array($NotasPetersen))
{
	$tablaPetersen .= "<div class='row'>
					<div class='col-md-4'><strong>".$row['Nombre']."</strong></div>
					<div class='col-md-4'><strong>".$row['Total']."</strong></div>
					<div class='col-md-4'><strong>Testigos</div>
					</div>";
	$respNotasPetersen += intval($row['Total']);
}
$respMediosPetersen = mysql_num_rows($NotasPetersen);


$tablaLagrimita = "";
$respNotasLagrimita = 0;

while($row = mysql_fetch_array($NotasLagrimita))
{
	$tablaLagrimita .= "<div class='row'>
						<div class='col-md-4'><strong>".$row['Nombre']."</strong></div>
						<div class='col-md-4'><strong>".$row['Total']."</strong></div>
						<div class='col-md-4'><strong>Testigos</div>
						</div>";
	$respNotasLagrimita += intval($row['Total']);
}
$respMediosLagrimita = mysql_num_rows($NotasLagrimita);

$tablaFausto = "";
$respNotasFausto = 0;

while($row = mysql_fetch_array($NotasFausto))
{
	$tablaFausto .= "<div class='row'>
					<div class='col-md-4'><strong>".$row['Nombre']."</strong></div>
					<div class='col-md-4'><strong>".$row['Total']."</strong></div>
					<div class='col-md-4'><strong>Testigos</div>
					</div>";
	$respNotasFausto += intval($row['Total']);
}
$respMediosFausto = mysql_num_rows($NotasFausto);


echo "Villanueva: ".$respNotasVillanueva."<br>";
echo "Alfaro: ".$respNotasAlfaro."<br>";
echo "Petersen: ".$respNotasPetersen."<br>";
echo "Cienfuegos: ".$respNotasLagrimita."<br>";
echo "Lizaola: ".$respNotasFausto."<br>";
$data = array($respNotasVillanueva,$respNotasAlfaro,$respNotasPetersen,$respNotasLagrimita,$respNotasFausto);

// Create the Pie Graph.
$graph = new PieGraph(600,350);
$graph->SetShadow();

// Set A title for the plot
//$graph->title->Set("Notas Precandidatos Guadalajara");
$graph->title->SetColor("brown");

// Create pie plot
$p1 = new PiePlot($data);

//$p1->SetTheme("sand");
$p1->SetLabelPos(0.6);
$p1->SetSize(0.3);
$p1->SetLegends(array("Ricardo Villanueva","Enrique Alfaro","Alfonso Petersen","Guillermo Cienfuegos","Celia Fausto Lizaola"));
$graph->legend->Pos(0.07,0.8);

// Set how many pixels each slice should explode
$p1->Explode(array(15,15,15,15));
$graph->Add($p1);
$p1->SetSliceColors(array('#8E0000','#F57921','#017CC2','#A3A3A3','#FFFF00'));
$gdImgHandler = $graph->Stroke(_IMG_HANDLER);

// Stroke image to a file and browser
// Default is PNG so use ".png" as suffix
//$fileName = "/var/www/external/rvl/img/graficaVillanuevaCorte.png";
$fileName = "/var/www/external/services/rvl/img/graficaVillanuevaCorte.png";
$graph->img->Stream($fileName);

// Send it back to browser
//$graph->img->Headers();
//$graph->img->Stream();
?>
