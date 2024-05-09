<?php

namespace Mints\User\Crm;
use Mints\MintsHelper;

trait Contacts {

  /**
   * Get contacts support data.
   * Get support data of contacts.
   *
   * Example:
   * $data = $mintsUser->getContactsSupportData();
   */
  public function getContactsSupportData() {
    return $this->client->raw('get', '/crm/contacts/support-data');
  }

  /**
   * Get online activity.
   * Get online activity of a contact.
   *
   * Parameters:
   * $id (int) -- Contact id.
   *
   * Example:
   * $data = $mintsUser->getOnlineActivity(5);
   */
  public function getOnlineActivity($id) {
    return $this->client->raw('get', "/crm/contacts/{$id}/online-activity");
  }

  /**
   * Get contacts.
   * Get a collection of contacts.
   *
   * Parameters:
   * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
   * $usePost (bool) -- Variable to determine if the request is by 'post' or 'get' functions.
   *
   * First Example:
   * $data = $mintsUser->getContacts();
   *
   * Second Example:
   * $options = [
   *   'sort' => 'id',
   *   'fields[contacts]' => 'id, email'
   * ];
   * $data = $mintsUser->getContacts($options);
   *
   * Third Example:
   * $options = [
   *   'sort' => 'id',
   *   'fields[contacts]' => 'id, email'
   * ];
   * $data = $mintsUser->getContacts($options, true);
   */
  public function getContacts($options = null, $usePost = true) {
    return MintsHelper::getQueryResults($this->client,'/crm/contacts', $options, $usePost);
  }

  /**
   * Get contact.
   * Get a contact data.
   *
   * Parameters:
   * $id (int) -- Contact id.
   * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
   *
   * First Example:
   * $data = $mintsUser->getContact(5);
   *
   * Second Example:
   * $options = [
   *   'sort' => 'id',
   *   'fields[contacts]' => 'id, email'
   * ];
   * $data = $mintsUser->getContact(5, $options);
   */
  public function getContact($id, $options = null) {
    return $this->client->raw('get', "/crm/contacts/{$id}", $options);
  }

  /**
   * Create contact.
   * Create a contact with data.
   *
   * Parameters:
   * $data (array) -- Data to be submitted.
   *
   * Example:
   * $data = [
   *     'email' => 'email@example.com',
   *     'givenName' => 'Given Name',
   *     'lastName' => 'Last Name',
   *     'password' => '123456'
   * ];
   * $data = $mintsUser->createContact($data);
   */
  public function createContact($data, $options = null) {
    return $this->client->raw('post', '/crm/contacts', $options, $this->dataTransform($data));
  }

  /**
   * Update contact.
   * Update contact data.
   *
   * Parameters:
   * $id (int) -- Contact id.
   * $data (array) -- Data to be submitted.
   *
   * Example:
   * $data = [
   *     'email' => 'email_modified@example.com',
   *     'companyId' => 3
   * ];
   * $data = $mintsUser->updateContact(65, $data);
   */
  public function updateContact($id, $data, $options = null) {
    return $this->client->raw('put', "/crm/contacts/{$id}", $options, $this->dataTransform($data));
  }

  /**
   * Get contact deals.
   * Get a collection of deals of a contact.
   *
   * Parameters:
   * $contactId (int) -- Contact id.
   *
   * Example:
   * $data = $mintsUser->getContactDeal(5);
   */
  public function getContactDeal($contactId) {
    return $this->client->raw('get', "/crm/contacts/{$contactId}/deals");
  }

  /**
   * Create contact deal.
   * Create a contact deal with data.
   *
   * Parameters:
   * $contactId (int) -- Contact id.
   * $data (array) -- Data to be submitted.
   *
   * Example:
   * $data = ['dealId' => 6];
   * $data = $mintsUser->createContactDeal(5, $data);
   */
  public function createContactDeal($contactId, $data) {
    return $this->client->raw('post', "/crm/contacts/{$contactId}/deals", null, $data);
  }

  /**
   * Delete contact deal.
   * Delete a contact deal with data.
   *
   * Parameters:
   * $contactId (int) -- Contact id.
   * $dealId (int) -- Deal id.
   *
   * Example:
   * $data = $mintsUser->deleteContactDeal(5, 100);
   */
  public function deleteContactDeal($contactId, $dealId) {
    return $this->client->raw('delete', "/crm/contacts/{$contactId}/deals/{$dealId}");
  }

  /**
   * Get contact user.
   * Get user data of a contact.
   *
   * Parameters:
   * $contactId (int) -- Contact id.
   *
   * Example:
   * $data = $mintsUser->getContactUser(66);
   */
  public function getContactUser($contactId) {
    return $this->client->raw('get', "/crm/contacts/{$contactId}/users");
  }

  /**
   * Create contact user.
   * Relate a contact with an user.
   *
   * Parameters:
   * $contactId (int) -- Contact id.
   * $data (array) -- Data to be submitted.
   *
   * Example:
   * $data = ['userId' => 9];
   * $data = $mintsUser->createContactUser(66, $data);
   */
  public function createContactUser($contactId, $data) {
    return $this->client->raw('post', "/crm/contacts/{$contactId}/users", null, $data);
  }

  /**
   * Delete contact user.
   * Delete a relationship between a contact and an user.
   *
   * Parameters:
   * $contactId (int) -- Contact id.
   * $id (int) -- User id.
   *
   * Example:
   * $data = $mintsUser->deleteContactUser(153, 9);
   */
  public function deleteContactUser($contactId, $id) {
    return $this->client->raw('delete', "/crm/contacts/{$contactId}/users/{$id}");
  }

  /**
   * Get contact segments.
   * Get segments of a contact.
   *
   * Parameters:
   * $contactId (int) -- Contact id.
   *
   * Example:
   * $data = $mintsUser->getContactSegments(1);
   */
  public function getContactSegments($contactId) {
    return $this->client->raw('get', "/crm/contacts/{$contactId}/segments");
  }

  /**
   * Get contact submissions.
   * Get submissions of a contact.
   *
   * Parameters:
   * $contactId (int) -- Contact id.
   *
   * Example:
   * $data = $mintsUser->getContactSubmissions(146);
   */
  public function getContactSubmissions($contactId) {
    return $this->client->raw('get', "/crm/contacts/{$contactId}/submissions");
  }

  /**
   * Get contact tags.
   * Get tags of a contact.
   *
   * Parameters:
   * $contactId (int) -- Contact id.
   *
   * Example:
   * $data = $mintsUser->getContactTags(1);
   */
  public function getContactTags($contactId) {
    return $this->client->raw('get', "/crm/contacts/{$contactId}/tags");
  }

  /**
   * Create contact merge.
   * Merge contacts.
   *
   * Parameters:
   * $id (int) -- Contact id.
   * $data (array) -- Data to be submitted. It contains ids to be merged.
   *
   * Example:
   * $data = ['mergeContactIds' => [152]];
   * $data = $mintsUser->mergeContacts(151, $data);
   */
  public function mergeContacts($id, $data) {
    return $this->client->raw('post', "/crm/contacts/{$id}/merge", null, $this->dataTransform($data));
  }

  /**
   * Send magic links.
   * Send magic links to contacts.
   *
   * Parameters:
   * $data (array) -- Data to be submitted.
   *
   * Example:
   * $data = [
   *   'contacts' => ['email_1@example.com', 'email_2@example.com', 'email_3@example.com'],
   *   'templateId' => 2,
   *   'redirectUrl' => "",
   *   'lifeTime' => 1440,
   *   'maxVisits' => 3
   * ];
   * $data = $mintsUser->sendMagicLinks($data);
   */
  public function sendMagicLinks($data) {
    return $this->client->raw('post', '/crm/contacts/send-magic-link', null, $this->dataTransform($data));
  }

  /**
   * Delete contacts.
   * Delete different contacts.
   *
   * Parameters:
   * $data (array) -- Data to be submitted.
   *
   * Example:
   * $data = ['ids' => ['67', '68', '69']];
   * $data = $mintsUser->deleteContacts($data);
   */
  public function deleteContacts($data) {
    // TODO: ContactController.delete need a success output
    return $this->client->raw('delete', '/crm/contacts/delete', null, $this->dataTransform($data));
  }
}
