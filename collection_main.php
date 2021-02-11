<?php
require('collection_functions.php');

$db = new PDO('mysql:host=db; dbname=arkham_lcg_scenarios', 'root', 'password');


$cycleArray = getCampaignNames($db);
$bigArray = getScenarios($db);
$printOut = printResults($bigArray, $cycleArray);


if (isset($_POST['scenarioToNotOwn'])){
    $toNotOwn = $_POST['scenarioToNotOwn'];
    scenarioToNotOwn($db,$toNotOwn);
}

if (isset($_POST['scenarioToOwn'])){
    $toOwn = $_POST['scenarioToOwn'];
    scenarioToOwn($db,$toOwn);
}

if (isset($_POST['scenarioToNotPlayed'])){
    $toNotPlayed = $_POST['scenarioToNotPlayed'];
    scenarioToNotPlayed($db,$toNotPlayed);
}

if (isset($_POST['scenarioToPlayed'])){
    $toPlayed = $_POST['scenarioToPlayed'];
    scenarioToPlayed($db,$toPlayed);
}



?>
<html lang="en-GB">
<head>
    <title>Arkham Horror LCG Collection Manager</title>
    <script src="https://kit.fontawesome.com/0607049395.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="normalize.css">
    <link rel="stylesheet" type="text/css" href="main_stylesheet.css">
</head>


<body>
<header>
    <h1 class="mainHeading"> Arkham Campaign Manager</h1>
</header>


<?php

echo $printOut;

?>

</body>

</html>