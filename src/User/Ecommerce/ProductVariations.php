<?php
namespace Mints\User\Ecommerce;
trait ProductVariations {
    ##
    # == Product Variation
    #

    # === Generate product variation.
    # Generate a product variation.
    #
    # ==== Parameters
    # product_id:: (Integer) -- Product id.
    # data:: (Hash) -- Data to be submitted.
    #
    public function generateProductVariation($productId, $data) {
        // TODO: Research use
        // TODO: Notify line 247 had a '/' before Exception
        return $this->client->raw('post', "/ecommerce/product-variations/generate/{$productId}", null, $this->dataTransform($data));
    }

    # === Set prices to product variations.
    # Set prices to product variations.
    #
    # ==== Parameters
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     $skus = [
    #         ['id' => 100]
    #     ];
    #     $prices = [
    #         ['id' => 1, 'value' => 1259],
    #         ['id' => 2, 'value' => 1260]
    #     ];
    #     $data = [
    #         'skus' => $skus,
    #         'prices' => $prices
    #     ];
    #
    #     $data = json_encode($data);
    #
    #     $data = $mintsUser->setPricesToProductVariations($data);
    public function setPricesToProductVariations($data) {
        return $this->client->raw('post', '/ecommerce/product-variations/set-prices', null, $this->dataTransform($data));
    }

    # === Get product from product variation.
    # Get a product from a product variation.
    #
    # ==== Parameters
    # product_id:: (Integer) -- Product id.
    #
    # ==== Example
    #     $data = $mintsUser->getProductFromProductVariation(1);
    public function getProductFromProductVariation($productId) {
        return $this->client->raw('get', "/ecommerce/product-variations/product/{$productId}");
    }

    # === Get product variations.
    # Get a collection of product variations.
    #
    # ==== Example
    #     $data = $mintsUser->getProductVariations();
    public function getProductVariations() {
        return $this->client->raw('get', '/ecommerce/product-variations');
    }

    # === Get product variation.
    # Get a product variation info.
    #
    # ==== Parameters
    # id:: (Integer) -- Product variation id.
    #
    # ==== Example
    #     $data = $mintsUser->getProductVariation(100);
    public function getProductVariation($id) {
        return $this->client->raw('get', "/ecommerce/product-variations/{$id}");
    }

    # === Create product variation.
    # Create a product variation with data.
    #
    # ==== Parameters
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     $data = [
    #         'title' => 'New Product Variation',
    #         'sku' => 'NEW-PRODUCT-VARIATION-SKU',
    #         'product_id' => 5,
    #         'supplier' => 36,
    #         'prices' => [
    #             ['id' => 1, 'value' => 300]
    #         ]
    #     ];
    #     $data = $mintsUser->createProductVariation($data);
    public function createProductVariation($data) {
        return $this->client->raw('post', '/ecommerce/product-variations', null, $this->dataTransform($data));
    }

    # === Update product variation.
    # Update a product variation info.
    #
    # ==== Parameters
    # id:: (Integer) -- Product variation id.
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     $data = [
    #         'title' => 'New Product Variation Modified',
    #         'cost' => 123,
    #         'prices' => [
    #             ['id' => 1, 'value' => 400]
    #         ]
    #     ];
    #     $data = $mintsUser->updateProductVariation(528, $data);
    public function updateProductVariation($id, $data) {
        return $this->client->raw('put', "/ecommerce/product-variations/{$id}", null, $this->dataTransform($data));
    }

    # === Delete product variation.
    # Delete a product variation.
    #
    # ==== Parameters
    # id:: (Integer) -- Product variation id.
    #
    # ==== Example
    #     $data = $mintsUser->deleteProductVariation(528);
    public function deleteProductVariation($id) {
        return $this->client->raw('delete', "/ecommerce/product-variations/{$id}");
    }
}
