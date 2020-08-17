<?php

$Name=$_POST['Name'];
$Email=$_POST['Email'];
$Amount=$_POST['Amount'];
$Phone=$_POST['phone'];
$purpose='Donation';


include 'instamojo/Instamojo.php';
$api = new Instamojo\Instamojo('test_25b0142a6266bd184dabc25139c', 'test_22ab32574937d93ac7e2e362eb1', 'https://test.instamojo.com/api/1.1/');

try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => $purpose,
        "amount" => $Amount,
        "send_email" => true,
        "email" => $Email,
        "buyer_name" =>$Name,
        "phone"=>$Phone,
        "send_sms" => true,
        "allow_repeated_payments" =>false,
        "redirect_url" => "https://suicide-prevention-7.000webhostapp.com///redirect.php"
        ));
    //print_r($response);
    $pay_url=$response['longurl'];
    header("location: $pay_url");
	}
	catch (Exception $e) {
	    print('Error: ' . $e->getMessage());
	}



?>

