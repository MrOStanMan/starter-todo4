<?php

use PHPUnit\Framework\TestCase;

/*
 * 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FruitbowlTest
 *
 * @author andraavram
 */
class FruitbowlTest extends TestCase{
    //put your code here
    
    function setUp() {
    $this->CI = &get_instance();
    $this->CI->load->model('fruitbowl');
    $this->CI->load->model('fruit');
    $this->bowl = new Fruitbowl();
    }
    
    function testSizeLimit()
    {
        // add 6 fruits
        for ($i = 1; $i < 7; $i++ )
        {
            $fruit = new Fruit();
            $fruit->setId($i);
            $this->bowl->add($fruit);
            echo '.';
        }
        echo 'end';
        // make sure we're there
        $this->assertEquals(6,$this->bowl->size());
        // make sure we can't add a 7th
        $fruit = new Fruit();
        $fruit->id = 7;
        $this->expectException(Exception::class);
        $this->bowl->add($fruit);
    }
    
}
