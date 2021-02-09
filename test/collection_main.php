<?php

require '../collection_main.php';

use PHPUnit\Framework\TestCase;


$db = new PDO('mysql:host=db; dbname=arkham_lcg_scenarios', 'root', 'password');
class Collection_main extends TestCase
{


    public function test_getting_campaign_names_malformed()
    {
        $db = new PDO('mysql:host=db; dbname=arkham_lcg_scenarios', 'root', 'password');
        $campaigns = $db->prepare("SELECT DISTINCT `cycle` FROM `scenarios`;");
        $campaigns->setFetchMode(PDO::FETCH_ASSOC);
        $campaigns->execute();
        $results = $campaigns->fetchAll();
        $input = 16.1;
        $this->expectException(TypeError::ArgumentCountError);

        $result = getCampaignNames($input);
    }
}



