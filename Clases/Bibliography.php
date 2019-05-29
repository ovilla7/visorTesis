<?php
function biBliography($seccion){
  $texto = "";
  foreach ($seccion as $tipe) {
    switch ((string)$tipe->getName()) {
      case 'h':
        $texto .= h($tipe);
        break;
      case 'entry':
        $texto .= Entry($tipe);
        break;
      default:
        break;
    }
  }
  return $texto;
}

function Entry($entrada){
  if ($entrada->object) {
    return obj($entrada->object);
  }
  $aux = $entrada->attributes();
  return $aux['id'].". ".$entrada->asXML()."\n";
}

function Apendix($seccion){
  $texto = "";
  foreach ($seccion as $tipe) {
    switch ((string)$tipe->getName()) {
      case 'h':
        $texto .= hcc($tipe, 1);
        break;
      case 'p':
        $texto .= pc($tipe);
        break;
      case 'table':
        $texto .= tablec($tipe);
        break;
      case 'list':
          $texto .= lst($tipe);
          break;
      default:
        //code
        break;
    }
  }
  return $texto;
}


function footNotes($value){
  $text="";
  foreach ($value as $tipe) {
    switch ((string)$tipe->getName()) {
      case 'note':
        $text .= notes($tipe);
        break;
      default:
        break;
    }
  }
  return $text;
}

function notes($value){
  $text="";
  foreach ($value as $tipe) {
    switch ((string)$tipe->getName()) {
      case 'h':
        $text .= hcc($tipe, 1);
        break;
      case 'p':
        $text .= pc($tipe);
        break;
      default:
        break;
    }
  }
  return $text;
}

?>
