
<?php

function afficherDate($lang){
    
    $date = getDate();
   
    $jours = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
    $mois = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    
    if ($lang == "FR") {
        $jours = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
        $mois = array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
    } elseif ($lang == "AR") { 
        $jours = array("الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة", "السبت");
        $mois = array("يناير", "فبراير", "مارس", "أبريل", "مايو", "يونيو", "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر");
    }
    
    echo $jours[$date['wday']] . " " . $date['mday'] . " " . $mois[$date['mon'] - 1] . " " . $date['year'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<title>BOUNOUARA Ghita</title>
	 <link rel ="stylesheet" href="Publics/style.css" >
</head>

<header>
    <div >
        <div id="top">
            <h4> <span id="police">SMI S6</span> <br> <span style="font-weight: normal;">Faculté des Sciences Dhar El Mahraz Fes</span> </h4>
        </div>
        <div id="div_img"> 
            <img src="Publics/logo.jpeg">
            <h5> <?= afficherDate("FR")?> </h5>
        </div>   
    </div>
    <hr style="background-color: brown; height:2px ; margin-top : 10px" >
</header>