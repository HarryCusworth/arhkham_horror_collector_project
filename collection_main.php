<html lang="en-GB">
<head>
    <title>Arkham Horror LCG Collection Manager</title>
    <script src="https://kit.fontawesome.com/0607049395.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="normalize.css">
    <link rel="stylesheet" type="text/css" href="main_stylesheet.css">
</head>


<body>
<header class="banner">
    <a class="addButton" href="addCampaign.php"> Add new Campaign</a>
    <div class="mainHeading"> Arkham Campaign Manager</div>
</header>

<?php


function getCampaignNames()
{
    $db = new PDO('mysql:host=db; dbname=arkham_lcg_scenarios', 'root', 'password');
    $campaigns = $db->prepare("SELECT DISTINCT `cycle` FROM `scenarios`;");
    $campaigns->setFetchMode(PDO::FETCH_ASSOC);
    $campaigns->execute();
    $cycleArray = array();
    $results = $campaigns->fetchAll();
    foreach ($results as $cycleName) {
        array_push($cycleArray, $cycleName["cycle"]);
    }
//    var_dump($cycleArray);
    return $cycleArray;
}

function getScenarioNames($cycleArray)
{
    echo "<div class='flexContainer'>";
    foreach ($cycleArray as $cycle) {
        echo "<div class='box'><h2>$cycle</h2><br>";
        $db = new PDO('mysql:host=db; dbname=arkham_lcg_scenarios', 'root', 'password');
        $query = "SELECT *  FROM `scenarios` WHERE `cycle` = :cycle ORDER BY `position`;";
        $campaign = $db->prepare($query);
        $params = [':cycle' => $cycle];
        $campaign->setFetchMode(PDO::FETCH_ASSOC);
        $campaign->execute($params);

        $results = $campaign->fetchAll();
        foreach ($results as $scenario) {
            echo "<h3>" . $scenario['name'] . "</h3><br>";

            if (isset($scenario['completed'])) {
                echo "completed<br>";
            }
            if (isset($scenario['owned'])) {
                echo "owned<br>";
            }
        }
        echo "</div>";
//
    }

    echo "</div>";
}

$cycleArray = getCampaignNames();
echo getScenarioNames($cycleArray);
?>

</body>

</html>
