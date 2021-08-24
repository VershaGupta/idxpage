<?php
$data_inpur = (file_get_contents('php://input'));


if($data_inpur){
	$data_inpur = json_decode($data_inpur);
$curl = curl_init();
$data  = '{"stayLogin":"'.$data_inpur->stayLogin.'","password":"'.$data_inpur->password.'","email":"'.$data_inpur->email.'"}';
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://devapi.lrinternal.com/identity/v2/auth/login?apikey=a8f2d231-0167-4f4e-b18e-7652fd3b9873&resetPasswordEmailTemplate=forgotpassword-default",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => ($data),
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: application/json",
    "postman-token: b296f769-d728-333b-de92-d316f689e102"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
//window.location= "https://mayank.login4website.com/response.php";
//header("Location: https://mayank.login4website.com/response.php");
//exit(0);
}