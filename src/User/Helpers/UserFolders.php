<?php
namespace Mints\User\Helpers;
trait UserFolders {
    ##
    # == User Folders
    #

    # === Get user folders.
    # Get a collection of user folders.
    #
    # ==== Parameters
    # options:: (Hash) -- List of Resource Collection Options shown above can be used as parameter.
    #
    # ==== First Example
    #     @data = @mints_user->get_user_folders();
    #
    # ==== Second Example
    #     options = { fields: 'folder' }
    #     @data = @mints_user->get_user_folders($options);
    public function get_user_folders($options = null) {
        return $this->client->raw('get', '/helpers/folders', $options);
    }

    # === Get user folder.
    # Get an user folder info.
    #
    # ==== Parameters
    # id:: (Integer) -- User folder id.
    # options:: (Hash) -- List of Resource Collection Options shown above can be used as parameter.
    #
    # ==== First Example
    #     @data = @mints_user->get_user_folder(1);
    #
    # ==== Second Example
    #     options = { fields: 'user_id, folder' }
    #     @data = @mints_user->get_user_folder(1, $options);
    public function get_user_folder($id, $options = null) {
        return $this->client->raw('get', "/helpers/folders/{$id}", $options);
    }

    # === Create user folder.
    # Create an user folder with data.
    #
    # ==== Parameters
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     data = {
    #       folder: 'new-user-folder',
    #       object_type: 'contacts'
    #     }
    #     @data = @mints_user->create_user_folder($data);
    public function create_user_folder($data) {
        return $this->client->raw('post', '/helpers/folders', null, $data);
    }

    # === Update user folder.
    # Update an user folder info.
    #
    # ==== Parameters
    # id:: (Integer) -- User folder id.
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     data = {
    #       folder:'new-user-folder-modifier',
    #       object_type:'contact'
    #     }
    #     @data = @mints_user->update_user_folder(289, $data);
    public function update_user_folder($id, $data) {
        return $this->client->raw('put', "/helpers/folders/{$id}", null, $data);
    }

    # === Delete user folder.
    # Delete an user folder.
    #
    # ==== Parameters
    # id:: (Integer) -- User folder id.
    #
    # ==== Example
    #     @data = @mints_user->delete_user_folder(289);
    public function delete_user_folder($id) {
        return $this->client->raw('delete', "/helpers/folders/{$id}");
    }
}