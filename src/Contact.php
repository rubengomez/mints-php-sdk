<?php

namespace Mints;

use Mints\Contact\Config\ContactConfig;
use Mints\Contact\Content\ContactContent;
use Mints\Contact\Ecommerce\ContactEcommerce;

class Contact
{
    use ContactConfig, ContactContent, ContactEcommerce;
    public Client $client;
    public string $contactV1Url = '/api/contact/v1';

    /**
     * @param $host
     * @param $apiKey
     * @param $sessionToken
     * @param $debug
     * @param $timeouts
     */
    public function __construct($host = null, $apiKey = null, $sessionToken = null, $debug = false, $timeouts = [])
    {
        $this->client = new Client(
            $host ?? $_ENV['MINTS_HOST'] ?? null,
            $apiKey ?? $_ENV['MINTS_API_KEY'] ?? null,
            'contact',
            $sessionToken,
            null,
            null,
            $debug,
            $timeouts
        );
    }

    public function register($data)
    {
        return $this->client->raw('post', '/contacts/register', null, $this->dataTransform($data), '/api/v1');
    }

    public function login($email, $password)
    {
        $data = [
            'email' => $email,
            'password' => $password
        ];
        $response = $this->client->raw('post', '/contacts/login', null, $this->dataTransform($data), '/api/v1');
        if ($response === null) throw new \Exception('Invalid credentials');
        if (array_key_exists('session_token', $response)) {
            $this->client->setSessionToken($response['session_token']);
        }
        return $response;
    }

    public function recoverPassword($data)
    {
        return $this->client->raw('post', '/contacts/recover-password', null, $this->dataTransform($data), '/api/v1');
    }

    public function resetPassword($data)
    {
        return $this->client->raw('post', '/contacts/reset-password', null, $this->dataTransform($data), '/api/v1');
    }

    public function oauthLogin($data)
    {
        return $this->client->raw('post', '/contacts/oauth-login', null, $data, '/api/v1');
    }

    public function magicLinkLogin($token)
    {
        $response = $this->client->raw('get', "/contacts/magic-link-login/{$token}", null, '/api/v1');
        if (array_key_exists('session_token', $response)) {
            $this->client->setSessionToken($response['session_token']);
        }
        return $response;
    }

    public function sendMagicLink($emailOrPhone, $templateSlug, $redirectUrl = '', $lifeTime = 1440, $maxVisits = null, $driver = 'email')
    {
        $data = [
            'driver' => $driver,
            'lifeTime' => $lifeTime,
            'maxVisits' => $maxVisits,
            'redirectUrl' => $redirectUrl,
            'templateId' => $templateSlug
        ];
        if (in_array($driver, ['sms', 'whatsapp'])) {
            $data['phone'] = $emailOrPhone;
        } else {
            $data['email'] = $emailOrPhone;
        }
        return $this->client->raw('post', '/contacts/magic-link', null, $this->dataTransform($data), '/api/v1');
    }

    public function me($options = null)
    {
        return $this->client->raw('get', '/me', $options, null, $this->contactV1Url);
    }

    public function status()
    {
        return $this->client->raw('get', '/status', null, null, $this->contactV1Url);
    }

    public function update($data)
    {
        return $this->client->raw('put', '/update', null, $this->dataTransform($data), $this->contactV1Url);
    }

    public function logout()
    {
        if ($this->client->sessionToken) {
            $response = $this->client->raw('post', '/logout', null, null, $this->contactV1Url);
            if ($response['success']) {
                $this->client->setSessionToken(null);
            }
            return $response;
        }
    }

    public function changePassword($data)
    {
        return $this->client->raw('post', '/change-password', null, $this->dataTransform($data), $this->contactV1Url);
    }

    private function dataTransform($data)
    {
        return MintsHelper::dataTransform($data);
    }
}