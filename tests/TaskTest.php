<?php
declare (strict_types =1);
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use PHPUnit\Framework\TestCase;
/**
 * Description of TaskTest
 *
 * @author Lucas
 */
class TaskTest extends TestCase
  {
    private $CI;
    public function setUp()
    {
      // Load CI instance normally
      $this->CI = &get_instance();
      $this->Task = new Task_entity();
    }
    public function testAgeSetter()
    {
                $expected = 27;
                $this->Task->age = $expected;
                $this->assertEquals($expected,$this->Task->age);
    }
  }