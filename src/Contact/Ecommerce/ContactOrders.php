<?php

namespace Mints\Contact\Ecommerce;

trait ContactOrders
{
    public function getOrders($options = [], $usePost = true)
    {
        if ($usePost) {
            return $this->client->raw('post', '/ecommerce/orders/query', $options, null, $this->contactV1Url);
        } else {
            return $this->client->raw('get', '/ecommerce/orders', $options, null, $this->contactV1Url);
        }
    }

    public function getOrder($id, $options = [])
    {
        return $this->client->raw('get', "/ecommerce/orders/{$id}", $options, null, $this->contactV1Url);
    }

    public function createOrder($data)
    {
        return $this->client->raw('post', '/ecommerce/orders', null, $this->dataTransform($data), $this->contactV1Url);
    }

    public function updateOrder($id, $data)
    {
        return $this->client->raw('put', "/ecommerce/orders/{$id}", null, $this->dataTransform($data), $this->contactV1Url);
    }

    public function detachOrderItemFromOrderItemGroup($orderItemId, $groupId)
    {
        return $this->client->raw('put', "/ecommerce/order-items/detach/{$orderItemId}/order-items-groups/{$groupId}", null, null, $this->contactV1Url);
    }

    public function updateOrderItemFromOrderItemGroup($orderItemId, $groupId, $data)
    {
        $url = "/ecommerce/order-items/update/{$orderItemId}/order-items-groups/{$groupId}";
        return $this->client->raw('put', $url, null, $this->dataTransform($data), $this->contactV1Url);
    }

    public function getMyShoppingCart($options = [])
    {
        return $this->client->raw('get', '/ecommerce/my-shopping-cart', $options, null, $this->contactV1Url);
    }

    public function addItemToShoppingCart($data, $options = [])
    {
        return $this->client->raw('post', '/ecommerce/shopping-cart', $options, $this->dataTransform($data), $this->contactV1Url);
    }
}

