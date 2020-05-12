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
  <body class="products" style="margin: 0;">
    <div>
      <div class="logo">
        <a href="./index.html">ecrocs</a>
      </div>
    </div>
<?php
    $con = mysqli_connect("127.0.0.1",'root','rxpost123', 'ecrocs');
    if(!$con){
        echo 'Error connecting to server';
    }
    $sql = "SELECT `type`, `id`, `name`, `price` FROM `shoes` ORDER BY `type`";
    $categories = array();

    $raw_results = mysqli_query($con, $sql);
    if ($result = $con->query($sql)) {
    while($row = mysqli_fetch_assoc($raw_results)){
        $categories[$row['type']][] = $row;
    }
    foreach ($categories as $type => $shoes) {
        echo "<table><thead><tr>";
        echo "<th colspan=3>Men's {$type}</th>";
        echo "</tr></thead>";
        echo "<tbody><tr>";
        foreach($shoes as $shoe) {
            
            $sql = "SELECT `color_name`, `color_hex`, `file_name` FROM `shoe_colors` WHERE shoe_colors.shoe_id={$shoe['id']} ORDER BY `file_name`";
            $raw_results = mysqli_query($con, $sql);
            $colors = array();
            while($row = mysqli_fetch_assoc($raw_results)) {
                $colors[$row['color_name']][] = $row['color_hex'];
            }
            echo "<td>";
            $colorsDiv = "<div class='colors' id='colors-{$shoe['id']}'>";
            foreach($colors as $color => $hexes) {
                $colorDivStyle="";
                if(count($hexes) == 2) {
                    $colorDivStyle="'background-image: ".dualGradient($hexes[0], $hexes[1]).";'";
                } else {
                    $colorName = stripslashes($hexes[0]);
                    $colorDivStyle="'background-color: {$colorName};'";
                }
                $colorDiv = "<div class='circle' name='{$color}' style={$colorDivStyle} ></div>";
                $colorsDiv .= $colorDiv;
            }
            $colorsDiv .= "</div>";
            $title = "<div class='title'>{$shoe['name']}</div>";
            $img = "<img src='./assets/{$shoe['id']}/product_0.jpg' id='img-{$shoe['id']}'>";
            $price = "<span class='price'>\${$shoe['price']}</span>";
            
            $card = "<div class='card'>{$title}{$img}{$price}{$colorsDiv}</div>";
            $anchor = "<a id=a-{$shoe['id']} href=''>{$card}</a>";
            
            echo $anchor;
            echo "</td>";
        }

        echo "</tr></tbody></table>";
    }
}

    $con->close();

    function dualGradient($g1, $g2) {
      return "-webkit-linear-gradient(-235deg, {$g1} 50%, {$g2} 50%)";
    }
?>
    <script src="js/new-products.js"></script>
  </body>
</html>
