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
    $queryString = "SELECT * FROM `scenarios`;";
    $query = $db->prepare($queryString);
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $query->execute();
    $bigArray = $query->fetchAll();
    return $bigArray;
}


function printResults(array $bigArray, array $cycleArray)
{
    $output = '<div class="flexContainer">';

    foreach ($cycleArray as $cycle) {
        $output .= "<div class='box'><h2>$cycle</h2>";
        foreach ($bigArray as $scenario) {
            if ($scenario['standalone'] === "1") {
                $scenarioName = $scenario['name'];
                $output .= "<div class='scenarioContainer'><h3>" . $scenarioName . "</h3>";

                if (isset($scenario['owned'])) {
                    $output .= '<div class="scenarioContent">Owned</div>';
                } else {
                    $output .= '<div class="scenarioContentNull">Not Owned</div>';
                }

                if (isset($scenario['completed'])) {
                    $output .= '<div class="scenarioContent">Played</div>';
                } else {
                    $output .= '<div class="scenarioContentNull">Not Played</div>';
                }

                $output .= '</div>';
            } else if ($scenario['cycle'] === $cycle) {
                $scenarioName = $scenario['name'];
                $output .= "<div class='scenarioContainer'><h3>  " . $scenario['position'] . ". " . $scenarioName . "</h3>";

                if (isset($scenario['owned'])) {
                    $output .= '<div class="scenarioContent">Owned</div>';
                } else {
                    $output .= '<div class="scenarioContentNull">Not Owned</div>';
                }

                if (isset($scenario['completed'])) {
                    $output .= '<div class="scenarioContent">Played</div>';
                } else {
                    $output .= '<div class="scenarioContentNull">Not Played</div>';
                }

                $output .= '</div>';
            }

        }

        $output .= '</div>';
    }
    $output .= '</div>';
    return $output;
}

