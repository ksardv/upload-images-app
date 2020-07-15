<?php

namespace App\StorageGateways;

interface GatewayInterface {
   public function getData();
   public function sendData($data);
}
