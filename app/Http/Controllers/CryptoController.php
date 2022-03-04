<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CryptoController extends Controller
{
    public function index(){
        return $this->getDataCrypto();
    }

    public function getDataCrypto(){
        $curl = curl_init();
        curl_setopt_array($curl,array(
          CURLOPT_URL => "https://rest.cryptoapis.io/v2/wallet-as-a-service/info/ethereum/ropsten/supported-tokens?limit=5&offset=0",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_SSL_VERIFYPEER => false,
          // CURLOPT_ENCODING => "",
          CURLOPT_TIMEOUT => 300,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array (
            'Content-Type:application/json',
            'X-API-Key:43273a2f3ffd0491ac134c3be3f58d5fdfe04a21',
          ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
          echo "error = ".$err ;
        }else{
            $getResponses = json_decode($response);

            return response()->json($getResponses);
        }
      }
}
