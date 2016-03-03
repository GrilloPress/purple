<?php

  if(isset( $_POST["customerName"]))
  {
     print "Welcome " . htmlspecialchars($_POST['customerName']) . "<br />";
    $user_name = htmlspecialchars($_POST['customerName']);
     $json_output = json_encode(array('type'=>'message', 'text' => 'Hi '.$user_name .' Thank you for your email'));
    print $json_output;
     exit();
  }
