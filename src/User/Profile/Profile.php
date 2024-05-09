<?php

namespace Mints\User\Profile;
trait Profile {
    ##
    # === Me.
    # Get contact logged info.
    #
    # ==== Example
    #     @data = @mints_user.me
    public function me($options = null) {
        return $this->client->raw('get', '/profile/me', $options);
    }

    ##
    # == User Preferences
    #

    ##
    # === Get preferences.
    # Get preferences of current user logged.
    #
    # ==== Example
    #     @data = @mints_user.get_preferences
    public function getPreferences() {
        return $this->client->raw('get', '/profile/preferences');
    }

    ##
    # === Create preferences.
    # Create preferences of current user logged with data.
    #
    # ==== Parameters
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     data = {
    #       time_zone: 'GMT-5'
    #     }
    #     @data = @mints_user->create_preferences(data);
    public function createPreferences($data) {
        return $this->client->raw('post', '/profile/preferences', null, $data);
    }

    ##
    # === Get preferences by setting key.
    # Get preferences using a setting key.
    #
    # ==== Parameters
    # setting_key:: (String) -- Setting key.
    #
    # ==== Example
    #     @data = @mints_user->get_preferences_by_setting_key('time_zone');
    public function getPreferencesBySettingKey($setting_key) {
        return $this->client->raw('get', "/profile/preferences/{$setting_key}");
    }

    ##
    # == Notifications
    #

    # === Get notifications.
    # Get a collection of notifications.
    #
    # ==== Example
    #     @data = @mints_user->get_notifications
    public function getNotifications($options = null) {
        return $this->client->raw('get', '/profile/notifications', $options);
    }

    # === Read notifications.
    # Read notifications by data.
    #
    # ==== Parameters
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     data = {
    #       ids: %w[406e9b74-4a9d-42f2-afc6-1587bad6147c a2d9f582-1bdb-4e55-8af0-cd1962eaa88c],
    #       read: true
    #     }
    #     @data = @mints_user->read_notifications(data);
    public function readNotifications($data) {
        // TODO: Inform NotificationController.read method has been modified
        // TODO: Method in controller didnt return data
        return $this->client->raw('post', '/profile/notifications/read', null, $data);
    }

    # === Delete notifications.
    # Delete notifications by data.
    #
    # ==== Parameters
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     data = {
    #       ids: ['179083e3-3678-4cf6-b75e-5a8b9761245e']
    #     }
    #     @data = @mints_user->delete_notifications(data);
    public function deleteNotifications($data) {
        // TODO: Inform NotificationController.delete method has been modified
        // TODO: Method in controller didnt return data
        return $this->client->raw('post', '/profile/notifications/delete', null, $data);
    }
}
