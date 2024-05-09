<?php
namespace Mints\User\Ecommerce;
trait Skus {
    ##
    # === Get skus.
    # Get a collection of skus.
    #
    # ==== Parameters
    # options:: (Hash) -- List of Resource Collection Options shown above can be used as parameter.
    #
    # ==== First Example
    #     $data = $mintsUser->getSkus();
    #
    # ==== Second Example
    #     $options = [
    #         'fields' => 'sku'
    #     ];
    #     $data = $mintsUser->getSkus($options);
    public function getSkus($options = null) {
        return $this->client->raw('get', '/ecommerce/skus', $options);
    }

    ##
    # === Get sku.
    # Get a sku info.
    #
    # ==== Parameters
    # id:: (Integer) -- Sku id.
    # options:: (Hash) -- List of Resource Collection Options shown above can be used as parameter.
    #
    # ==== First Example
    #     $data = $mintsUser->getSku(1);
    #
    # ==== Second Example
    #     $options = [
    #         'fields' => 'title, sku'
    #     ];
    #     $data = $mintsUser->getSku(1, $options);
    public function getSku($id, $options = null) {
        return $this->client->raw('get', "/ecommerce/skus/{$id}", $options);
    }

    ##
    # === Create sku.
    # Create a sku with data.
    #
    # ==== Parameters
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     $data = [
    #         'sku' => 'NEW-SKU',
    #         'title' => 'New Sku',
    #         'slug' => 'new-sku',
    #         'product_id' => 1
    #     ];
    #     $data = $mintsUser->createSku($data);
    public function createSku($data, $options = null) {
        return $this->client->raw('post', '/ecommerce/skus', $options, $this->dataTransform($data));
    }

    ##
    # === Update sku.
    # Update a sku info.
    #
    # ==== Parameters
    # id:: (Integer) -- Sku id.
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     $data = [
    #         'sku' => 'NEW-SKU-XXXIX'
    #     ];
    #     $data = $mintsUser->updateSku(531, $data);
    public function updateSku($id, $data) {
        return $this->client->raw('put', "/ecommerce/skus/{$id}", null, $this->dataTransform($data));
    }

    ##
    # === Delete sku.
    # Delete a sku.
    #
    # ==== Parameters
    # id:: (Integer) -- Sku id.
    #
    # ==== Example
    #     $data = $mintsUser->deleteSku(531);
    public function deleteSku($id) {
        return $this->client->raw('delete', "/ecommerce/skus/{$id}");
    }
}
