<?php

require "../mail/conexion.php";
require "conexion.php";


mysql_query("set names 'utf8'");

$rangoFechas = "";
$fechaCorte = "";
//Conseguir rango de fechas a buscar
switch(date('N'))
{
  case 1:
    $rangoFechas = "Fecha BETWEEN DATE_SUB(CURDATE(),INTERVAL 2 DAY) AND CURDATE()";
    $fechaCorte = fecha_completa(DATE('Y-m')."-".(date('j')-2))." - ".fecha_completa(DATE('Y-m-d'));
  break;

  case 2:
    $rangoFechas = "Fecha BETWEEN DATE_SUB(CURDATE(),INTERVAL 3 DAY) AND CURDATE()";
    $fechaCorte = fecha_completa(DATE('Y-m')."-".(date('j')-3))." - ".fecha_completa(DATE('Y-m-d'));
  break;

  case 3:
    $rangoFechas = "Fecha BETWEEN DATE_SUB(CURDATE(),INTERVAL 4 DAY) AND CURDATE()";
    $fechaCorte = fecha_completa(DATE('Y-m')."-".(date('j')-4))." - ".fecha_completa(DATE('Y-m-d'));
  break;

  case 4:
    $rangoFechas = "Fecha BETWEEN DATE_SUB(CURDATE(),INTERVAL 5 DAY) AND CURDATE()";
    $fechaCorte = fecha_completa(DATE('Y-m')."-".(date('j')-5))." - ".fecha_completa(DATE('Y-m-d'));
  break;

  case 5:
    $rangoFechas = "Fecha BETWEEN DATE_SUB(CURDATE(),INTERVAL 6 DAY) AND CURDATE()";
    $fechaCorte = fecha_completa(DATE('Y-m')."-".(date('j')-6))." - ".fecha_completa(DATE('Y-m-d'));
  break;

  case 6:
    $rangoFechas = "Fecha = CURDATE()";
    $fechaCorte = fecha_completa(DATE('Y-m-d'));
  break;

  case 7:
    $rangoFechas = "Fecha BETWEEN DATE_SUB(CURDATE(),INTERVAL 1 DAY) AND CURDATE()";
    $fechaCorte = fecha_completa(DATE('Y-m')."-".(date('j')-1))." - ".fecha_completa(DATE('Y-m-d'));
  break;
}

//Query Corte de Notas Ricardo Villanueva
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
                        <div class='col-md-4'><button type='button' class='btn btn-default btn-xs' data-toggle='modal' data-target='#testigos' onclick='testigosmodal(\"".$row['idNotas']."\");'> <i class='fa fa-file-pdf-o'></i> </button> </div>
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
                        <div class='col-md-4'><button type='button' class='btn btn-default btn-xs' data-toggle='modal' data-target='#testigos' onclick='testigosmodal(\"".$row['idNotas']."\");'> <i class='fa fa-file-pdf-o'></i> </button> </div>
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
                        <div class='col-md-4'><button type='button' class='btn btn-default btn-xs' data-toggle='modal' data-target='#testigos' onclick='testigosmodal(\"".$row['idNotas']."\");'> <i class='fa fa-file-pdf-o'></i> </button> </div>
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
                        <div class='col-md-4'><button type='button' class='btn btn-default btn-xs' data-toggle='modal' data-target='#testigos' onclick='testigosmodal(\"".$row['idNotas']."\");'> <i class='fa fa-file-pdf-o'></i> </button> </div>
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
                        <div class='col-md-4'><button type='button' class='btn btn-default btn-xs' data-toggle='modal' data-target='#testigos' onclick='testigosmodal(\"".$row['idNotas']."\");'> <i class='fa fa-file-pdf-o'></i> </button> </div>
                       </div>";
  $respNotasFausto += intval($row['Total']);
}
$respMediosFausto = mysql_num_rows($NotasFausto);


function fecha_completa($fecha)
{
    $subfecha=explode("-",$fecha);
    $año=$subfecha[0];
    $mes=$subfecha[1];
    $dia=$subfecha[2];

    $dia2=date( "d", mktime(0,0,0,$mes,(int)$dia,$año));
    $mes2=date( "m", mktime(0,0,0,$mes,(int)$dia,$año));
    $año2=date( "Y", mktime(0,0,0,$mes,(int)$dia,$año));
    $dia_sem=date( "w", mktime(0,0,0,$mes,$dia,$año));

   switch($dia_sem)
   {
       case "0":   // Bloque 1
         $dia_sem3='Domingo';
       break;

       case "1":   // Bloque 1
         $dia_sem3='Lunes';
       break;

       case "2":   // Bloque 1
         $dia_sem3='Martes';
       break;

       case "3":   // Bloque 1
         $dia_sem3='Miércoles';
       break;

       case "4":   // Bloque 1
         $dia_sem3='Jueves';
       break;

       case "5":   // Bloque 1
         $dia_sem3='Viernes';
       break;

       case "6":   // Bloque 1
         $dia_sem3='Sábado';
       break;

      default:   // Bloque 3
    };

    switch($mes2)
    {
        case "1":   // Bloque 1
            $mes3='Enero';
        break;

        case "2":   // Bloque 1
            $mes3='Febrero';
        break;

        case "3":   // Bloque 1
            $mes3='Marzo';
        break;

        case "4":   // Bloque 1
            $mes3='Abril';
        break;

        case "5":   // Bloque 1
            $mes3='Mayo';
        break;

        case "6":   // Bloque 1
            $mes3='Junio';
        break;

        case "7":   // Bloque 1
            $mes3='Julio';
        break;

        case "8":   // Bloque 1
            $mes3='Agosto';
        break;

        case "9":   // Bloque 1
            $mes3='Septiembre';
        break;

        case "10":   // Bloque 1
            $mes3='Octubre';
        break;

        case "11":   // Bloque 1
            $mes3='Noviembre';
        break;

        case "12":   // Bloque 1
            $mes3='Diciembre';
        break;

        default:   // Bloque 3
     break;
  };


  $fecha_texto=$dia_sem3.' '.$dia2.' '.'de'.' '.$mes3.' '.'de'.' '.$año2;

  return $fecha_texto;
}



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no">
    <title>Corte Informativo <?php echo DATE('Y-m-d')?></title>
 <!-- Versión compilada y comprimida del CSS de Bootstrap -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<!-- Tema opcional -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-theme.min.css">

<!-- Versión compilada y comprimida del JavaScript de Bootstrap -->
  </head>
  <body>
      <div class="container">
          <div class="page-header">
              <p class="text-primary">
                  <img src="img/logo.png" alt="Ricardo Villanueva Lomelí" class="img-rounded">
              </p>
            <h1>Corte de Información Prensa Escrita</h1>
            <p class="lead"><?= $fechaCorte ?></p>
          </div>

          <h3 id="menu">Tendencia en Medios</h3><small>Jalisco    </small>
          <p>Analisis comparativo del comportamiento en los medios de los Candidatos a la <strong>Alcaldia de Guadalajara</strong></p>

          <div class="row">
             <div class="col-md-6">
                <div class="row cabecera">
                    <div class="col-md-6"><strong>Actor</strong></div>
                    <div class="col-md-3"><strong>No. Medios</strong></div>
                    <div class="col-md-3"><strong>No. Notas</strong></div>
                </div>
                <div class="row">
                    <div class="col-md-6"><img src="img/rvl.jpg"> <strong><a href="#RVL">Ricardo Villanueva Lomeli</a></strong></div>
                    <div class="col-md-3"><strong class="numerosContador"><?= $respMediosVillanueva;?></strong></div>
                    <div class="col-md-3"><strong class="numerosContador"><?= $respNotasVillanueva;?></strong></div>
                </div>
                <div class="row">
                    <div class="col-md-6"><img src="img/ear.jpg"> <a href="#EAR"><strong>Enrique Alfaro Ramirez</strong></a></div>
                    <div class="col-md-3"><strong class="numerosContador"><?= $respMediosAlfaro;?></strong></div>
                    <div class="col-md-3"><strong class="numerosContador"><?= $respNotasAlfaro;?></strong></div>
                </div>
                <div class="row">
                    <div class="col-md-6"><img src="img/apf.jpg"><a href="#APF"> <strong>Alfonso Petersen Farah</strong></a></div>
                    <div class="col-md-3"><strong class="numerosContador"><?= $respMediosPetersen;?></strong></div>
                    <div class="col-md-3"><strong class="numerosContador"><?= $respNotasPetersen;?></strong></div>
                </div>
                <div class="row">
                    <div class="col-md-6"><img src="img/gcp.jpeg"> <a href="#GCP"><strong>Guillermo Cienfuegos Perez</strong></a></div>
                    <div class="col-md-3"><strong class="numerosContador"><?= $respMediosLagrimita;?></strong></div>
                    <div class="col-md-3"><strong class="numerosContador"><?= $respNotasLagrimita;?></strong></div>
                </div>
                <div class="row">
                    <div class="col-md-6"><img src="img/cfl.jpg"> <a href="#GCP"><strong>Celia Fausto Lizaola</strong></a></div>
                    <div class="col-md-3"><strong class="numerosContador"><?= $respMediosFausto;?></strong></div>
                    <div class="col-md-3"><strong class="numerosContador"><?= $respNotasFausto;?></strong></div>
                </div>
             </div>
             <div class="col-md-6">
                 <img src="img/graficaVillanuevaCorte.png" class="img-responsive">
             </div>
          </div>
      </div> <!--Primera Pagina-->

      <div class="container">
          <div class="page-header">
            <h1>Desglose Ricardo Villanueva Lomelí</h1>
            <p class="lead"><?= $fechaCorte ?></p>
            <a id="RVL" href="#menu">Arriba</a>
          </div>
          <div class="row">
              <div class="col-md-6">
                  <div class="row cabecera">
                      <h3><img src="img/rvl.jpg">  Ricardo Villanueva Lomelí</h3>
                  </div>
                  <div class="row">
                      <img src="img/historicoVillanueva.png" class="img-responsive">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="row cabecera">
                      <div class="col-md-4"><strong>Medio</strong></div>
                      <div class="col-md-4"><strong>Total</strong></div>
                      <div class="col-md-4"><strong>Testigos</strong></div>
                  </div>
                  <?= $tablaVillanueva ?>

              </div>
          </div>
      </div><!--Primera Pagina Segundo Bloque-->

      <div class="container">
          <div class="page-header">
            <h1>Desglose Enrique Alfaro Ramírez</h1>
            <p class="lead"><?= $fechaCorte ?></p>
            <a id="EAR" href="#menu">Arriba</a>
          </div>
          <div class="row">
              <div class="col-md-6">
                  <div class="row cabecera">
                      <h3><img src="img/ear.jpg"> Enrique Alfaro Ramírez</h3>
                  </div>
                  <div class="row">
                      <img src="img/historicoAlfaro.png" class="img-responsive">
                  </div>
              </div>

              <div class="col-md-6">
                  <div class="row cabecera">
                      <div class="col-md-4"><strong>Medio</strong></div>
                      <div class="col-md-4"><strong>Total</strong></div>
                      <div class="col-md-4"><strong>Testigos</strong></div>
                  </div>
                  <?= $tablaAlfaro ?>
              </div>
          </div>
      </div><!--Segunda Pagina Segundo Bloque-->

      <div class="container">
          <div class="page-header">
            <h1>Desglose Alfonso Petersen Farah</h1>
            <p class="lead"><?= $fechaCorte ?></p>
            <a id="APF" href="#menu">Arriba</a>
          </div>
          <div class="row">
              <div class="col-md-6">
                  <div class="row cabecera">
                      <h3><img src="img/apf.jpg"> Alfonso Petersen Farah</h3>
                  </div>
                  <div class="row">
                      <img src="img/historicoPetersen.png" class="img-responsive">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="row cabecera">
                      <div class="col-md-4"><strong>Medio</strong></div>
                      <div class="col-md-4"><strong>Total</strong></div>
                      <div class="col-md-4"><strong>Testigos</strong></div>
                  </div>
                  <?= $tablaPetersen ?>
              </div>
          </div>
      </div><!--Tercera Pagina Segundo Bloque-->

      <div class="container">
          <div class="page-header">
            <h1>Desglose Guillermo Cienfuegos Pérez</h1>
            <p class="lead"><?= $fechaCorte ?></p>
            <a id="GCP" href="#menu">Arriba</a>
          </div>
          <div class="row">
              <div class="col-md-6">
                  <div class="row cabecera">
                      <h3><img src="img/gcp.jpeg"> Guillermo Cienfuegos Pérez</h3>
                  </div>
                  <div class="row">
                      <img src="img/historicoCienfuegos.png" class="img-responsive">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="row cabecera">
                      <div class="col-md-4"><strong>Medio</strong></div>
                      <div class="col-md-4"><strong>Total</strong></div>
                      <div class="col-md-4"><strong>Testigos</strong></div>
                  </div>
                  <?= $tablaLagrimita ?>
              </div>
          </div>
      </div><!--Cuarta Pagina Segundo Bloque-->

      <div class="container">
          <div class="page-header">
            <h1>Desglose Celia Fausto Lizaola</h1>
            <p class="lead"><?= $fechaCorte ?></p>
            <a id="GCP" href="#menu">Arriba</a>
          </div>
          <div class="row">
              <div class="col-md-6">
                  <div class="row cabecera">
                      <h3><img src="img/cfl.jpg"> Celia Fausto Lizaola</h3>
                  </div>
                  <div class="row">
                      <img src="img/historicoFausto.png" class="img-responsive">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="row cabecera">
                      <div class="col-md-4"><strong>Medio</strong></div>
                      <div class="col-md-4"><strong>Total</strong></div>
                      <div class="col-md-4"><strong>Testigos</strong></div>
                  </div>
                  <?= $tablaFausto ?>
              </div>
          </div>
      </div><!--Quinta Pagina Segundo Bloque-->
      <div class="modal fade" id="testigos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    </div>


    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <!-- Todos los plugins JavaScript de Bootstrap (también puedes
         incluir archivos JavaScript individuales de los únicos
         plugins que utilices) -->
    <script type="text/javascript">
        $('#testigos').on('shown.bs.modal', function () {
            $('#myInput').focus()
        });

        function testigosmodal(ids,rango)
        {
            //$.post('witnesses.php',{ids:ids,rango:rango});
            $("#testigos").empty();
            $("#testigos").load('witnesses.php',{ids:ids,rango:rango});
        }
    </script>
  </body>
</html>
