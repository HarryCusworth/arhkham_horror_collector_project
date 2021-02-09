<?php

require '../collection_main.php';

use PHPUnit\Framework\TestCase;

class Collection_main extends TestCase
{


    public function test_getting_campaign_names_malformed()
    {
        $input = 16.1;
        $this->expectException(TypeError::PDOException);

        $result = getCampaignNames($input);
    }
}



php