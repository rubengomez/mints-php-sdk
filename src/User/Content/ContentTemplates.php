<?php
namespace Mints\User\Content;
trait ContentTemplates
{
    /**
     * Get content template instances.
     * Get instances of a content template.
     *
     * Parameters:
     * $templateId (int) -- Template id.
     *
     * Example
     * $data = $this->getContentTemplateInstances(1);
     */
    public function getContentTemplateInstances($templateId)
    {
        return $this->client->raw('get', "/content/templates/{$templateId}/instances");
    }

    /**
     * Duplicate content template.
     * Duplicate a content template.
     *
     * Parameters:
     * $id (int) -- Content template id.
     *
     * Example
     * $data = $this->duplicateContentTemplate(1);
     */
    public function duplicateContentTemplate($id)
    {
        return $this->client->raw('post', "/content/templates/{$id}/duplicate/");
    }

    /**
     * Get content templates.
     * Get a collection of content templates.
     *
     * Parameters:
     * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
     *
     * First Example
     * $data = $this->getContentTemplates();
     *
     * Second Example
     * $options = ['sort' => 'title'];
     * $data = $this->getContentTemplates($options);
     */
    public function getContentTemplates($options = null)
    {
        return $this->client->raw('get', '/content/templates', $options);
    }

    /**
     * Get content template.
     * Get a content template.
     *
     * Parameters:
     * $id (int) -- Content template id.
     *
     * Example
     * $data = $this->getContentTemplate(1);
     */
    public function getContentTemplate($id)
    {
        return $this->client->raw('get', "/content/templates/{$id}");
    }

    /**
     * Create content template.
     * Create a content template with data.
     *
     * Parameters:
     * $data (array) -- Data to be submitted.
     *
     * Example
     * $data = [
     *     'template' => [
     *         'title' => 'New Content Template',
     *         'slug' => 'new-content-template-slug',
     *         'description' => 'New Content Template Description'
     *     ]
     * ];
     * $data = $this->createContentTemplate(json_encode($data));
     */
    public function createContentTemplate($data)
    {
        // TODO: Inform ContentTemplateController.store method has been modified
        return $this->client->raw('post', '/content/templates', null, $data);
    }

    /**
     * Update content template.
     * Update a content template info.
     *
     * Parameters:
     * $id (int) -- Content template id.
     * $data (array) -- Data to be submitted.
     *
     * Example
     * $data = [
     *     'template' => [
     *         'title' => 'New Content Template Modified',
     *         'slug' => 'new-content-template-slug',
     *         'description' => 'New Content Template Description'
     *     ]
     * ];
     * $data = $this->updateContentTemplate(7, json_encode($data));
     */
    public function updateContentTemplate($id, $data)
    {
        // TODO: Inform ContentTemplateController.update method has been modified
        return $this->client->raw('put', "/content/templates/{$id}", null, $data);
    }

    /**
     * Delete content template.
     * Delete a content template.
     *
     * Parameters:
     * $id (int) -- Content template id.
     *
     * Example
     * $data = $this->deleteContentTemplate(1);
     */
    public function deleteContentTemplate($id)
    {
        // TODO: Inform ContentTemplateController.destroy method has been modified
        return $this->client->raw('delete', "/content/templates/{$id}");
    }
}