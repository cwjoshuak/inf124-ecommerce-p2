<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />

    <title>eCrocs | Order Confirmation</title>
    <meta
      name="description"
      content="A site for INF 124 ecommerce project - selling eCrocs"
    />
    <meta name="author" content="Garry Fanata, Joshua Kuan" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      href="http://db.onlinewebfonts.com/c/158a997f8a01e5bd6f96844ae5739add?family=AG+Book+Rounded"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/styles.css?v=1.0" />
  </head>
  <body class="products" style="margin: 0;">
    <div>
      <div class="logo">
        <a href="./index.html">ecrocs</a>
      </div>
    </div>
<?php
    $query = $_SERVER['QUERY_STRING'];
    $param = explode('=', $query);
    ${urldecode($param[0])} = urldecode($param[1]);

    $con = mysqli_connect("127.0.0.1",'root','rxpost123', 'ecrocs');
    if(!$con){
        echo 'Error connecting to server';
    }
    $sql = "SELECT * FROM `transactions` JOIN `shoes` on shoes.id=transactions.shoe_id where transactions.id = $id LIMIT 1";
    $results = array();


    if ($raw_results = mysqli_query($con, $sql)) {
        $row = mysqli_fetch_assoc($raw_results);
        // echo $row["id"];

        echo "<div class='order-confirmation'>";
        echo "<h1>Order Confirmation</h1>";

        echo "<h2>{$row["name"]}</h2>";
        echo "<img src='./assets/{$row['shoe_id']}/product_0.jpg'>";

        echo "<br/>";
        echo "Quantity: {$row['quantity']}<br/>";
        echo "Size: {$row['shoe_size']}";
        echo "<div class='billing-info'>";
        echo "<h3>Billing Information</h3>";
        echo "{$row['billing_full_name']}<br/>";
        echo "{$row['billing_addr_1']}<br/>";
        echo "{$row['billing_city']}<br/>";
        echo "{$row['billing_state']}, {$row['billing_zip']}<br/>";
        echo "</div>";
        $cc_num = substr($row['payment_card'], -4);
        $exp_mo = str_pad($row['payment_exp_month'], 2, "0", STR_PAD_LEFT);
        echo "<div class='payment-info'>";
        echo "<h3>Payment Information</h3>";
        echo "Name on Card: {$row['payment_name']} <br/>";
        echo "Credit Card Number: **** **** **** {$cc_num} <br/>";
        echo "Credit Card Expiry: {$exp_mo}/{$row['payment_exp_year']}";
        echo "</div>";
    }


?>


  </body>
</html>