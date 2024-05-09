<?php

namespace Mints\User\Crm;
use Mints\MintsHelper;

trait Deals {

  /**
   * Get deal permits.
   * Get permits of a deal.
   *
   * Parameters:
   * $id (int) -- Deal id.
   *
   * Example:
   * $data = $mintsUser->getDealPermits(7);
   */
  public function getDealPermits($id) {
    return $this->client->raw('get', "/crm/deals/{$id}/permits");
  }

  /**
   * Get deal support data.
   * Get support data of deals.
   *
   * Example:
   * $data = $mintsUser->getDealSupportData();
   */
  public function getDealSupportData() {
    return $this->client->raw('get', '/crm/deals/support-data');
  }

  /**
   * Get deal currencies.
   * Get currencies of deals.
   *
   * Example:
   * $data = $mintsUser->getDealCurrencies();
   */
  public function getDealCurrencies() {
    return $this->client->raw('get', '/crm/deal/currencies');
  }

  /**
   * Get deals.
   * Get a collection of deals.
   *
   * Parameters:
   * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
   * $usePost (bool) -- Variable to determine if the request is by 'post' or 'get' functions.
   *
   * First Example:
   * $data = $mintsUser->getDeals();
   *
   * Second Example:
   * $options = ['fields' => 'id, title'];
   * $data = $mintsUser->getDeals($options);
   *
   * Third Example:
   * $options = ['fields' => 'id, title'];
   * $data = $mintsUser->getDeals($options, false);
   */
  public function getDeals($options = null, $usePost = true) {
    return MintsHelper::getQueryResults($this->client, '/crm/deals', $options, $usePost);
  }

  /**
   * Get deal.
   * Get a deal info.
   *
   * Parameters:
   * $id (int) -- Deal id.
   * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
   *
   * First Example:
   * $data = $mintsUser->getDeal(1);
   *
   * Second Example:
   * $options = ['fields' => 'id, title'];
   * $data = $mintsUser->getDeal(1, $options);
   */
  public function getDeal($id, $options = null) {
    return $this->client->raw('get', "/crm/deals/{$id}", $options);
  }

  /**
   * Create deal.
   * Create a deal with data.
   *
   * Parameters:
   * $data (array) -- Data to be submitted.
   *
   * Example:
   * $data = [
   *   'dealData' => [
   *     'title' => 'New deal',
   *     'stepId' => 1,
   *     'value' => 10500
   *   ]
   * ];
   * $data = $mintsUser->createDeal($data);
   */
  public function createDeal($data, $options = null) {
    return $this->client->raw('post', '/crm/deals', $options, $this->dataTransform($data));
  }

  /**
   * Update deal.
   * Update a deal data.
   *
   * Parameters:
   * $id (int) -- Deal id.
   * $data (array) -- Data to be submitted.
   *
   * Example:
   * $data = [
   *   'title' => 'New Deal Modified'
   * ];
   * $data = $mintsUser->updateDeal(102, $data);
   */
  public function updateDeal($id, $data, $options = null) {
    return $this->client->raw('put', "/crm/deals/{$id}", $options, $this->dataTransform($data));
  }
}
