<?php

namespace Mints\Contact\Ecommerce;

use Mints\MintsHelper;

trait ContactVouchers
{
    public function applyVoucher($orderId, $data)
    {
        return $this->client->raw('post', "/ecommerce/orders/{$orderId}/voucher", null, $this->dataTransform($data), $this->contactV1Url);
    }
}

