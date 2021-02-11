<?php


function getCampaignNames($db)
{
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

function getScenarios($db)
{
    $queryString = "SELECT * FROM `scenarios` ORDER BY `position`;";
    $query = $db->prepare($queryString);
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $query->execute();
    $bigArray = $query->fetchAll();
    return $bigArray;
}

function scenarioToNotOwn($db,$toNotOwn)
{
    $insertToNotOwn = $db->prepare("UPDATE scenarios SET owned = 0 WHERE `name` =:toNotOwn;");
    $insertToNotOwn -> bindParam(':toNotOwn', $toNotOwn);
    $insertToNotOwn ->execute();
    header("Refresh:0");
}

function scenarioToOwn($db,$toOwn)
{
    $insertToOwn = $db->prepare("UPDATE scenarios SET owned = 1 WHERE `name` =:toOwn;");
    $insertToOwn -> bindParam(':toOwn', $toOwn);
    $insertToOwn ->execute();
    header("Refresh:0");
}

function scenarioToNotPlayed($db,$toNotPlayed)
{
    $insertToNotPlayed = $db->prepare("UPDATE scenarios SET completed = 0 WHERE `name` =:toNotPlayed;");
    $insertToNotPlayed -> bindParam(':toNotPlayed', $toNotPlayed);
    $insertToNotPlayed ->execute();
    header("Refresh:0");
}

function scenarioToPlayed($db,$toPlayed)
{
    $insertToPlayed = $db->prepare("UPDATE scenarios SET completed = 1 WHERE `name` =:toPlayed;");
    $insertToPlayed -> bindParam(':toPlayed', $toPlayed);
    $insertToPlayed ->execute();
    header("Refresh:0");
}

function printResults(array $bigArray, array $cycleArray)
{
    $output = '<div class="flexContainer">';

    foreach ($cycleArray as $cycle) {
        $output .= "<div class='box'><h2>$cycle</h2>";
        foreach ($bigArray as $scenario) {
            if ($scenario['cycle'] === $cycle) {
                $scenarioName = $scenario['name'];
                $scenarioOwned = $scenario['owned'];
                $scenarioCompleted = $scenario['completed'];
                if (isset($scenario['position'])) {
                    $scenarioPosition = $scenario['position'].". ";

                } else $scenarioPosition = $scenario['position'];

                $output .= "<div class='scenarioContainer'><h3>  " . $scenarioPosition  . $scenarioName . "</h3>";

                if ($scenarioOwned === '1') {

                    $output .= "<form action='collection_main.php' method='post'><button class='scenarioContent' type='submit' name='scenarioToNotOwn' value='$scenarioName'>Owned</button></form>";
                } else {

                    $output .= "<form action='collection_main.php' method='post'><button class='scenarioContentNull' type='submit' name='scenarioToOwn' value='$scenarioName'>Not Owned</button></form>";
                }

                if ($scenarioCompleted == 1) {
                    $output .= "<form action='collection_main.php' method='post'><button class='scenarioContent' type='submit' name='scenarioToNotPlayed' value='$scenarioName'>Played</button></form>";
                } else {
                    $output .= "<form action='collection_main.php' method='post'><button class='scenarioContentNull' type='submit' name='scenarioToPlayed' value='$scenarioName'>Not Played</button></form>";
                }

                $output .= '</div>';
            }

        }

        $output .= '</div>';
    }
    $output .= '</div>';
    return $output;
}



