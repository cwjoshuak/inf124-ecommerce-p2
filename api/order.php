<?php
	header('Content-type: application/json');
	
	$con = mysqli_connect("127.0.0.1",'root','rxpost123', 'ecrocs');
	if(!$con){
		echo 'Error connecting to server';
	}
    if($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST)){
        $_POST = json_decode(file_get_contents("php://input"), true);
    }
    $shoe_id = $_POST["shoe_id"];
    $color = $_POST["color"];
    $qty = $_POST["quantity"];

    $base_price = $_POST["base_price"];
    $state_tax = $_POST["state_tax"];

    $billing_full_name = $_POST["billing_full_name"];
    $billing_phone_number = $_POST["billing_phone_number"];
    $billing_email = $_POST["billing_email"];
    $billing_addr_1 = $_POST["billing_addr_1"];
    $billing_city = $_POST["billing_city"];
    $billing_state = $_POST["billing_state"];
    $billing_zip = $_POST["billing_zip"];

    $shipping_method = $_POST["shipping_method"];

    $payment_name = $_POST["payment_name"];
    $payment_card = $_POST["payment_card"];
    $payment_exp_month = $_POST["payment_exp_month"];
    $payment_exp_year = $_POST["payment_exp_year"];
    echo($shoe_id);
    // $sql = "INSERT INTO transactions 
    // (shoe_id, color_name, quantity, base_price, state_tax, billing_full_name, billing_phone_number, billing_email, billing_addr_1, billing_city, billing_state, billing_zip, shipping_method, payment_name, payment_card, payment_exp_month, payment_exp_year)
    // VALUES 
    // ('$shoe_id', '$color', '$qty', '$base_price', '$state_tax', '$billing_full_name', '$billing_phone_number', '$billing_email', '$billing_addr_1', '$billing_city', '$billing_state', '$billing_zip', '$shipping_method', '$payment_name', '$payment_card', '$payment_exp_month', '$payment_exp_year')";
	// echo json_encode([$seller_NPI, $NDC, $name, $price, $expiration_date, $quantity, $strength, $dosage_form, $labeller, $lot_number]);
    $sql = "INSERT INTO transactions 
    (shoe_id, color_name, quantity, base_price, state_tax, billing_full_name, billing_phone_number, billing_email, billing_addr_1, billing_city, billing_state, billing_zip, shipping_method, payment_name, payment_card, payment_exp_month, payment_exp_year)
    VALUES 
    (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($con, $sql);
    
    mysqli_stmt_bind_param($stmt, "ssiddssssssssssss", $shoe_id, $color, $qty, $base_price, $state_tax, $billing_full_name, $billing_phone_number, $billing_email, $billing_addr_1, $billing_city, $billing_state, $billing_zip, $shipping_method, $payment_name, $payment_card, $payment_exp_month, $payment_exp_year);

	if(!mysqli_stmt_execute($stmt)){
        echo json_encode(['error' => true, 'message' => mysqli_error($con)]);
    } else {
        echo json_encode(['error' => false, 'transaction_id' => mysqli_insert_id($con)]);
    }

	$con->close();
?>
