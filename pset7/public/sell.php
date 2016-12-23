<?php

    // configuration
    require("../includes/config.php"); 
   if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $t = lookup($_POST["symbol"]);
 $symbol = $t["price"];
 $result = CS50::query("SELECT shares FROM portfolio WHERE userid = ? AND symbol = ?", $_SESSION["id"], $_POST["symbol"]);
$shares= $result[0]['shares'];
 $costs =(float)$shares*$symbol;
		CS50::query("DELETE FROM portfolio WHERE userid = ? AND symbol = ?",$_SESSION["id"], $_POST["symbol"]);
            
 
 //$stack=CS50:: query("INSERT INTO history (id, symbol, shares, transaction) VALUES(?, ?, ?, ?)",$_SESSION["id"], strtoupper($_POST['symbols']), $totals["share"], "SELL");  

 //dump($result,$symbol,$shares,$costs);
    

 //  dump($shares, $symbol, $costs);
  CS50::query("UPDATE users SET cash = cash + ? WHERE id = ?", $costs, $_SESSION["id"]);
 
// print("cost ".$costs);
        
   redirect("index.php");
    }
 else
 {
     
     
       $rows=CS50::query("SELECT symbol from portfolio WHERE userid= ?",$_SESSION["id"]);
 $stocks = [];
        // for each of user's stocks
        foreach ($rows as $row)	
        {   
            // save stock symbol
            $stock = $row["symbol"];
            
            $stocks[] = $stock;       
        }  
      render("sell_form.php", ["stocks" => $stocks]);
 }

?>