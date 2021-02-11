<?php
require('collection_functions.php');

$db = new PDO('mysql:host=db; dbname=arkham_lcg_scenarios', 'root', 'password');


$cycleArray = getCampaignNames($db);
$bigArray = getScenarios($db);
$printOut = printResults($bigArray, $cycleArray);

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
if (isset($_POST['scenarioToNotOwn'])){
    $toNotOwn = $_POST['scenarioToNotOwn'];
    header("Refresh:0");
    scenerioToNotOwn($db,$toNotOwn);
}
var_dump($_POST);

?>

</body>

</html>