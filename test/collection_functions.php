<?php

require '../collection_functions.php';

use PHPUnit\Framework\TestCase;

class Collection_functions extends TestCase
{

    public function test_print_results_malformed()
    {
        $inputOne = 16.1;
        $inputTwo = "twisted";
        $this->expectException(TypeError::class);
        printResults($inputOne,$inputTwo);
    }
    public function test_print_results_success()
    {
        $smallArray = ["first Camp", "second Camp"];
        $hugeFakeArray= [['name' => 'first fake', 'cycle'=> 'first Camp', 'completed'=> NULL, 'owned'=>NULL],['name' => 'other fake', 'cycle'=> 'second Camp', 'completed'=> True, 'owned'=>NULL]];
        $actualOutput = printResults($hugeFakeArray, $smallArray);
        $expectedOutput="<div class=\"flexContainer\"><div class='box'><h2>first Camp</h2><div class='scenarioContainer'><h3>  first fake</h3><div class=\"scenarioContentNull\">Not Owned</div><div class=\"scenarioContentNull\">Not Played</div></div></div><div class='box'><h2>second Camp</h2><div class='scenarioContainer'><h3>  other fake</h3><div class=\"scenarioContentNull\">Not Owned</div><div class=\"scenarioContent\">Played</div></div></div></div>";
        $this->assertEquals($expectedOutput,$actualOutput);
    }


}