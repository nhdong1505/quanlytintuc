<?php 
  // require 'cate.php';
   require '/models/Category.php';
   /**
   * 
   */
   class cate_test extends PHPUnit_Framework_TestCase
   {
   	public $test;
   	public function setUp(){
            $this->test= new Category(13);
        }
        public function testID(){
            $name=$this->test->getId();
            $this->assertTrue($name==13);
        }
   }
?>