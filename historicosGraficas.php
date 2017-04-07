<?php // content="text/plain; charset=utf-8"


require_once ('JPGraph/jpgraph.php');
require_once ('JPGraph/jpgraph_bar.php');
require 'conexion.php';


require_once ('JPGraph/jpgraph.php');
require_once ('JPGraph/jpgraph_bar.php');
require 'conexion.php';


mysql_query("set names 'utf8'");
$rangoFechas = "";
$fechaCorte = "";
$etiquetasGrafica = array();
//Conseguir rango de fechas a buscar
switch(date('N'))
{
	case 1:
		$rangoFechas = "Fecha BETWEEN DATE_SUB(CURDATE(),INTERVAL 2 DAY) AND CURDATE()";
		for($i = 2; $i >= 0; $i--)
		{
			$etiquetasGrafica[] = date("Y-m-d", mktime(0, 0, 0, date("m") , date("d")-$i, date("Y")));
		}
	break;
	case 2:
		$rangoFechas = "Fecha BETWEEN DATE_SUB(CURDATE(),INTERVAL 3 DAY) AND CURDATE()";
		for($i = 3; $i >= 0; $i--)
		{
			$etiquetasGrafica[] = date("Y-m-d", mktime(0, 0, 0, date("m") , date("d")-$i, date("Y")));
		}
	break;
	case 3:
		$rangoFechas = "Fecha BETWEEN DATE_SUB(CURDATE(),INTERVAL 4 DAY) AND CURDATE()";
		for($i = 4; $i >= 0; $i--)
		{
			$etiquetasGrafica[] = date("Y-m-d", mktime(0, 0, 0, date("m") , date("d")-$i, date("Y")));
		}
	break;
	case 4:
		$rangoFechas = "Fecha BETWEEN DATE_SUB(CURDATE(),INTERVAL 5 DAY) AND CURDATE()";
		for($i = 5; $i >= 0; $i--)
		{
			$etiquetasGrafica[] = date("Y-m-d", mktime(0, 0, 0, date("m") , date("d")-$i, date("Y")));
		}
	break;
	case 5:
		$rangoFechas = "Fecha BETWEEN DATE_SUB(CURDATE(),INTERVAL 6 DAY) AND CURDATE()";
		for($i = 6; $i >= 0; $i--)
		{
			$etiquetasGrafica[] = date("Y-m-d", mktime(0, 0, 0, date("m") , date("d")-$i, date("Y")));
		}
	break;
	case 6:
		$rangoFechas = "Fecha = CURDATE()";
		$etiquetasGrafica = array(date("Y-m-d"));
	break;
	case 7:
		$rangoFechas = "Fecha BETWEEN DATE_SUB(CURDATE(),INTERVAL 1 DAY) AND CURDATE()";
		for($i = 1; $i >= 0; $i--)
		{
			$etiquetasGrafica[] = date("Y-m-d", mktime(0, 0, 0, date("m") , date("d")-$i, date("Y")));
		}
	break;
}

//Query Corte de Notas Ricardo Villanueva
$qryCorte = "SELECT
COUNT(DISTINCT(n.idEditorial)) AS 'Total',
n.Fecha
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
) GROUP BY n.Fecha
ORDER BY n.Fecha";

$NotasVillanueva = mysql_query($qryCorte);

//Query Corte de Notas Enrique Alfaro
$qryCorte = "SELECT
COUNT(DISTINCT(n.idEditorial)) AS 'Total',
n.Fecha
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
) GROUP BY n.Fecha
ORDER BY n.Fecha";

$NotasAlfaro = mysql_query($qryCorte);

//Query Corte de Notas Alfonso Petersen
$qryCorte = "SELECT
COUNT(DISTINCT(n.idEditorial)) AS 'Total',
n.Fecha
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
) GROUP BY n.Fecha
ORDER BY n.Fecha";

$NotasPetersen = mysql_query($qryCorte);

//Query Corte de Notas Lagrimita
$qryCorte = "SELECT
COUNT(DISTINCT(n.idEditorial)) AS 'Total',
n.Fecha
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
) GROUP BY n.Fecha
ORDER BY n.Fecha";

$NotasLagrimita = mysql_query($qryCorte);

//Query Corte de Notas Celia Fausto
$qryCorte = "SELECT
COUNT(DISTINCT(n.idEditorial)) AS 'Total',
n.Fecha
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
) GROUP BY n.Fecha
ORDER BY n.Fecha";

$NotasFausto = mysql_query($qryCorte);
/************Fin de Querys***************/

$fechasTotales = count($etiquetasGrafica);

//Cada while guarda el conteo de las notas en arreglos independiente por personaje y por fecha
$respNotasVillanueva = array();
$i = 0;
while($row = mysql_fetch_array($NotasVillanueva))
{
	$flag = 0;
	while($flag == 0)
	{
		if($etiquetasGrafica[$i] == $row['Fecha'])
		{
			$respNotasVillanueva[] = intval($row['Total']);
			$flag = 1;
		}
		else
		{
			$respNotasVillanueva[] = 0;
		}
		$i++;
	}
}
while($i<$fechasTotales)
{
	$respNotasVillanueva[] = 0;
	$i++;
}


$respNotasAlfaro = array();
$i = 0;
while($row = mysql_fetch_array($NotasAlfaro))
{
	$flag = 0;
	while($flag == 0)
	{
		if($etiquetasGrafica[$i] == $row['Fecha'])
		{
			$respNotasAlfaro[] = intval($row['Total']);
			$flag = 1;
		}
		else
		{
			$respNotasAlfaro[] = 0;
		}
		$i++;
	}
}
while($i<$fechasTotales)
{
	$respNotasAlfaro[] = 0;
	$i++;
}


$respNotasPetersen = array();
$i = 0;
while($row = mysql_fetch_array($NotasPetersen))
{
	$flag = 0;
	while($flag == 0)
	{
		if($etiquetasGrafica[$i] == $row['Fecha'])
		{
			$respNotasPetersen[] = intval($row['Total']);
			$flag = 1;
		}
		else
		{
			$respNotasPetersen[] = 0;
		}
		$i++;
	}
}
while($i<$fechasTotales)
{
	$respNotasPetersen[] = 0;
	$i++;
}


$respNotasLagrimita = array();
$i = 0;
while($row = mysql_fetch_array($NotasLagrimita))
{
	$flag = 0;
	while($flag == 0)
	{
		if($etiquetasGrafica[$i] == $row['Fecha'])
		{
			$respNotasLagrimita[] = intval($row['Total']);
			$flag = 1;
		}
		else
		{
			$respNotasLagrimita[] = 0;
		}
		$i++;
	}
}
while($i<$fechasTotales)
{
	$respNotasLagrimita[] = 0;
	$i++;
}


$respNotasFausto = array();
$i = 0;
while($row = mysql_fetch_array($NotasFausto))
{
	$flag = 0;
	while($flag == 0)
	{
		if($etiquetasGrafica[$i] == $row['Fecha'])
		{
			$respNotasFausto[] = intval($row['Total']);
			$flag = 1;
		}
		else
		{
			$respNotasFausto[] = 0;
		}
		$i++;
	}
}
while($i<$fechasTotales)
{
	$respNotasFausto[] = 0;
	$i++;
}


crearGrafica($respNotasVillanueva,$etiquetasGrafica,"Ricardo Villanueva",'#8E0000');
crearGrafica($respNotasAlfaro,$etiquetasGrafica,"Enrique Alfaro",'#F57921');
crearGrafica($respNotasPetersen,$etiquetasGrafica,"Alfonso Petersen",'#017CC2');
crearGrafica($respNotasLagrimita,$etiquetasGrafica,"Guillermo Cienfuegos",'#A3A3A3');
crearGrafica($respNotasFausto,$etiquetasGrafica,"Celia Fausto",'#FFFF00');



function crearGrafica($datos,$dateLabel,$actor,$color)
{
	// Create the graph. These two calls are always required
	$graph = new Graph(500,350);
	$graph->SetScale('textlin');

	// Add a drop shadow
	$graph->SetShadow();

	// Adjust the margin a bit to make more room for titles
	$graph->SetMargin(50,30,20,40);

	// Create a bar pot
	$bplot = new BarPlot($datos);

	// Adjust fill color

	$graph->Add($bplot);
	$bplot->SetFillColor($color);

	// Setup the titles
	$graph->title->Set('Historico de Notas - '.$actor);
	$graph->xaxis->title->Set('Fecha');
	$graph->xaxis->SetTickLabels($dateLabel);

	$graph->yaxis->title->Set(utf8_decode('Número de Notas'));

	$graph->title->SetFont(FF_FONT1,FS_BOLD);
	$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
	$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);

	// Display the graph
	//$graph->Stroke();


	$gdImgHandler = $graph->Stroke(_IMG_HANDLER);
	// Stroke image to a file and browser
	// Default is PNG so use ".png" as suffix
	//$fileName = "/var/www/external/services/rvl/img/historicoVillanueva.png";
	$fileName = "/var/www/external/services/rvl/img/historico".getSaveFileName($actor).".png";
	$graph->img->Stream($fileName);
}


function getSaveFileName($actor)
{
	switch($actor)
	{
		case "Ricardo Villanueva":
			return "Villanueva";
		break;

		case "Enrique Alfaro":
			return "Alfaro";
		break;

		case "Alfonso Petersen":
			return "Petersen";
		break;

		case "Guillermo Cienfuegos":
			return "Cienfuegos";
		break;

		case "Celia Fausto":
			return "Fausto";
		break;

		default:
			return "Unknown";
		break;
	}
}


?>
