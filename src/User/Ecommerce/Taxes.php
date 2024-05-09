<?php
namespace Mints\User\Ecommerce;
trait Taxes {
    ##
    # === Get taxes.
    # Get a collection of taxes.
    #
    # ==== Parameters
    # options:: (Hash) -- List of Resource Collection Options shown above can be used as parameter.
    #
    # ==== First Example
    #     $data = $mintsUser->getTaxes();
    #
    # ==== Second Example
    #     $options = ['fields' => 'title'];
    #     $data = $mintsUser->getTaxes($options);
    public function getTaxes($options = null) {
        return $this->client->raw('get', '/ecommerce/taxes', $options);
    }

    ##
    # === Get tax.
    # Get a tax info.
    #
    # ==== Parameters
    # id:: (Integer) -- Tax id.
    # options:: (Hash) -- List of Resource Collection Options shown above can be used as parameter.
    #
    # ==== First Example
    #     $data = $mintsUser->getTax(1);
    #
    # ==== Second Example
    #     $options = ['fields' => 'title'];
    #     $data = $mintsUser->getTax(1, $options);
    public function getTax($id, $options = null) {
        return $this->client->raw('get', "/ecommerce/taxes/{$id}", $options);
    }

    ##
    # === Create tax.
    # Create a tax with data.
    #
    # ==== Parameters
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     $data = [
    #         'title' => 'New Tax',
    #         'tax_percentage' => 100
    #     ];
    #     $data = $mintsUser->createTax($data);
    public function createTax($data) {
        return $this->client->raw('post', '/ecommerce/taxes', null, $this->dataTransform($data));
    }

    ##
    # === Update tax.
    # Update a tax info.
    #
    # ==== Parameters
    # id:: (Integer) -- Tax id.
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     $data = [
    #         'tax_percentage' => 10
    #     ];
    #     $data = $mintsUser->updateTax(11, $data);
    public function updateTax($id, $data) {
        return $this->client->raw('put', "/ecommerce/taxes/{$id}", null, $this->dataTransform($data));
    }

    ##
    # === Delete tax.
    # Delete a tax.
    #
    # ==== Parameters
    # id:: (Integer) -- Tax id.
    #
    # ==== Example
    #     $data = $mintsUser->deleteTax(11);
    public function deleteTax($id) {
        return $this->client->raw('delete', "/ecommerce/taxes/{$id}");
    }
}