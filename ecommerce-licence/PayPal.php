<?php  
  $enableSandbox = true;

// Database settings. Change these for your database configuration.


// PayPal settings. Change these to your account details and the relevant URLs
// for your site.
$paypalConfig = [
    'email' => 'mefhoumhajar999@gmail.com',
    'return_url' => 'http://localhost:81/ecommerce-licence/success.php',
    'cancel_url' => 'http://localhost:81/ecommerce-licence/success.php',
    'notify_url' => 'http://localhost:81/ecommerce-licence/success.php'
];

$paypalUrl = $enableSandbox ? 'https://www.sandbox.paypal.com/ma/signin' : 'https://www.paypal.com/ma/signin';
  
// Product being purchased.
$itemName = $prdnam;
$itemAmount = $prcos;

// Include Functions
include 'functions.php';

// Check if paypal request or response


    // Grab the post data so that we can set up the query string for PayPal.
    // Ideally we'd use a whitelist here to check nothing is being injected into
    // our post data.
    $data = [];
    foreach ($_POST as $key => $value) {
        $data[$key] = stripslashes($value);
    }

    // Set the PayPal account.
    $data['business'] = $paypalConfig['email'];

    // Set the PayPal return addresses.
    $data['return'] = stripslashes($paypalConfig['return_url']);
    $data['cancel_return'] = stripslashes($paypalConfig['cancel_url']);
    $data['notify_url'] = stripslashes($paypalConfig['notify_url']);

    // Set the details about the product being purchased, including the amount
    // and currency so that these aren't overridden by the form data.
    $data['item_name'] = $_GET['produit'];
    $data['amount'] = $_GET['ammount'];
    $data['currency_code'] = 'GBP';

    // Add any custom fields for the query string.
    //$data['custom'] = USERID;

    // Build the query string from the data.
    $queryString = http_build_query($data);

    // Redirect to paypal IPN
    header('location:' . $paypalUrl . '?' . $queryString);
    exit();
	?>