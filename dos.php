<?php 

require_once './vendor/autoload.php';
use Transbank\Webpay\WebpayPlus\Transaction;
$transaction = new Transaction();

$commerceCode  = 'tu codigo comercio o la demo';
$apiKeySecret  = 'api';

$transaction->configureForProduction($commerceCode, $apiKeySecret);


//  siempre lo toma por POST pero lo puse igual por get por si pasa algo
$token = !isset($_POST['token_ws']) ? $_GET['token_ws'] :  null;


if($token != null){
        // $response = $transaction->commit($token);
        $response = $transaction->commit($token);

        $vci                = $response->vci;
        $status             = $response->status; // -1 es cuando sale correcto
        $respCode           = $response->responseCode;
        $monto              = $response->amount;
        $auCode             = $response->authorizationCode;
        $paymentTypeCode    = $response->paymentTypeCode;
        $accountingDate     = $response->accountingDate;
        $iNuber             = $response->installmentsNumber;
        $uAmount            = $response->installmentsAmount;
        $sessionId          = $response->sessionId;
        $buyOrder           = $response->buyOrder;
        $cardNumber         = $response->cardNumber;
        $transDate          = $response->transactionDate;
    }else{
    	// esto lo genera aun asi si tiene error o pasa algo
        $token = $_GET['TBK_TOKEN'] ?? $_POST['TBK_TOKEN'] ?? null;
        $buyOrder = $_GET['TBK_ORDEN_COMPRA'] ?? $_POST['TBK_ORDEN_COMPRA'] ?? null;
        $sessionId = $_GET['TBK_ID_SESION'] ?? $_POST['TBK_ID_SESION'] ?? null;
    }

    // despues redireccionas

 ?>