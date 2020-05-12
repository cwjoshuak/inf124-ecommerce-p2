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
  <body class="confirmation-bg" style="margin: 0;">
    <div>
      <div class="confirmationheader">
      <div class="logo">
        <a href="./index.html">ecrocs</a>
        </div>
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
    $sql = "SELECT * FROM `transactions` JOIN shoes on shoes.id=transactions.shoe_id JOIN shoe_colors on shoe_colors.color_name=transactions.color_name where transactions.id = $id LIMIT 1";
    $results = array();


    if ($raw_results = mysqli_query($con, $sql)) {
        $row = mysqli_fetch_assoc($raw_results);
        // echo $row["id"];

        echo "<div class='confirmation'>";
        echo "<div class='confirmation-left'>";
        echo "<h1>Order Confirmation</h1>";
        echo "<h2>Order Number: #{$id}</h2>";
        echo "<h3>{$row["name"]}</h3>";
        echo "<img src='./assets/{$row['shoe_id']}/{$row['file_name']}.jpg'>";

        $total = ($row['base_price'] + $row['state_tax']) * $row['quantity'];
        $total2 = number_format($total,2);

        echo "<br/><h5>";
        echo "<b>Size:</b> {$row['shoe_size']} <b>Color:</b> {$row['color_name']}<br/>";
        echo "<b>Quantity:</b> {$row['quantity']}<br/>";
        echo "<b>Price:</b> \${$row['base_price']}<br/>";
        echo "<b>Tax:</b> \${$row['state_tax']}<br/><br/>";
        echo "<b>Total Price:</b> \${$total2}<br/>";
        echo "</h5></div>";

        echo "<div class='confirmation-right'>";
        echo "<h3>Billing Information</h3><h5>";
        echo "{$row['billing_full_name']}<br/>";
        echo "{$row['billing_addr_1']}<br/>";
        echo "{$row['billing_city']}<br/>";
        echo "{$row['billing_state']}, {$row['billing_zip']}</h5><br/>";
        
        $cc_num = substr($row['payment_card'], -4);
        $exp_mo = str_pad($row['payment_exp_month'], 2, "0", STR_PAD_LEFT);
        echo "<div class='payment-info'>";
        echo "<br/><br/><br/><h3>Payment Information</h3><h5>";
        echo "<b>Name:</b> {$row['payment_name']} <br/>";
        echo "<b>Credit Card Number:</b> **** **** **** {$cc_num} <br/>";
        echo "<b>Credit Card Expiry:</b> {$exp_mo}/{$row['payment_exp_year']}</h5>";
        echo "</div>";
        echo "</div>";
    }


?>


  </body>
</html>