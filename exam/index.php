<?php
  if(isset($_COOKIE["date_des_visites"])){

    $visites = $_COOKIE["date_des_visites"];
    $dates=unserialize($_COOKIE["date_des_visites"]);
    setcookie("date_des_visites", serialize($dates), mktime(0,0,0,03,26,2020));
    echo "Nombre de consultation de la page: ".count($dates).". Détails : ";
    echo "<ul>";
    foreach ($dates as $key => $value) {
        echo "<li>".date("d-m-Y H:i:s",$value)."</li>";
    }
    echo "</ul>";
  }else{
    $dates[]=time();
    setcookie("date_des_visites", serialize($dates), mktime(0,0,0,03,26,2020));
    echo "C'est votre première visite: ".date("d-m-Y H:i:s",time());
  }
 ?>
