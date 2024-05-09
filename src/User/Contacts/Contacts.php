<?php

namespace Mints\User\Contacts;

trait Contacts
{
    public function changePasswordNoAuth($data)
    {
        return $this->client->raw('post', '/contacts/change-password-no-auth', null, $this->dataTransform($data));
    }
}
