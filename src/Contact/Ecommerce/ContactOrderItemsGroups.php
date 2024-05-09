<?php

namespace Mints\Contact\Ecommerce;

trait ContactOrderItemsGroups
{
    public function getOrderItemGroups($options = [])
    {
        return $this->client->raw('get', '/ecommerce/order-items-groups', $options, null, $this->contactV1Url);
    }

    public function getOrderItemGroup($id, $options = [])
    {
        return $this->client->raw('get', "/ecommerce/order-items-groups/{$id}", $options, null, $this->contactV1Url);
    }

    public function createOrderItemGroup($data)
    {
        return $this->client->raw('post', '/ecommerce/order-items-groups', null, $this->dataTransform($data), $this->contactV1Url);
    }

    public function updateOrderItemGroup($id, $data)
    {
        return $this->client->raw('put', "/ecommerce/order-items-groups/{$id}", null, $this->dataTransform($data), $this->contactV1Url);
    }

    public function deleteOrderItemGroup($id)
    {
        return $this->client->raw('delete', "/ecommerce/order-items-groups/{$id}", null, null, $this->contactV1Url);
    }
}
