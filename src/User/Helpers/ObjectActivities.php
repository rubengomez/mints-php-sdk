<?php
namespace Mints\User\Helpers;
trait ObjectActivities {
    ##
    # == Object Activities
    #

    # === Get object activities.
    # Get a collection of object activities.
    #
    # ==== Parameters
    # options:: (Hash) -- List of Resource Collection Options shown above can be used as parameter.
    #
    # ==== First Example
    #     @data = @mints_user->get_object_activities();
    #
    # ==== Second Example
    #     options = { fields: 'object_type' }
    #     @data = @mints_user->get_object_activities($options);
    public function get_object_activities($options = null) {
        return $this->client->raw('get', '/helpers/object-activities', $options);
    }

    # === Get object activity.
    # Get an object activity.
    #
    # ==== Parameters
    # id:: (Integer) -- Object activity id.
    # options:: (Hash) -- List of Resource Collection Options shown above can be used as parameter.
    #
    # ==== First Example
    #     @data = @mints_user->get_object_activity(1);
    #
    # ==== Second Example
    #     options = { fields: 'activity_type' }
    #     @data = @mints_user->get_object_activity(1, $options);
    public function get_object_activity($id, $options = null) {
        return $this->client->raw('get', "/helpers/object-activities/{$id}", $options);
    }

    # === Create object activity.
    # Create an object activity with data.
    #
    # ==== Parameters
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     data = {
    #       activity_type: 'note',
    #       object_type: 'contacts',
    #       object_id: 1
    #     }
    #     @data = @mints_user->create_object_activity($data);
    public function create_object_activity($data) {
        return $this->client->raw('post', '/helpers/object-activities', null, $data);
    }

    # === Update object activity.
    # Update an object activity info.
    #
    # ==== Parameters
    # id:: (Integer) -- Object activity id.
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     data = {
    #       activity_type: 'ticket'
    #     }
    #     @data = @mints_user->update_object_activity(573, $data);
    public function update_object_activity($id, $data) {
        return $this->client->raw('put', "/helpers/object-activities/{$id}", null, $data);
    }

    # === Delete object activity.
    # Delete an object activity.
    #
    # ==== Parameters
    # id:: (Integer) -- Object activity id.
    #
    # ==== Example
    #     @data = @mints_user->delete_object_activity(573);
    public function delete_object_activity($id) {
        return $this->client->raw('delete', "/helpers/object-activities/{$id}");
    }
}