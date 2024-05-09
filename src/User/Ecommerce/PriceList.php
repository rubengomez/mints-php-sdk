<?php
namespace Mints\User\Ecommerce;
use Mints\MintsHelper;

trait PriceList {
    ##
    # == Price List
    #

    # === Get price lists.
    # Get a collection of price lists.
    #
    # ==== Parameters
    # options:: (Hash) -- List of Resource Collection Options shown above can be used as parameter.
    #
    # ==== First Example
    #     $data = $mintsUser->getPriceLists();
    #
    # ==== Second Example
    #     $options = ['fields' => 'title'];
    #     $data = $mintsUser->getPriceLists($options);
    public function getPriceLists($options = null, $usePost = true) {
        return MintsHelper::getQueryResults($this->client, '/ecommerce/price-list', $options, $usePost);
    }

    # === Get price list.
    # Get a price list info.
    #
    # ==== Parameters
    # id:: (Integer) -- Price list id.
    # options:: (Hash) -- List of Resource Collection Options shown above can be used as parameter.
    #
    # ==== First Example
    #     $data = $mintsUser->getPriceList(1);
    #
    # ==== Second Example
    #     $options = ['fields' => 'title'];
    #     $data = $mintsUser->getPriceList(1, $options);
    public function getPriceList($id, $options = null) {
        return $this->client->raw('get', "/ecommerce/price-list/{$id}", $options);
    }

    # === Create price list.
    # Create a price list with data.
    #
    # ==== Parameters
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     $data = ['title' => 'New Price List'];
    #     $data = $mintsUser->createPriceList($data);
    public function createPriceList($data) {
        return $this->client->raw('post', '/ecommerce/price-list', null, $this->dataTransform($data));
    }

    # === Update price list.
    # Update a price list info.
    #
    # ==== Parameters
    # id:: (Integer) -- Price list id.
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     $data = ['title' => 'New Price List Modified'];
    #     $data = $mintsUser->updatePriceList(8, $data);
    public function updatePriceList($id, $data) {
        return $this->client->raw('put', "/ecommerce/price-list/{$id}", null, $this->dataTransform($data));
    }
}
