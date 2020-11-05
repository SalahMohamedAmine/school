<?php

include "connect.php";
function getAllCustomers() {
    $conn=connect();
    $requete="SELECT CompanyName , City , Country FROM Customers";
    $result = $conn->query($requete);
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
}

function insertCustomer($customer) {
    $conn=connect();
    $requete  = "INSERT INTO customers VALUES (NULL, $customer.name , $customer.city , $customer.country)";
    $response =  $conn->query($requete);
    $response->execute([$customer]);
    if($response->rowCount() !=1)
        die("<p>Impossible d'effectuer la requete</p>");
    else 
        echo "customer a été ajoute aves succés";

}

getAllCustomers();


?>