<?php

namespace Mints;

trait ContactAuthTrait
{
    public Contact $mintsContact;
    public string $contactToken;

    public function initializeContactClient($host = null, $apiKey = null, $sessionToken = null, $debug = false, $timeouts = []): void
    {
        // Check if mints_session_token cookie exists, then set session token from cookie
        if (isset($_COOKIE['mints_contact_session_token'])) {
            $sessionToken = $_COOKIE['mints_contact_session_token'];
        }
        $this->mintsContact = new Contact($host, $apiKey, $sessionToken, $debug, $timeouts);
    }

    /**
     * @param string $email
     * @param string $password
     * @return User
     * @throws \Exception
     */
    public function mintsContactLogin($email, $password)
    {
        // Login in mints
        $response = $this->mintsContact->login($email, $password);
        // Get session token from response
        $sessionToken = $response['session_token'];
        $idToken = $response['contact']['contact_token'] ? $response['contact']['contact_token'] : $response['contact']['id_token'];
        // Set a permanent cookie with the session token
        setcookie('mints_contact_session_token', $sessionToken, 0, '/', '', true, true);
        setcookie('mints_contact_id', $idToken, 0, '/', '', true, true);
        $this->contactToken = $idToken;
    }

    public function mintsContactMagicLinkLogin($hash, $redirectInError = false)
    {
        // Login in mints
        $response = $this->mintsContact->magicLinkLogin($hash);

        if (isset($response['data'])) {
            // Get session token from response
            $sessionToken = $response['data']['session_token'];
            $idToken = $response['data']['contact']['contact_token'] ? $response['data']['contact']['contact_token'] : $response['data']['contact']['id_token'];
            // Set a permanent cookie with the session token
            setcookie('mints_contact_session_token', $sessionToken, 0, '/', '', true, true);
            setcookie('mints_contact_id', $idToken, 0, '/', '', true, true);
            $this->contactToken = $idToken;
            if ($redirectInError) {
                header('Location: ' . ($response['data']['redirect_url'] ?? '/'));
                exit();
            }
        } else {
            if ($redirectInError) {
                header('Location: /');
                exit();
            }
        }
    }

    public function mintsContactLogout()
    {
        // Logout from mints
        $this->mintsContact->logout();
        // Delete session token and keep the contact token id
        // Never delete the mints_contact_id cookie to avoid the creation of ghosts
        setcookie('mints_contact_session_token', '', time() - 3600, '/', '', true, true);
        $this->contactToken = null;
    }

    public function mintsContactSignedIn()
    {
        try {
            // Check status in mints
            $response = $this->mintsContact->status();
            $status = isset($response['success']) ? $response['success'] : false;
        } catch (Exception $e) {
            // Handle the client Unauthorized error
            // if mints response is negative delete the session cookie
            setcookie('mints_contact_session_token', '', time() - 3600, '/', '', true, true);
            $status = false;
        }

        return $status;
    }
}