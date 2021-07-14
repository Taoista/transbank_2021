<?php 
require_once './vendor/autoload.php';

use Transbank\Webpay\Webpay;
use Transbank\Webpay\Configuration;
use Transbank\Webpay\WebpayPlus\Transaction;

$transaction = new \Transbank\Webpay\WebpayPlus\Transaction();

// Integracion a produccion con la COD. COMERCIO y API 
$transaction->configureForProduction('cod comercio',' tu api');

// para testiar
// $transaction->configureForIntegration('597055555532', '579B532A7440BB0C9079DED94D31EA1615BACEB56610332264630D42D0A36B1C');



$return_url     = 'dos.php';

$buy_order      = '696969';
$amount         = 1500;
$uniqId         = uniqid();

$createResponse = $transaction->create($buy_order, $uniqId, $amount, $return_url);

$redirectUrl = $createResponse->getUrl().'?token_ws='.$createResponse->getToken();
$_SESSION['token'] = $createResponse->getToken();
header('Location: '.$redirectUrl, true, 302);
exit;

 ?>




