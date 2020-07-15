<?php

namespace App\StorageGateways;

use Illuminate\Support\Facades\Http;

class PhotoGateway implements GatewayInterface
{
    const STORAGE_API = 'https://test.rxflodev.com';

    public function getData()
    {}

    public function sendData($data)
    {
        $response = Http::post(self::STORAGE_API, [
            'imageData' => $data,
        ]);

        $url = $this->getResponseUrl($response);

        return $url;
    }

    public function getResponseUrl($response)
    {
        $res = json_decode($response);

        if($res->status == 'success'){
            return $res->url;
        }

    }
}
