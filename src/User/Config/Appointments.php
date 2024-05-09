<?php

namespace Mints\User\Config;

trait Appointments
{
    /**
     * Get appointments.
     * Get a collection of appointments.
     *
     * Parameters:
     * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
     *
     * First Example:
     * $data = $this->getAppointments();
     *
     * Second Example:
     * $options = ['fields' => 'id'];
     * $data = $this->getAppointments($options);
     */
    public function getAppointments($options = null)
    {
        return $this->client->raw('get', '/config/appointments', $options);
    }

    /**
     * Get appointment.
     * Get an appointment info.
     *
     * Parameters:
     * $id (int) -- Appointment id.
     * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
     *
     * First Example:
     * $data = $this->getAppointment(1);
     *
     * Second Example:
     * $options = ['fields' => 'id'];
     * $data = $this->getAppointment(1, $options);
     */
    public function getAppointment($id, $options = null)
    {
        return $this->client->raw('get', "/config/appointments/{$id}", $options);
    }

    /**
     * Create appointment.
     * Create an appointment with data.
     *
     * Parameters:
     * $data (array) -- Data to be submitted.
     *
     * Example:
     * $data = [
     *     'object_type' => 'contacts',
     *     'object_id' => 1,
     *     'title' => 'New Appointment',
     *     'start' => '2021-09-06T20:29:16+00:00',
     *     'end' => '2022-09-06T20:29:16+00:00',
     *     'attendee_id' => 1
     * ];
     * $data = $this->createAppointment($data);
     */
    public function createAppointment($data)
    {
        return $this->client->raw('post', '/config/appointments', null, $this->dataTransform($data));
    }

    /**
     * Update appointment.
     * Update an appointment info.
     *
     * Parameters:
     * $id (int) -- Appointment id.
     * $data (array) -- Data to be submitted.
     *
     * Example:
     * $data = ['object_id' => 2];
     * $data = $this->updateAppointment(1, $data);
     */
    public function updateAppointment($id, $data)
    {
        return $this->client->raw('put', "/config/appointments/{$id}", null, $this->dataTransform($data));
    }

    /**
     * Delete appointment.
     * Delete an appointment.
     *
     * Parameters:
     * $id (int) -- Appointment id.
     *
     * Example:
     * $data = $this->deleteAppointment(1);
     */
    public function deleteAppointment($id)
    {
        return $this->client->raw('delete', "/config/appointments/{$id}");
    }

    // Los siguientes métodos tienen la misma estructura que los anteriores y no requieren comentarios adicionales

    public function scheduledAppointments($data)
    {
        return $this->client->raw('post', '/config/appointments/scheduled-appointments', null, $this->dataTransform($data));
    }

    public function rescheduleAppointment($data)
    {
        return $this->client->raw('post', '/config/appointments/reschedule-appointment', null, $this->dataTransform($data));
    }

    public function attachInvitee($data)
    {
        return $this->client->raw('post', '/config/appointments/attach-invitee', null, $this->dataTransform($data));
    }

    public function attachFollower($data)
    {
        return $this->client->raw('post', '/config/appointments/attach-follower', null, $this->dataTransform($data));
    }

    public function detachInvitee($data)
    {
        return $this->client->raw('post', '/config/appointments/detach-invitee', null, $this->dataTransform($data));
    }

    public function detachFollower($data)
    {
        return $this->client->raw('post', '/config/appointments/detach-follower', null, $this->dataTransform($data));
    }

    public function syncInvitee($data)
    {
        return $this->client->raw('post', '/config/appointments/sync-invitee', null, $this->dataTransform($data));
    }

    public function syncFollower($data)
    {
        return $this->client->raw('post', '/config/appointments/sync-follower', null, $this->dataTransform($data));
    }
}
