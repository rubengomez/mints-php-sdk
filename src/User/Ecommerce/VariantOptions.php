<?php
namespace Mints\User\Ecommerce;
trait VariantOptions {
    ##
    # === Get variant options.
    # Get a collection of variant options.
    #
    # ==== Parameters
    # options:: (Hash) -- List of Resource Collection Options shown above can be used as parameter.
    #
    # ==== First Example
    #     $data = $mintsUser->getVariantOptions();
    #
    # ==== Second Example
    #     $options = ['fields' => 'id, title'];
    #     $data = $mintsUser->getVariantOptions($options);
    public function getVariantOptions($options = null) {
        return $this->client->raw('get', '/ecommerce/variant-options', $options);
    }

    ##
    # === Get variant option.
    # Get a variant options info.
    #
    # ==== Parameters
    # id:: (Integer) -- Variant option id.
    # options:: (Hash) -- List of Resource Collection Options shown above can be used as parameter.
    #
    # ==== First Example
    #     $data = $mintsUser->getVariantOption(1);
    #
    # ==== Second Example
    #     $options = ['fields' => 'id, title'];
    #     $data = $mintsUser->getVariantOption(1, $options);
    public function getVariantOption($id, $options = null) {
        return $this->client->raw('get', "/ecommerce/variant-options/{$id}", $options);
    }

    ##
    # === Create variant option.
    # Create a variant option with data.
    #
    # ==== Parameters
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     $data = [
    #         'title' => 'New Variant Option'
    #     ];
    #     $data = $mintsUser->createVariantOption($data);
    public function createVariantOption($data) {
        return $this->client->raw('post', '/ecommerce/variant-options', null, $this->dataTransform($data));
    }

    ##
    # === Update variant option.
    # Update a variant option info.
    #
    # ==== Parameters
    # id:: (Integer) -- Variant option id.
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     $data = [
    #         'title' => 'New Variant Option Modified'
    #     ];
    #     $data = $mintsUser->updateVariantOption(6, $data);
    public function updateVariantOption($id, $data) {
        return $this->client->raw('put', "/ecommerce/variant-options/{$id}", null, $this->dataTransform($data));
    }
}
