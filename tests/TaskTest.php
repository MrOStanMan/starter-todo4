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
    private $Task;
    public function setUp()
    {
      // Load CI instance normally
      $this->CI = &get_instance();
      $this->CI->load->model('task_entity');
      $this->Task = new Task_entity();
    }
 
    public function testInvalidPriority() {
     $this->expectException('InvalidArgumentException');
     $this->Task->priority = null;
    }
    
    public function testPriority() {
        $this->Task->priority = 2;
        $this->assertEquals(2, $this->Task->priority);
    }
    
    public function testInvalidTask(){
        $this->expectException('InvalidArgumentException');
        $this->Task->task = null;
    }
    
    public function testTask(){
        $this->Task->task = 'Cleaning';
        $this->assertEquals('Cleaning', $this->Task->task);
        
        
    }
         
  }