<?php

$db = new PDO('mysql:host=db; dbname=arkham_lcg_scenarios', 'root', 'password');

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

function getScenariosSimple($db)
{
    $query = "SELECT * FROM `scenarios`;";
    $results = $db->prepare($query);
    $results->setFetchMode(PDO::FETCH_ASSOC);
    $results->execute();
    $bigArray = $results->fetchAll();
    return $bigArray;
}


function printResults(array $bigArray, array $cycleArray)
{
    $feedBack = "<div class='flexContainer'>";

    foreach ($cycleArray as $cycle) {
        $feedBack .= "<div class='box'><h2>$cycle</h2>";
        foreach ($bigArray as $scenario) {
            if ($scenario['cycle'] === $cycle) {
                $feedBack .= "<div class='scenarioContainer'><h3>  " . $scenario['name'] . "</h3>";

                if (isset($scenario['owned'])) {
                    $feedBack .= "<div class='scenarioContent'>Owned</div>";
                }

                if (!isset($scenario['owned'])) {
                    $feedBack .= "<div class='scenarioContentNull'>Not Owned</div>";
                }

                if (isset($scenario['completed'])) {
                    $feedBack .= "<div class='scenarioContent'>Played</div>";
                }
                if (!isset($scenario['completed'])) {
                    $feedBack .= "<div class='scenarioContentNull'>Not Played</div>";
                }

                $feedBack .= "</div>";
            }

        }

        $feedBack .= "</div>";
    }
    $feedBack .= "</div>";
    return $feedBack;
}
