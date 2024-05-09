<?php
namespace Mints\User\Ecommerce;
trait VariantValues {
    ##
    # === Get variant values.
    # Get a collection of variant values.
    #
    # ==== Parameters
    # options:: (Hash) -- List of Resource Collection Options shown above can be used as parameter.
    #
    # ==== First Example
    #     $data = $mintsUser->getVariantValues();
    #
    # ==== Second Example
    #     $options = ['sort' => '-id'];
    #     $data = $mintsUser->getVariantValues($options);
    public function getVariantValues($options = null) {
        return $this->client->raw('get', '/ecommerce/variant-values', $options);
    }

    ##
    # === Get variant value.
    # Get a variant value info.
    #
    # ==== Parameters
    # id:: (Integer) -- Variant value id.
    # options:: (Hash) -- List of Resource Collection Options shown above can be used as parameter.
    #
    # ==== First Example
    #     $data = $mintsUser->getVariantValue(5);
    #
    # ==== Second Example
    #     $options = ['fields' => 'id'];
    #     $data = $mintsUser->getVariantValue(5, $options);
    public function getVariantValue($id, $options = null) {
        return $this->client->raw('get', "/ecommerce/variant-values/{$id}", $options);
    }

    ##
    # === Create variant value.
    # Create a variant value with data.
    #
    # ==== Parameters
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     $data = [
    #         'value' => 'New Variant Value',
    #         'variant_option_id' => 1,
    #         'display_order' => 1,
    #         'sku_code' => 'new-variant-value-sku'
    #     ];
    #     $data = $mintsUser->createVariantValue($data);
    public function createVariantValue($data) {
        return $this->client->raw('post', '/ecommerce/variant-values', null, $this->dataTransform($data));
    }

    ##
    # === Update variant value.
    # Update a variant value info.
    #
    # ==== Parameters
    # id:: (Integer) -- Variant value id.
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     $data = [
    #         'value' => 'New Variant Value Modified'
    #     ];
    #     $data = $mintsUser->updateVariantValue(22, $data);
    public function updateVariantValue($id, $data) {
        return $this->client->raw('put', "/ecommerce/variant-values/{$id}", null, $this->dataTransform($data));
    }
}
