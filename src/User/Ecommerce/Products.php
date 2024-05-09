<?php
namespace Mints\User\Ecommerce;
use Mints\MintsHelper;

trait Products {
    ##
    # === Update product variations config.
    # Update config of product variations of a product.
    #
    # ==== Parameters
    # product_id:: (Integer) -- Product id.
    # data:: (Hash) -- Data to be submitted.
    #
    public function updateProductVariationsConfig($product_id, $data) {
        // TODO: Method doesnt work, research use
        return $this->client->raw('post', "/ecommerce/products/update-variations-config/{$product_id}", null, $this->dataTransform($data));
    }

    ##
    # === Get product support data.
    # Get support data used in products.
    #
    # ==== Example
    #     $data = $mintsUser->getProductsSupportData();
    public function getProductsSupportData() {
        return $this->client->raw('get', '/ecommerce/products/support-data');
    }

    ##
    # === Delete product.
    # Delete a product.
    #
    # ==== Parameters
    # id:: (Integer) -- Product id.
    #
    public function deleteProduct($id) {
        return $this->client->raw('delete', "/ecommerce/products/{$id}");
    }

    ##
    # === Schedule product.
    # Schedule a product.
    #
    # ==== Parameters
    # id:: (Integer) -- Product id.
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     $data = [
    #         'scheduled_at' => '1970-01-01 00:00:00'
    #     ];
    #     $data = $mintsUser->scheduleProduct(2, $data);
    public function scheduleProduct($id, $data) {
        return $this->client->raw('put', "/ecommerce/products/{$id}/schedule", null, $this->dataTransform($data));
    }

    ##
    # === Get product variant options config.
    # Get variant options config used in a product.
    #
    # ==== Parameters
    # id:: (Integer) -- Product id.
    #
    # ==== Example
    #     $data = $mintsUser->getProductVariantOptionsConfig(1);
    public function getProductVariantOptionsConfig($id) {
        return $this->client->raw('get', "/ecommerce/products/{$id}/variant-options-config");
    }

    ##
    # === Revert published product.
    # Revert a published product.
    #
    # ==== Parameters
    # id:: (Integer) -- Product id.
    #
    # ==== Example
    #     $data = $mintsUser->revertPublishedProduct(2);
    public function revertPublishedProduct($id) {
        return $this->client->raw('get', "/ecommerce/products/{$id}/revert-published-data");
    }

    ##
    # === Get products.
    # Get a collection of products.
    #
    # ==== Parameters
    # options:: (Hash) -- List of Resource Collection Options shown above can be used as parameter.
    # use_post:: (Boolean) -- Variable to determine if the request is by 'post' or 'get' functions.
    #
    # ==== First Example
    #     $data = $mintsUser->getProducts();
    #
    # ==== Second Example
    #     $options = [
    #         'fields' => 'id'
    #     ];
    #     $data = $mintsUser->getProducts($options);
    #
    # ==== Third Example
    #     $options = [
    #         'fields' => 'id'
    #     ];
    #     $data = $mintsUser->getProducts($options, false);
    public function getProducts($options = null, $use_post = true) {
        return MintsHelper::getQueryResults($this->client, '/ecommerce/products', $options, $use_post);
    }

    ##
    # === Get product.
    # Get a product info.
    #
    # ==== Parameters
    # id:: (Integer) -- Product id.
    # options:: (Hash) -- List of Resource Collection Options shown above can be used as parameter.
    #
    # ==== First Example
    #     $data = $mintsUser->getProduct(3);
    #
    # ==== Second Example
    #     $options = [
    #         'fields' => 'slug'
    #     ];
    #     $data = $mintsUser->getProduct(3, $options);
    public function getProduct($id, $options = null) {
        return $this->client->raw('get', "/ecommerce/products/{$id}", $options);
    }

    ##
    # === Create product.
    # Create a product with data.
    #
    # ==== Parameters
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     $data = [
    #         'title' => 'New Product',
    #         'slug' => 'new-product',
    #         'sku_prefix' => 'sku_prefix'
    #     ];
    #     $data = $mintsUser->createProduct($data);
    public function createProduct($data, $options = null) {
        return $this->client->raw('post', '/ecommerce/products/', $options, $this->dataTransform($data));
    }

    ##
    # === Update product.
    # Update a product info.
    #
    # ==== Parameters
    # id:: (Integer) -- Product id.
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     $data = [
    #         'title' => 'New Product Modified',
    #         'slug' => 'new-product'
    #     ];
    #     $data = $mintsUser->updateProduct(9, $data);
    public function updateProduct($id, $data, $options = null) {
        return $this->client->raw('put', "/ecommerce/products/{$id}", $options, $this->dataTransform($data));
    }
}
