<?php

/*
  if(isset( $_POST["customerName"]))
  {
     print "Welcome " . htmlspecialchars($_POST['customerName']) . "<br />";
    $user_name = htmlspecialchars($_POST['customerName']);
     $json_output = json_encode(array('type'=>'message', 'text' => 'Hi '.$user_name .' Thank you for your email'));
    print $json_output;
    exit();
  }

*/

$customerName = $jobTitle = $customerCompany = $phoneNumber = $customerEmail = $servicesRequired = $customerMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  $customerName = validate_data($_POST["customerName"]);
  $jobTitle = validate_data($_POST["jobTitle"]);
  $customerCompany = validate_data($_POST["customerCompany"]);
  $phoneNumber = validate_data($_POST["phoneNumber"]);
  $customerEmail = validate_data($_POST["customerEmail"]);
  $servicesRequired = validate_data($_POST["servicesRequired"]);
  $customerMessage = validate_data($_POST["customerMessage"]);
  
  $json_output = json_encode(array('type'=>'message', 'text' => 'Hi '. $customerName .' you said:' . $customerMessage));
  print $json_output;
  exit();
  
  }

function validate_data($data) {
  
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  
}