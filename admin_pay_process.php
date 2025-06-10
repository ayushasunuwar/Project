<?php
$khalti_secret_key = 'YOUR_KHALTI_SECRET_KEY';
$api_url = ''; 

$data = [
    'amount' => $_POST['amount'] * 100, // Convert to paisa
    'receiver_account' => $_POST['bank_account'],
    'receiver_bank_code' => $_POST['bank_code'],
    'remarks' => 'Monthly Salary for ' . $_POST['name'],
];

$headers = [
    'Authorization: Key ' . $khalti_secret_key,
    'Content-Type: application/json'
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

// Handle response
$response_data = json_decode($response, true);
if (isset($response_data['idx'])) {
    echo "Salary paid successfully!";
} else {
    echo "Payment failed: " . $response_data['detail'] ?? 'Unknown error';
}
?>
