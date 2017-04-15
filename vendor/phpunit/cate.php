<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cate
 *
 * @author HongDong
 */
class cate {
    //put your code here
    public $id;
    function __construct($id) {
        $this->id = $id;
    }
    function getId() {
        return $this->id;
    }


}
