<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of toDoEntity
 *
 * @author Lucas
 */
class Task_entity extends Entity {
    //put your code here
    private $task;
    private $priority;
    private $size;
    private $group;
    private $status;
    //Create Setters for Form fields 

  public function setTask($task) {
        
        if (empty($task))
        {
            throw new InvalidArgumentException('Cannot be empty.');
        }
        $this->task = $task;
    }

   public function setPriority($priority) {
        
         if (empty($priority))
        {
            throw new InvalidArgumentException('Cannot be empty.');
        }
        $this->priority = $priority;
    }

  public  function setSize($size) {
        
        if (empty($size))
        {
            throw new InvalidArgumentException('Cannot be empty.');
        }
        
        $this->size = $size;
    }

   public function setGroup($group) {
        
        if (empty($group))
        {
            throw new InvalidArgumentException('Cannot be empty.');
        }
        $this->group = $group;
    }

   public function setStatus($status) {
        
        if (empty($status))
        {
            throw new InvalidArgumentException('Cannot be empty.');
        }
        $this->status = $status;
    }

        
    public function __get($key) {
        return $this->$key;
    }
    
}
