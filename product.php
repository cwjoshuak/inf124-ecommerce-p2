<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />

    <title>eCrocs | Products</title>
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
    <link rel="stylesheet" href="css/styles.css?v=1.0" />
  </head>
  <body style="margin: 0;">
    <div class="productheader">
      <div class="logo">
        <a href="./products.html">ecrocs</a>
      </div>
    </div>
<?php
      //get url parameters
        $currURL = $_SERVER['REQUEST_URI'];
        $currURL = substr($currURL, 13);
        foreach (explode('&', $currURL) as $chunk) {
          $param = explode("=", $chunk);
          if ($param) {
            ${urldecode($param[0])} = urldecode($param[1]);
          }
          // echo $id;
          // echo $color;
      }

      //sql fetches
      $con = mysqli_connect("127.0.0.1",'root','rxpost123', 'ecrocs');
      if(!$con){
        echo 'Error connecting to server';
      }
      $shoes_sql_query = "SELECT * FROM shoes WHERE id={$id}";
      $shoes_sql = mysqli_fetch_assoc(mysqli_query($con, $shoes_sql_query));
      $shoes_details_sql_query = "SELECT details FROM shoe_details WHERE shoe_id={$id}";
      $shoes_details_sql = mysqli_fetch_all(mysqli_query($con, $shoes_details_sql_query));
      $shoes_sizes_sql_query = "SELECT size FROM shoe_sizes WHERE shoe_id={$id}";
      $shoes_sizes_sql = mysqli_fetch_all(mysqli_query($con, $shoes_sizes_sql_query));
      $shoes_colors_sql_query = "SELECT * FROM shoe_colors WHERE shoe_id={$id}";
      $shoes_colors_sql = mysqli_fetch_all(mysqli_query($con, $shoes_colors_sql_query));
      $shoes_color_sql_query = "SELECT * FROM shoe_colors WHERE shoe_id={$id} AND color_name='{$color}'";
      $shoes_color_sql = mysqli_fetch_all(mysqli_query($con, $shoes_color_sql_query));
      $colorindex = substr($shoes_color_sql[0][3],-1);

        echo 
        "<div class='product'> 
          <div class='product-left'> 
            <img src='./assets/{$id}/product_{$colorindex}.jpg' class='main' />
            <div class='selector center'>
              <img src='./assets/{$id}/product_{$colorindex}.jpg' class='active' id='img1' />
              <img src='./assets/{$id}/color_{$colorindex}.jpg' id='img2' />
            </div>
            <script src='js/np2.js'></script>
            <p>{$shoes_sql['desc1']}<br />{$shoes_sql['desc2']}</p>
            <span class='bold'>{$shoes_sql['name']} Details</span>
            <ul>
            ";
        
        foreach($shoes_details_sql as $value){
          echo "<li>$value[0]</li>";
        }

        echo 
        " </ul>
          </div>
          <div class='product-right'> 
              <h2>{$shoes_sql['name']}</h2>
              <h4>\${$shoes_sql['price']}</h4>
              <hr />
              <span class='color-text bold'>Color: </span>
              <span class='color-text bold'>{$shoes_color_sql[0][1]}</span>
              <br />
              <br />
              <div class='selector'>";

        foreach($shoes_colors_sql as $c){
          $colIndex = substr($c[3],-1);
          if ($colIndex == $colorindex) {
            echo "<a href='./product.php?id={$id}&color={$c[1]}'><img src='./assets/{$id}/color_{$colIndex}.jpg' class='small active'></a>";
          } else {
            echo "<a href='./product.php?id={$id}&color={$c[1]}'><img src='./assets/{$id}/color_{$colIndex}.jpg' class='small'></a>";
          }
        };
        echo 
        " <br /><br />
        <span class='size-text bold'>Shoe Size:</span>
        <select id='size-selector'>";
        foreach($shoes_sizes_sql as $value){
          echo "<option value='{$value[0]}'>{$value[0]}</option>";
        }
        
        echo 
        "</select>
        
        <div class='order-form' id='odForm'>
        
        
        </div>
        </div>



          </div>
          
          <script src='js/new-product.js'></script>";
        
?>


  </body>
</html>
