<?php
$response = [];

if (empty($_POST['purpose'])) {
    $response['success'] = false;
    $response['message'] = "purpose is Empty";
    echo json_encode($response);
    return;
}

if (empty($_POST['buyer_name'])) {
    $response['success'] = false;
    $response['message'] = "Buyer Name is Empty";
    echo json_encode($response);
    return;
}

if (empty($_POST['amount'])) {
    $response['success'] = false;
    $response['message'] = "Amount is Empty";
    echo json_encode($response);
    return;
}

if (empty($_POST['email'])) {
    $response['success'] = false;
    $response['message'] = "Email is Empty";
    echo json_encode($response);
    return;
}

if (empty($_POST['phone'])) {
    $response['success'] = false;
    $response['message'] = "Phone is Empty";
    echo json_encode($response);
    return;
}

$purpose = $_POST['purpose'];
$buyer_name = $_POST['buyer_name'];
$amount = $_POST['amount'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.instamojo.com/v2/payment_requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,array('Authorization: Bearer NrwTa4kVu5y6rqNuWnQ1-LEBz5j6tNgg1I_vBTERjAQ.kzokSBQuiyHpjiCTAokFRkapVVtmHnMFGC6OcU_3VZQ'));

$payload = array(
    'purpose' => $purpose,
    'amount' => $amount,
    'buyer_name' => $buyer_name,
    'email' => $email,
    'phone' => $phone,
  'redirect_url' => 'https://www.google.co.in/',
  'send_email' => 'True',
  'webhook' => 'https://www.google.co.in/',
  'allow_repeated_payments' => 'False',
);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 
echo $response;

?>