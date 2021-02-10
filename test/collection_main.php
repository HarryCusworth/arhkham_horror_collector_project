<?php

require '../collection_main.php';

use PHPUnit\Framework\TestCase;

class Collection_main extends TestCase
{
//testing the first function that is supposed to return an ordered array of the cycle names

    public function test_getting_campaign_names_malformed()
    {
        $db = new PDO('mysql:host=db; dbname=arkham_lcg_scenarios', 'root', 'password');
        $input = 16.1;
        $this->expectException(TypeError::ArgumentCountError);
        getCampaignNames($db,$input);
    }

    public function test_getting_campaign_names_is_array(){
        $db = new PDO('mysql:host=db; dbname=arkham_lcg_scenarios', 'root', 'password');
        $actualOutput = is_array(getCampaignNames($db));
        $expectedOutput = true;
            $this->assertEquals($actualOutput,$expectedOutput);
    }

//testing the second function that returns the data from the database

    public function test_getting_scenario_names_malformed(){
        $db = new PDO('mysql:host=db; dbname=arkham_lcg_scenarios', 'root', 'password');
        $badInput= "arkham horror sucks";
        $this->expectException(TypeError::class);
        $result = getScenarioNames($badInput,$db);

    }

    public function test_getting_scenario_names_match_db(){
        $db = new PDO('mysql:host=db; dbname=arkham_lcg_scenarios', 'root', 'password');
        $cycleArray = [0 => "Night of the Zealot"];
        $resultsFromFunction = getScenarioNames($cycleArray,$db);
        $firstRow=$resultsFromFunction[0];
        $expectedCol=['id','name','cycle','position','standalone','owned','completed','product'];
        $actualCol = array_keys($firstRow);
        $this->assertEquals($expectedCol,$actualCol);
    }
}



