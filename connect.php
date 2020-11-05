<?php

function connect() {
  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
  header("Content-Type: application/json; charset=uTF-8");
  $servername = "localhost";
  $username = "root";
  $password = "";
  try {
      $conn = new PDO("mysql:host=$servername;dbname=angularjs_DB", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //echo "Connected successfully";
      return $conn;
      /*$result = $conn->query("SELECT CompanyName , City , Country FROM Customers");
      $outp ="";
      while($rs = $result->fetch()) {
          if($outp !="") {
              $outp .= ",";
          }
          $outp .= '{"Name" : "' .$rs["CompanyName"] . '",';
          $outp .= '"City" : "' .$rs["City"] . '",';
          $outp .= '"Country" : "' .$rs["Country"] . '"}';
      }
      $outp = '{"records" : ['.$outp.']}';
      echo ($outp);
      */
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }
  //connect();

?>