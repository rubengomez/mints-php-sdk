<?php

namespace Mints\User;

use Mints\MintsHelper;

trait Contacts
{
    private $module = 'crm';
    public function getContacts($options = [], $usePost = true)
    {
        return MintsHelper::getQueryResults($this->client, '/' . $this->module . '/contacts', $options, $usePost);
    }

    public function getContact($id, $options = [])
    {
        return $this->client->raw('get', '/' . $this->module . "/contacts/{$id}", $options);
    }

    public function createContact($data, $options = [])
    {
        return $this->client->raw('post', '/' . $this->module . '/contacts', $options, $data);
    }

    public function updateContact($id, $data, $options = [])
    {
        return $this->client->raw('put', '/' . $this->module . "/contacts/{$id}", $options, $data);
    }

    public function deleteContact($id, $options = [])
    {
        return $this->client->raw('delete', '/' . $this->module . "/contacts/{$id}", $options);
    }
}