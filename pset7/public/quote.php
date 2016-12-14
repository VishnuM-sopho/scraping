<?php
require("../includes/config.php"); 
//render("header.php");

 if ($_SERVER["REQUEST_METHOD"] == "GET")
    {render("quote_form.php", ["title" => "Quote"]);}
   else if ($_SERVER["REQUEST_METHOD"] == "POST")
    { 
$stock = lookup($_POST["symbol"]);
if($stock == false )
{apologize("Symbol not found");}

}
//$t=$stock;

render("quote_price.php", ["stock" => $stock]);
 /*$val=number_format($stock["price"],2,'.', '');
print("A Share of " . $stock["name"]);
print("(" . $stock["symbol"] );
print(") costs $" .$val);*/
?>