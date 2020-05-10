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
        $data = '{
            "type": "Clogs",
             "id": "10001",
            "name": "Classic Clog",
            "desc1": "Original. Versatile. Comfortable.",
            "desc2": "It’s the iconic clog that started a comfort revolution around the world! The irreverent go-to comfort shoe that you’re sure to fall deeper in love with day after day. Crocs Classic Clogs offer lightweight Iconic Crocs Comfort™, a color for every personality, and an ongoing invitation to be comfortable in your own shoes.",
            "price": 44.99,
            "colors": {
              "Slate Grey": ["#4C4C4C"],
              "Chocolate": ["#755F4A"],
              "Army Green": ["#74794E"],
              "Pool Blue": ["#7BD1D6"],
              "Blossom": ["#EA9EBC"],
              "White": ["#FFFFFF"]
            },
            "sizes": [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17],
            "details": [
              "Incredibly light and fun to wear",
              "Water-friendly and buoyant; weighs only ounces",
              "Ventilation ports add breathability and help shed water and debris",
              "Easy to clean and quick to dry",
              "Pivoting heel straps for a more secure fit",
              "Customizable with Jibbitz™ charms",
              "Iconic Crocs Comfort™: Lightweight. Flexible. 360-degree comfort."
            ]
          }';

          $arr = json_decode($data, true);
          $currentColor = 0;
          $currColor = "Slate Grey";
          $colorrrrs = ["Slate Grey","Chocolate","Army Green","Pool Blue","Blossom","White"];
          
        
        echo 
        "<div class='product'> 
          <div class='product-left'> 
            <img src='./assets/{$arr[id]}/product_{$currentColor}.jpg' class='main' />
            <div class='selector center'>
              <img src='./assets/{$arr[id]}/product_{$currentColor}.jpg' class='active' id='img1' />
              <img src='./assets/{$arr[id]}/color_{$currentColor}.jpg' id='img2' />
            </div>
            <script src='js/np2.js'></script>
            <p>{$arr[desc1]}<br />{$arr[desc2]}</p>
            <span class='bold'>{$arr[name]} Details</span>
            <ul>
            ";
        
        foreach($arr[details] as $value){
          echo "<li>$value</li>";
        }

        echo 
        " </ul>
          </div>
          <div class='product-right'> 
              <h2>{$arr[name]}</h2>
              <h4>\${$arr[price]}</h4>
              <hr />
              <span class='color-text bold'>Color: </span>
              <span class='color-text bold'>{$currColor}</span>
              <br />
              <br />
              <div class='selector'>";

        foreach($colorrrrs as $c){
          echo "<a href='./product.php?id={$arr[id]}&color={$c}'><img src='./assets/{$arr[id]}/color_0.jpg' class='small'></a>";
        };
        echo 
        " <br /><br />
        <span class='size-text bold'>Shoe Size:</span>
        <select id='size-selector'><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option><option value='16'>16</option><option value='17'>17</option></select>
        
        <div class='order-form' id='odForm'>
        
        
        </div>
        </div>



          </div>
          
          <script src='js/new-product.js'></script>";
        
?>


  </body>
</html>
