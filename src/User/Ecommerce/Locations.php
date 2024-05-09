<?php
namespace Mints\User\Ecommerce;
use Mints\MintsHelper;

trait Locations {
    ##
    # == Locations
    #

    # === Get locations.
    # Get a collection of locations.
    #
    # ==== Parameters
    # use_post:: (Boolean) -- Variable to determine if the request is by 'post' or 'get' functions.
    #
    # ==== First Example
    #     $data = $mintsUser->getLocations();
    #
    # ==== Second Example
    #     $options = [
    #       'fields' => 'id, title'
    #     ];
    #     $data = $mintsUser->getLocations($options);
    public function getLocations($options = null, $use_post = true) {
        return MintsHelper::getQueryResults($this->client, '/ecommerce/locations', $options, $use_post);
    }

    # === Get location.
    # Get a location info.
    #
    # ==== Parameters
    # id:: (Integer) -- Location id.
    #
    # ==== Example
    #     $data = $mintsUser->getLocation(2);
    public function getLocation($id, $options = null) {
        return $this->client->raw('get', "/ecommerce/locations/{$id}", $options);
    }

    # === Create location.
    # Create a location with data.
    #
    # ==== Parameters
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     $data = [
    #       'title' => 'New Location',
    #       'location_template_id' => 1
    #     ];
    #     $data = $mintsUser->createLocation($data);
    public function createLocation($data, $options = null) {
        return $this->client->raw('post', '/ecommerce/locations', $options, $this->dataTransform($data));
    }

    # === Update location.
    # Update a location info.
    #
    # ==== Parameters
    # id:: (Integer) -- Location id.
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     $data = [
    #       'title' => 'New Location Modified'
    #     ];
    #     $data = $mintsUser->updateLocation(5, $data);
    public function updateLocation($id, $data, $options = null) {
        return $this->client->raw('put', "/ecommerce/locations/{$id}", $options, $this->dataTransform($data));
    }

    # === Delete location.
    # Delete a location.
    #
    # ==== Parameters
    # id:: (Integer) -- Location id.
    #
    # ==== Example
    #     $data = $mintsUser->deleteLocation(5);
    public function deleteLocation($id) {
        return $this->client->raw('delete', "/ecommerce/locations/{$id}");
    }

    ##
    # == Locations Templates
    #

    # === Get location template support data.
    # Get support data used in a location template.
    #
    # ==== Parameters
    # id:: (Integer) -- Location template id.
    #
    # ==== Example
    #     $data = $mintsUser->getLocationTemplateSupportData(1);
    public function getLocationTemplateSupportData($id) {
        return $this->client->raw('get', "/ecommerce/location-templates/{$id}/support-data");
    }

    # === Get location templates support data.
    # Get support data used in location templates.
    #
    # ==== Example
    #     $data = $mintsUser->getLocationTemplatesSupportData();
    public function getLocationTemplatesSupportData() {
        return $this->client->raw('get', '/ecommerce/location-templates/support-data');
    }

    # === Get location templates.
    # Get a collection of location templates.
    #
    # ==== Parameters
    # options:: (Hash) -- List of Resource Collection Options shown above can be used as parameter.
    #
    # ==== First Example
    #     $data = $mintsUser->getLocationTemplates();
    #
    # ==== Second Example
    #     $options = [ 'fields' => 'title' ];
    #     $data = $mintsUser->getLocationTemplates($options);
    public function getLocationTemplates($options = null) {
        return $this->client->raw('get', '/ecommerce/location-templates', $options);
    }

    # === Get location template.
    # Get a location template info.
    #
    # ==== Parameters
    # id:: (Integer) -- Location template id.
    # options:: (Hash) -- List of Resource Collection Options shown above can be used as parameter.
    #
    # ==== First Example
    #     $data = $mintsUser->getLocationTemplate(1);
    #
    # ==== Second Example
    #     $options = [ 'fields' => 'title' ];
    #     $data = $mintsUser->getLocationTemplate(1, $options);
    public function getLocationTemplate($id, $options = null) {
        return $this->client->raw('get', "/ecommerce/location-templates/{$id}", $options);
    }

    # === Create location template.
    # Create a location template with data.
    #
    # ==== Parameters
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     $data = [
    #       'title' => 'New Location Template',
    #       'slug' => 'new-location-template'
    #     ];
    #     $data = $mintsUser->createLocationTemplate($data);
    public function createLocationTemplate($data) {
        return $this->client->raw('post', '/ecommerce/location-templates', null, $this->dataTransform($data));
    }

    # === Update location template.
    # Update a location template info.
    #
    # ==== Parameters
    # id:: (Integer) -- Location template id.
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     $data = [
    #       'title' => 'New Location Template Modified'
    #     ];
    #     $data = $mintsUser->updateLocationTemplate(3, $data);
    public function updateLocationTemplate($id, $data) {
        return $this->client->raw('put', "/ecommerce/location-templates/{$id}", null, $this->dataTransform($data));
    }
}

