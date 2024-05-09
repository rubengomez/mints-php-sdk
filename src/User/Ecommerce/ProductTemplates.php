<?php
namespace Mints\User\Ecommerce;
trait ProductTemplates {
    ##
    # == Product Templates
    #

    # === Get product templates support data from product.
    # Get product templates support data from a product.
    #
    # ==== Parameters
    # id:: (Integer) -- Product id.
    #
    # ==== Example
    #     $data = $mintsUser->getProductTemplatesSupportDataFromProduct(1);
    public function getProductTemplatesSupportDataFromProduct($id) {
        return $this->client->raw('get', "/ecommerce/product-templates/support-data/products/{$id}");
    }

    # === Get product templates support data from order items group.
    # Get product templates support data from a order items group.
    #
    # ==== Parameters
    # id:: (Integer) -- Order items group id.
    #
    # ==== Example
    #     $data = $mintsUser->getProductTemplatesSupportDataFromOrderItemsGroup(1);
    public function getProductTemplatesSupportDataFromOrderItemsGroup($id) {
        return $this->client->raw('get', "/ecommerce/product-templates/support-data/order-items-groups/{$id}");
    }

    # === Get product templates support data.
    # Get support data used in product templates.
    #
    # ==== Example
    #     $data = $mintsUser->getProductTemplatesSupportData();
    public function getProductTemplatesSupportData() {
        return $this->client->raw('get', '/ecommerce/product-templates/support-data');
    }

    # === Get product templates.
    # Get a collection of product templates.
    #
    # ==== Parameters
    # options:: (Hash) -- List of Resource Collection Options shown above can be used as parameter.
    #
    # ==== First Example
    #     $data = $mintsUser->getProductTemplates();
    #
    # ==== Second Example
    #     $options = ['fields' => 'title'];
    #     $data = $mintsUser->getProductTemplates($options);
    public function getProductTemplates($options = null) {
        return $this->client->raw('get', '/ecommerce/product-templates', $options);
    }

    # === Get product template.
    # Get a product template info.
    #
    # ==== Parameters
    # id:: (Integer) -- Product template id.
    # options:: (Hash) -- List of Resource Collection Options shown above can be used as parameter.
    #
    # ==== First Example
    #     $data = $mintsUser->getProductTemplate(1);
    #
    # ==== Second Example
    #     $options = ['fields' => 'title'];
    #     $data = $mintsUser->getProductTemplate(1, $options);
    public function getProductTemplate($id, $options = null) {
        return $this->client->raw('get', "/ecommerce/product-templates/{$id}", $options);
    }

    # === Create product template.
    # Create a product template with data.
    #
    # ==== Parameters
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     $data = [
    #         'title' => 'New Product Template',
    #         'slug' => 'new-product-template'
    #     ];
    #     $data = $mintsUser->createProductTemplate($data);
    public function createProductTemplate($data) {
        return $this->client->raw('post', '/ecommerce/product-templates/', null, $this->dataTransform($data));
    }

    # === Update product template.
    # Update a product template info.
    #
    # ==== Parameters
    # id:: (Integer) -- Product template id.
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     $data = [
    #         'title' => 'New Product Template Modified',
    #         'slug' => 'new-product-template'
    #     ];
    #     $data = $mintsUser->updateProductTemplate(3, $data);
    public function updateProductTemplate($id, $data) {
        return $this->client->raw('put', "/ecommerce/product-templates/{$id}", null, $this->dataTransform($data));
    }
}
