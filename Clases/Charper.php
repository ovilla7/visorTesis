<?php
  function Seccion($seccion, $nivel){
    $texto = "";
    foreach ($seccion as $tipe) {
      switch ((string)$tipe->getName()) {
        case 'h':
          $texto .= hcc($tipe, $nivel);
          break;
        case 'p':
          $texto .= pc($tipe);
          break;
        case 'list':
          $texto .= lst($tipe);
          break;
        case 'quote':
            $texto .= qte($tipe);
            break;
        case 'section':
          $texto .= Seccion($tipe, $nivel+1);
          break;
        case 'verse':
          $texto .= verse($tipe);
          break;
        case 'table':
          $texto .= tablec($tipe);
          break;
        case 'caption':
          $texto .= caption($tipe);
          break;
        default:
          // code...
          break;
      }
      /*
      if ((string)$tipe->getName() == "h"){
        $texto .= hc($tipe, $nivel."#");
      }elseif ((string)$tipe->getName() == "p"){
          $texto .= p($tipe);
      }elseif ((string)$tipe->getName() == "section"){
          $texto .= Seccion($tipe, $nivel."#");
      }*/
    }
    return $texto;
  }
?>
