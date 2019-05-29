<!DOCTYPE html>
<?php
include('lib/Parsedown.php');

include('Clases/Common.php');
include('Clases/Clean.php');
include('Clases/FrontMatter.php');
include('Clases/Charper.php');
include('Clases/Bibliography.php');

$Parsedown = new Parsedown();

//Creacion de los paths
$codigo = $_GET['code'];
$path = "ibsa-tesis/xml/".$codigo."/";
$pathxml = $path.$codigo.".xml";

 ?>
<html lang="es" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Lector XML</title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css"/>
	</head>
	<body>
		<?php
			if (file_exists($pathxml)) {
				$texto = DebXML($pathxml);
				$xml = new SimpleXMLElement($texto , 0);

				foreach ($xml->body->section as $principal) {
					switch ($principal['role']) {
						case "frontmatter":
							FrontMatter($principal, $Parsedown);
							break;
						case 'bodymatter':
							BodyMatter($principal, $Parsedown);
							break;
						case 'backmatter':
							BackMatter($principal, $Parsedown);
							break;
						default:
							echo "Sección desconocida";
							break;
					}
				}

			} else {
			    exit('--Error-- <br>'.$codigo.".xml no existe");
			}

		# -----------------------------------------------------------------------------
		# Funcion del FrontMatter
		# -----------------------------------------------------------------------------
		 function FrontMatter($padre, $Parsedown){
			 #Primera parte Cover y Abstract
			 foreach ($padre as $seccion) {
				 switch ($seccion->getName()) {
				 	case 'section':
				 		SectionFrontmatter($seccion, $Parsedown);
				 		break;
					case 'toc':
						echo "<div class=indice align=justify>";
					 	echo $Parsedown->text(Tc($seccion));
					 	echo "</div>";
					  break;
				 	default:
				 		// code...
				 		break;
				 }
			 }
		 }
		 function BodyMatter($padre, $Parsedown){
			 echo "<div class=BodyMatter align=justify>";
			 foreach ($padre->section as $seccion){
					 echo $Parsedown->text(Seccion($seccion,""));
				 }
			 echo "</div>";
		 }

		 function BackMatter($padre, $Parsedown){
			 echo "<div class=BackMatter align=justify>";
			 foreach ($padre as $seccion) {
				 switch ($seccion->getName()) {
				 	case 'bibliography':
				 		echo $Parsedown->text(biBliography($seccion));
				 		break;
					case 'section':
						if ($seccion['role'] == "apendix") {
							echo $Parsedown->text(Apendix($seccion));
						}
				 		break;
				 	default:
						//code
				 		break;
				 }
			 }
			 echo "</div>";
		 }
		?>
		</div>
	</body>
</html>
