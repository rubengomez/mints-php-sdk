<?php
namespace Mints\Contact\Ecommerce;
trait ContactOrderItems
{
    public function getOrderItems($options = [])
    {
        return $this->client->raw('get', '/ecommerce/order-items', $options, null, $this->contactV1Url);
    }

    public function getOrderItem($id, $options = [])
    {
        return $this->client->raw('get', "/ecommerce/order-items/{$id}", $options, null, $this->contactV1Url);
    }
}