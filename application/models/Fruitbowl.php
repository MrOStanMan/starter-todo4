<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Fruitbowl
 *
 * @author andraavram
 */
class Fruitbowl extends Memory_Model {
    //put your code here
    
    function add($record) {
        
        if($this->size() <6){
            parent::add($record);
        }
        
        if ($this->size() >= 6)
            throw new Exception('The fruit bowl is full');
    }
}
