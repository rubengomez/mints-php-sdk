<?php

namespace Mints\User\Helpers;
trait Helpers {
    use ObjectActivities;
    use ObjectFolders;
    use UserFolders;

    ##
    # == Helpers
    #

    # === Slugify.
    # Slugify a text using an object type.
    #
    # ==== Parameters
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #
    public function slugify($data) {
        // TODO: Research use of variable polymorphicObjectType
        return $this->client->raw('post', '/helpers/slugify', null, $this->data_transform($data));
    }

    # === Get available types from usage.
    # Get available types by usage.
    #
    # ==== Parameters
    # usage:: () -- ...
    #
    public function get_available_types_from_usage($usage) {
        // TODO: Research use
        return $this->client->raw('get', "/helpers/available-types/{$usage}");
    }

    # === Get magic link config.
    # Get config used in magic links.
    #
    # ==== Example
    #     @data = @mints_user->get_magic_link_config();
    public function get_magic_link_config() {
        return $this->client->raw('get', '/helpers/magic-link-config');
    }

    ##
    # == Activities
    #

    # === Get activities by object type and id.
    # Get activities using an object type and object type id.
    #
    # ==== Parameters
    # object_type:: (String) -- Object type.
    # id:: (Integer) -- Object type id.
    #
    # ==== Example
    #     @data = @mints_user->get_activities_by_object_type_and_id('contacts', 1);
    public function get_activities_by_object_type_and_id($object_type, $id) {
        return $this->client->raw('get', "/helpers/activities/{$object_type}/{$id}");
    }

    ##
    # == Dice Coefficient
    #

    # === Get dice coefficient.
    # Get dice coefficient.
    #
    # ==== Parameters
    # options:: (Hash) -- List of Resource Collection Options shown above can be used as parameter.
    #
    # ==== Example
    #     options = {
    #       table: 'contacts',
    #       field: 'id',
    #       word: '1'
    #     }
    #     @data = @mints_user->get_dice_coefficient($options);
    public function get_dice_coefficient($options) {
        return $this->client->raw('get', '/helpers/dice-coefficient', $options);
    }

    ##
    # == Permission
    #

    # === Get permission menu.
    # Get permission menu.
    #
    # ==== Example
    #     @data = @mints_user->get_permission_menu();
    public function get_permission_menu() {
        return $this->client->raw('get', '/helpers/menu');
    }

    ##
    # == Seed
    #

    # === Generate seed.
    # Generate seed using object type and object type id.
    #
    # ==== Parameters
    # objectType:: (String) -- Object type.
    # id:: (Integer) -- Object type id.
    #
    # ==== Example
    #     @data = @mints_user->generate_seed('contacts', 1);
    public function generate_seed($object_type, $id) {
        return $this->client->raw('get', "/helpers/seeds/{$object_type}/{$id}");
    }
}
