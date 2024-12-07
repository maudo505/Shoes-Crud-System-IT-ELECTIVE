<?php
  $servername="localhost";
  $username="root";
  $password="";
  $dbname="data";


  $conn=new mysqli($servername,$username,$password,$dbname);
  if($conn->connect_error){
  	die("connect filed".$conn->connect_error);
  }

?>