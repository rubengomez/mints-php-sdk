<?php

namespace Mints\User\Crm;
use Mints\MintsHelper;

trait Companies {

  /**
   * Get companies support data.
   * Get support data of companies.
   *
   * Example:
   * $data = $mintsUser->getCompaniesSupportData();
   */
  public function getCompaniesSupportData() {
    return $this->client->raw('get', '/crm/companies/support-data');
  }

  /**
   * Get companies.
   * Get a collection of companies.
   *
   * Parameters:
   * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
   * $usePost (bool) -- Variable to determine if the request is by 'post' or 'get' functions.
   *
   * First Example:
   * $data = $mintsUser->getCompanies();
   *
   * Second Example:
   * $options = ['fields' => 'id, title', 'sort' => '-id'];
   * $data = $mintsUser->getCompanies($options);
   *
   * Third Example:
   * $options = ['fields' => 'id, title', 'sort' => '-id'];
   * $data = $mintsUser->getCompanies($options, false);
   */
  public function getCompanies($options = null, $usePost = true) {
    return MintsHelper::getQueryResults($this->client, '/crm/companies', $options, $usePost);
  }

  /**
   * Get company.
   * Get a company info.
   *
   * Parameters:
   * $id (int) -- Company id.
   * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
   *
   * First Example:
   * $data = $mintsUser->getCompany(21);
   *
   * Second Example:
   * $options = ['fields' => 'id, title'];
   * $data = $mintsUser->getCompany(21, $options);
   */
  public function getCompany($id, $options = null) {
    return $this->client->raw('get', "/crm/companies/{$id}", $options);
  }

  /**
   * Create company.
   * Create a company with data.
   *
   * Parameters:
   * $data (array) -- Data to be submitted.
   *
   * Example:
   * $data = [
   *     'title' => 'Company Title',
   *     'alias' => 'Alias',
   *     'website' => 'www.company.example.com',
   *     'street1' => 'Company St',
   *     'city' => 'Company City',
   *     'region' => 'Company Region',
   *     'postal_code' => '12345',
   *     'country_id' => 144,
   *     'tax_identifier' => null
   * ];
   * $data = $mintsUser->createCompany($data);
   */
  public function createCompany($data, $options = null) {
    return $this->client->raw('post', '/crm/companies/', $options, $this->dataTransform($data));
  }

  /**
   * Update company.
   * Update a company info.
   *
   * Parameters:
   * $id (int) -- Company id.
   * $data (array) -- Data to be submitted.
   *
   * Example:
   * $data = [
   *     'title' => 'Company Title Modified'
   * ];
   * $data = $mintsUser->updateCompany(23, $data);
   */
  public function updateCompany($id, $data, $options = null) {
    return $this->client->raw('put', "/crm/companies/{$id}", $options, $this->dataTransform($data));
  }

  /**
   * Delete Companies.
   * Delete a group of companies.
   *
   * Parameters:
   * $data (array) -- Data to be submitted.
   *
   * Example:
   * $data = ['ids' => ['21', '22']];
   * $data = $mintsUser->deleteCompanies($data);
   */
  public function deleteCompanies($data) {
    return $this->client->raw('delete', '/crm/companies/delete', null, $this->dataTransform($data));
  }
}
