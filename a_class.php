<?php

  $x = new Person();
  $x -> name = "Andrew";

  echo "Hi i am {$x -> name}" . "<br />";
  echo $x -> say_my_name();

  class Person {
    
    public $name;
    
    function say_my_name() {
      
      return $this -> name;
      
    }
    
  }

?>