<html lang="en-GB">
<head>
    <title>Arkham Horror LCG Collection Manager</title>
    <script src="https://kit.fontawesome.com/0607049395.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="normalize.css">
    <link rel="stylesheet" type="text/css" href="main_stylesheet.css">
</head>


<body>
<header class="banner">
    <h1 class="mainHeading"> Arkham Campaign Manager</h1>
    <div class="navBar">
        <a href="collection_campaign.php" class="addButton">Add a Custom Campaign</a>
    </div>
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

    return $cycleArray;
}

function getScenarioNames($cycleArray)
{
    echo "<div class='flexContainer'>";
    foreach ($cycleArray as $cycle) {
        echo "<div class='box'><h2>$cycle</h2>";
        $db = new PDO('mysql:host=db; dbname=arkham_lcg_scenarios', 'root', 'password');
        $query = "SELECT *  FROM `scenarios` WHERE `cycle` = :cycle ORDER BY `position`;";
        $campaign = $db->prepare($query);
        $params = [':cycle' => $cycle];
        $campaign->setFetchMode(PDO::FETCH_ASSOC);
        $campaign->execute($params);

        $results = $campaign->fetchAll();
        foreach ($results as $scenario) {
            echo "<div class='scenarioContainer'><h3>  " . $scenario['name'] . "</h3>";

            if (isset($scenario['owned'])) {
                echo "<div class='scenarioContent'>Owned</div>";
            }

            if (!isset($scenario['owned'])) {
                echo "<div class='scenarioContentNull'>Not Owned</div>";
            }

            if (isset($scenario['completed'])) {
                echo "<div class='scenarioContent'>Played</div>";
            }
            if (!isset($scenario['completed'])) {
                echo "<div class='scenarioContentNull'>Not Played</div>";
            }

            echo "</div>";
        }
        echo "</div>";
//
    }

    echo "</div>";
}

$cycleArray = getCampaignNames();
getScenarioNames($cycleArray);
?>
<a href="collection_campaign.php" class="addButton">Add a Custom Campaign</a>
</body>

</html>
