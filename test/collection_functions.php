<?php

require '../collection_functions.php';

use PHPUnit\Framework\TestCase;

class Collection_main extends TestCase
{

    public function test_feedback_malformed()
    {
        $inputOne = 16.1;
        $inputTwo = "twisted";
        $this->expectException(TypeError::class);
        printResults($inputOne,$inputTwo);
    }











}