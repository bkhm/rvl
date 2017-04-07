<?php
require "conexion.php";
mysql_query("set names 'utf8'");

$ids=$_POST['ids'];
//$ip = "http://192.168.3.154";
$ip = "http://187.247.253.5";

$sql="SELECT
		p.Nombre,
		CONCAT('/Periodicos/',REPLACE(p.Nombre,' ','%20'),'/',n.Fecha,'/',NumeroPagina) AS 'pdf',
		CONCAT('/Periodicos/',REPLACE(p.Nombre,' ','%20'),'/',n.Fecha,'/',NumeroPagina,'.jpg') AS 'jpg'
	  FROM
	  	(SELECT idEditorial,Periodico,Activo,Texto,Titulo,Encabezado,PieFoto,Autor,Fecha,NumeroPagina FROM noticiasDia
          UNION ALL
         SELECT idEditorial,Periodico,Activo,Texto,Titulo,Encabezado,PieFoto,Autor,Fecha,NumeroPagina FROM noticiasSemana) n,
		periodicos p
	  WHERE
	  p.idPeriodico = n.Periodico AND
	  n.idEditorial IN(".$ids.")
	  GROUP BY n.NumeroPagina";

$resultados = mysql_query($sql);

$modal_form = '<div class="modal-dialog">
	              <div class="modal-content">
	                <div class="modal-header">
	                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                  <h4 class="modal-title" id="exampleModalLabel"> Testigos </h4>
	                </div>
                <div class="modal-body" id="receptmentTestigos">';

while($row = mysql_fetch_array($resultados))
{
	$modal_form .= "<a href='".$ip.$row['pdf']."' target='_blank'><img class='img-responsive img-thumbnail' src='".$ip.$row['jpg']."' width='150'></a>&nbsp;&nbsp;";
}

$modal_form .='</div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>';

echo $modal_form;

?>
