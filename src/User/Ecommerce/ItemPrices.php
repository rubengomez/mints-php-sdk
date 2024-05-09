<?php
namespace Mints\User\Ecommerce;
trait ItemPrices {
    ##
    # == Item Prices
    #

    # === Get item prices.
    # Get a collection of item prices.
    #
    # ==== Parameters
    # options:: (Hash) -- List of Resource Collection Options shown above can be used as parameter.
    #
    # ==== First Example
    #     $data = $mintsUser->getItemPrices();
    #
    # ==== Second Example
    #     $options = [ 'fields' => 'priceCents' ];
    #     $data = $mintsUser->getItemPrices($options);
    public function getItemPrices($options = null) {
        return $this->client->raw('get', '/ecommerce/item-prices', $options);
    }

    # === Get item price.
    # Get a item price info.
    #
    # ==== Parameters
    # id:: (Integer) -- Item price id.
    # options:: (Hash) -- List of Resource Collection Options shown above can be used as parameter.
    #
    # ==== First Example
    #     $data = $mintsUser->getItemPrice(1);
    #
    # ==== Second Example
    #     $options = [ 'fields' => 'priceCents' ];
    #     $data = $mintsUser->getItemPrice(1, $options);
    public function getItemPrice($id, $options = null) {
        return $this->client->raw('get', "/ecommerce/item-prices/{$id}", $options);
    }

    # === Create item price.
    # Create a item price with data.
    #
    # ==== Parameters
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     $data = [
    #       'priceList' => [
    #         [ 'id' => 1 ],
    #         [ 'id' => 2 ]
    #       ],
    #       'priceListId' => 1,
    #       'title' => 'New Item Price'
    #     ];
    #     $data = $mintsUser->createItemPrice($data);
    public function createItemPrice($data) {
        // FIXME: Api send skuId as null and DB doesnt allow that.
        return $this->client->raw('post', '/ecommerce/item-prices', null, $this->dataTransform($data));
    }

    # === Update item price.
    # Update a item price info.
    #
    # ==== Parameters
    # id:: (Integer) -- Order item price id.
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     $data = [
    #       'price' => 12345
    #     ];
    #     $data = $mintsUser->updateItemPrice(1, $data);
    public function updateItemPrice($id, $data) {
        return $this->client->raw('put', "/ecommerce/item-prices/{$id}", null, $this->dataTransform($data));
    }

    # === Delete item price.
    # Delete a item price.
    #
    # ==== Parameters
    # id:: (Integer) -- Item price id.
    #
    # ==== Example
    #     $data = $mintsUser->deleteItemPrice(803);
    public function deleteItemPrice($id) {
        return $this->client->raw('delete', "/ecommerce/item-prices/{$id}");
    }
}
