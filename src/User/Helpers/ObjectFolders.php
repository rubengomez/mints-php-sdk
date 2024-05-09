<?php
namespace Mints\User\Helpers;
trait ObjectFolders {
    ##
    # == Object Folders
    #

    # === Get object folders.
    # Get a collection of object folders.
    #
    # ==== Parameters
    # options:: (Hash) -- List of Resource Collection Options shown above can be used as parameter.
    #
    # ==== First Example
    #     @data = @mints_user->get_object_folders();
    #
    # ==== Second Example
    #     options = { fields: "id" }
    #     @data = @mints_user->get_object_folders($options);
    public function get_object_folders($options = null) {
        return $this->client->raw('get', '/helpers/object-folders', $options);
    }

    # === Get object folder.
    # Get an object folder info.
    #
    # ==== Parameters
    # id:: (Integer) -- Object folders id.
    # options:: (Hash) -- List of Resource Collection Options shown above can be used as parameter.
    #
    # ==== First Example
    #     @data = @mints_user->get_object_folder(1);
    #
    # ==== Second Example
    #     options = { fields: 'id' }
    #     @data = @mints_user->get_object_folder(1, $options);
    public function get_object_folder($id, $options = null) {
        return $this->client->raw('get', "/helpers/object-folders/{$id}", $options);
    }

    # === Create object folder.
    # Create an object folder with data.
    #
    # ==== Parameters
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     data = {
    #       folder_id: 1,
    #       object_id: 1
    #     }
    #     @data = @mints_user->create_object_folder($data);
    public function create_object_folder($data) {
        return $this->client->raw('post', '/helpers/object-folders', null, $data);
    }

    # === Update object folder.
    # Update an object folder info.
    #
    # ==== Parameters
    # id:: (Integer) -- Object folder id.
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     data = {
    #       folder_id: 2
    #     }
    #     @data = @mints_user->update_object_folder(1, $data);
    public function update_object_folder($id, $data) {
        return $this->client->raw('put', "/helpers/object-folders/{$id}", null, $data);
    }

    # === Delete object folder.
    # Delete an object folder.
    #
    # ==== Parameters
    # id:: (Integer) -- Object folder id.
    #
    # ==== Example
    #     @data = @mints_user->delete_object_folder(2);
    public function delete_object_folder($id) {
        return $this->client->raw('delete', "/helpers/object-folders/{$id}");
    }
}
