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
        $hugeFakeArray= [['name' => 'first fake', 'cycle'=> 'first Camp', 'completed'=> NULL, 'owned'=>NULL, 'position'=>1],['position'=>2,'name' => 'other fake', 'cycle'=> 'second Camp', 'completed'=> True, 'owned'=>NULL]];
        $actualOutput = printResults($hugeFakeArray, $smallArray);
        $expectedOutput="<div class=\"flexContainer\"><div class='box'><h2>first Camp</h2><div class='scenarioContainer'><h3>  1. first fake</h3><form action='collection_main.php' method='post'><button class='scenarioContentNull' type='submit' name='scenarioToOwn' value='first fake'>Not Owned</button></form><form action='collection_main.php' method='post'><button class='scenarioContentNull' type='submit' name='scenarioToPlayed' value='first fake'>Not Played</button></form></div></div><div class='box'><h2>second Camp</h2><div class='scenarioContainer'><h3>  2. other fake</h3><form action='collection_main.php' method='post'><button class='scenarioContentNull' type='submit' name='scenarioToOwn' value='other fake'>Not Owned</button></form><form action='collection_main.php' method='post'><button class='scenarioContent' type='submit' name='scenarioToNotPlayed' value='other fake'>Played</button></form></div></div></div>";
        $this->assertEquals($expectedOutput,$actualOutput);
    }


}