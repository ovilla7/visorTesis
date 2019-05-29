<?php
function DebXML($path){
  $fp = fopen($path, "r");
  $final = "";
  while (!feof($fp)) {
    $linea = fgets($fp);
    //$aux = preg_replace('-<(/){0,1}html:i>-','*',$linea);
    $aux = preg_replace('-html:-','',$linea);
    //$aux = preg_replace('(<html:i>)','<i>',$linea);
    //$aux = preg_replace('(</html:i>)','</i>',$aux);
    $aux = preg_replace('-xml:id-','id',$aux);
    $aux = preg_replace('-xlink:-','',$aux);
    $final .= preg_replace('-<html:br/>-','',$aux);
  }
  //echo $final;
  return $final;
}
?>
