<?php

namespace Mints\MPublic\Ecommerce;

trait PublicOrders
{
    /**
     * Get My Shopping Cart.
     * Get a collection of items in the shopping cart.
     *
     * @param array|null $options
     * @return mixed
     * @throws \Exception
     */
    public function getMyShoppingCart($options = null)
    {
        return $this->client->raw('get', '/ecommerce/my-shopping-cart', $options, null);
    }

    /**
     * Add Item To Shopping Cart.
     * Add an item into a shopping cart.
     *
     * @param array $data Data to be submitted.
     * @param array|null $options
     * @return mixed
     * @throws \Exception
     */
    public function addItemToShoppingCart($data, $options = null)
    {
        return $this->client->raw('post', '/ecommerce/shopping-cart', $options, $this->dataTransform($data));
    }
}