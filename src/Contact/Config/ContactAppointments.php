<?php

namespace Mints\Contact\Config;

use Mints\MintsHelper;

trait ContactAppointments
{
    public function getAppointments($options = [], $usePost = true)
    {
        return MintsHelper::getQueryResults($this->client, '/config/appointments', $options, $usePost);
    }

    public function getAppointment($id, $options = [])
    {
        return $this->client->raw('get', "/config/appointments/{$id}", $options);
    }

    public function createAppointment($data, $options = [])
    {
        return $this->client->raw('post', '/config/appointments', $options, $this->dataTransform($data));
    }

    public function updateAppointment($id, $data, $options = [])
    {
        return $this->client->raw('put', "/config/appointments/{$id}", $options, $this->dataTransform($data));
    }

    public function scheduledAppointments($data, $options = [])
    {
        return $this->client->raw('post', '/config/appointments/scheduled-appointments', $options, $this->dataTransform($data));
    }

    public function attachInvitee($data, $options = [])
    {
        return $this->client->raw('post', '/config/appointments/attach-invitee', $options, $this->dataTransform($data));
    }

    public function attachFollower($data, $options = [])
    {
        return $this->client->raw('post', '/config/appointments/attach-follower', $options, $this->dataTransform($data));
    }

    public function detachInvitee($data, $options = [])
    {
        return $this->client->raw('post', '/config/appointments/detach-invitee', $options, $this->dataTransform($data));
    }

    public function detachFollower($data, $options = [])
    {
        return $this->client->raw('post', '/config/appointments/detach-follower', $options, $this->dataTransform($data));
    }

    public function syncInvitee($data, $options = [])
    {
        return $this->client->raw('post', '/config/appointments/sync-invitee', $options, $this->dataTransform($data));
    }

    public function syncFollower($data, $options = [])
    {
        return $this->client->raw('post', '/config/appointments/sync-follower', $options, $this->dataTransform($data));
    }
}