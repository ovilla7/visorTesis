<?php

  function SectionFrontmatter($seccion, $Parsedown){
    switch ($seccion['role']) {
      case 'cover':
        echo "<div class=portada align=center>";
        echo Cover($seccion);
        echo "<br></div>";
        break;
      case 'abstract':
        echo "<div class=resumen align=justify>";
        echo Abstrct($seccion);
        echo "<br></div>";
        break;
      default:
        echo "<div class=resumen align=justify>";
        echo Seccion($seccion, 1);
        echo "<br></div>";
        break;
    }
  }

  function Cover($seccion){
    $texto = '';
    foreach ($seccion->p as $elemento) {
      $texto .= "<h2>".pc($elemento)."</h2>";
    }
    return $texto;
  }

  function Abstrct($seccion){
    $texto = '';
    #echo $seccion->h->emph;
    foreach ($seccion as $elemento) {
      if((string)$elemento->getName() == "h"){
        $texto .= hcc($elemento, 1);
      }elseif ((string)$elemento->getName() == "p") {
        $texto .= pc($elemento);
      }
    }
    return $texto;
  }

  function Tc($seccion){
    $texto = "";
    foreach ($seccion as $tipe) {
      switch ((string)$tipe->getName()) {
        case 'h':
          $texto .= h($tipe);
          break;
        case 'entry':
          $texto .= Indx($tipe);
          break;
        default:
          // code...
          break;
      }
    }
    return $texto;
  }
  function Indx($value){
    if($value->emph){
      return "- [".$value->emph."](#".ForInt($value->emph).")\n";
    }
    #return "- ".$value."\n\n";
    return "- [".$value."](#".ForInt($value).")\n";
  }
?>
