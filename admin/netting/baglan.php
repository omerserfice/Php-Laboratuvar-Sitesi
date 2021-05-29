<?php 
   
   try {

   	  $baglan = new PDO("mysql:host=localhost;dbname=laboratuvardb;charset=utf8","root","");

   	//  echo "basarılı";
    	
    } catch (PDOException $e) {
    	
    	echo  $e->getMessage();


    } 



 ?>