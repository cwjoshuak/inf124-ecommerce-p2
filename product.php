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
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300;700&display=swap"
      rel="stylesheet"
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
              <img src='./assets/{$arr[id]}/product_{$currentColor}.jpg' class='active' />
              <img src='./assets/{$arr[id]}/color_{$currentColor}.jpg' class='active' />
            </div>
            
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
        <br /><br />
        <div class='order-form'>
        <h3>Order Information</h3><form action='javascript:;'>
        <ul> 
  <li>
    <label for='qty'>Quantity</label>
    <input type='number' id='qty' name='qty' value='1' min='1' required=''>
  </li>

  <h3>Billing Address</h3>
  <li>
    <label for='fname'>Full Name</label>
    <input type='text' id='fname' name='fname' placeholder='John Doe' required=''>
  </li>
  <li>
    <label for='phone_number'>Phone Number:</label>
    <input type='tel' id='phone_number' name='phone_number' pattern='\d{3}[\-]?\d{3}[-]?\d{4}' placeholder='123-456-7890' required=''>
  </li>
  <li>
    <label for='email'>Email</label>
    <input type='email' id='email' name='email' placeholder='john@example.com' required=''>
  </li>
  <li>
    <label for='adr'>Address</label>
    <input type='text' id='adr' name='address' placeholder='542 W. 15th Street' required=''>
  </li>
  <li>
    <label for='city'>City</label>
    <input type='text' id='city' name='city' placeholder='New York' required=''>
  </li>
  <li><label for='state'>State</label>
  <input type='text' id='state' name='state' pattern='^((AL)|(AK)|(AS)|(AZ)|(AR)|(CA)|(CO)|(CT)|(DE)|(DC)|(FM)|(FL)|(GA)|(GU)|(HI)|(ID)|(IL)|(IN)|(IA)|(KS)|(KY)|(LA)|(ME)|(MH)|(MD)|(MA)|(MI)|(MN)|(MS)|(MO)|(MT)|(NE)|(NV)|(NH)|(NJ)|(NM)|(NY)|(NC)|(ND)|(MP)|(OH)|(OK)|(OR)|(PW)|(PA)|(PR)|(RI)|(SC)|(SD)|(TN)|(TX)|(UT)|(VT)|(VI)|(VA)|(WA)|(WV)|(WI)|(WY))$' placeholder='NY' required=''></li>
  <li>
  </li><li><label for='zip'>Zip</label>
  <input type='text' id='zip' name='zip' pattern='^\d{5}(-\d{4})?$' placeholder='10001' required=''></li>
    <label for='shipping_method'>Shipping Method:</label>
    <select id='shipping-selector'>
      <option value='Overnight'>Overnight</option>
      <option value='2-days Expedited'>2-days Expedited</option>
      <option value='6-days Ground'>6-days Ground</option>
    </select>
  
  <h3>Payment Information</h3>
  <li>
    <label for='cname'>Name on Card</label>
    <input type='text' id='cname' name='cardname' placeholder='Tim Apple' required=''>
  </li>
  <li>
    <label for='ccnum'>Credit card number</label>
    <input type='text' id='ccnum' name='cardnumber' pattern='[0-9]{13,16}' placeholder='1111222233334444' required=''>
  </li>
  <li>
    <label for='expmonth'>Exp Month</label>
    <input type='text' id='expmonth' name='expmonth' pattern='^((0?[1-9])|(1[0-2]))$' placeholder='12' required=''>
  </li>
  <li>
    <label for='expyear'>Exp Year</label>
    <input type='text' id='expyear' name='expyear' pattern='^20\d{2}$' placeholder='2022' required=''>
  </li>
  <li class='button'>
    <button type='submit'>Purchase</button>
  </li>
</ul></form></div>
        
        
        </div>



          </div>";
        
?>


    
    <script src="js/new-product.js"></script>
  </body>
</html>
