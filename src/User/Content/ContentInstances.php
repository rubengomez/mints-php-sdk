<?php
namespace Mints\User\Content;
trait ContentInstances
{
    /**
     * Get content instances.
     * Get a collection of content instances.
     *
     * Parameters:
     * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
     *
     * First Example
     * $data = $this->getContentInstances();
     *
     * Second Example
     * $options = ['fields' => 'id'];
     * $data = $this->getContentInstances($options);
     */
    public function getContentInstances($options = null)
    {
        return $this->client->raw('get', '/content/instances', $options);
    }

    /**
     * Duplicate content instance.
     * Duplicate a content instance.
     *
     * Parameters:
     * $id (int) -- Content instance id.
     * $data (array) -- Data to be submitted.
     *
     * Example
     * $data = ['options' => []];
     * $data = $this->duplicateContentInstance(1, json_encode($data));
     */
    public function duplicateContentInstance($id, $data)
    {
        return $this->client->raw('post', "/content/instances/{$id}/duplicate", null, $data);
    }

    /**
     * Get content instance.
     * Get a content instance info.
     *
     * Parameters:
     * $id (int) -- Content instance id.
     * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
     *
     * First Example
     * $data = $this->getContentInstance(1);
     *
     * Second Example
     * $options = ['fields' => 'id, title'];
     * $data = $this->getContentInstance(1, $options);
     */
    public function getContentInstance($id, $options = null)
    {
        return $this->client->raw('get', "/content/instances/{$id}", $options);
    }

    /**
     * Publish content instance.
     * Publish a content instance.
     *
     * Parameters:
     * $id (int) -- Content instance id.
     * $data (array) -- Data to be submitted.
     *
     * Example
     * $data = [
     *     'title' => 'New publish',
     *     'slug' => 'new-publish',
     *     'content_template_id' => 1
     * ];
     * $data = $this->publishContentInstance(2, $data);
     */
    public function publishContentInstance($id, $data)
    {
        return $this->client->raw('put', "/content/instances/{$id}/publish", null, $this->dataTransform($data));
    }

    /**
     * Schedule content instance.
     * Schedule a content instance in a specified date.
     *
     * Parameters:
     * $id (int) -- Content instance id.
     * $data (array) -- Data to be submitted.
     *
     * Example
     * $data = ['scheduled_at' => '2021-09-06T20:29:16+00:00'];
     * $data = $this->scheduleContentInstance(1, $data);
     */
    public function scheduleContentInstance($id, $data)
    {
        return $this->client->raw('put', "/content/instances/{$id}/schedule", null, $this->dataTransform($data));
    }

    /**
     * Revert published content instance.
     * Revert a published content instance.
     *
     * Parameters:
     * $id (int) -- Content instance id.
     *
     * Example
     * $data = $this->revertPublishedContentInstance(1);
     */
    public function revertPublishedContentInstance($id)
    {
        return $this->client->raw('get', "/content/instances/{$id}/revert-published-data");
    }

    /**
     * Create content instance.
     * Create a content instance with data.
     *
     * Parameters:
     * $data (array) -- Data to be submitted.
     *
     * Example
     * $data = [
     *     'title' => 'New Content Instance',
     *     'content_template_id' => 1,
     *     'slug' => 'new-content-instance-slug'
     * ];
     * $data = $this->createContentInstance($data);
     */
    public function createContentInstance($data)
    {
        return $this->client->raw('post', '/content/instances', null, $this->dataTransform($data));
    }

    /**
     * Update content instance.
     * Update a content instance info.
     *
     * Parameters:
     * $id (int) -- Content instance id.
     * $data (array) -- Data to be submitted.
     *
     * Example
     * $data = [
     *     'title' => "New Content Instance Modified",
     *     'content_template_id' => 1,
     *     'slug' => "new-content-instance-slug"
     * ];
     * $data = $this->updateContentInstance(18, $data);
     */
    public function updateContentInstance($id, $data)
    {
        return $this->client->raw('put', "/content/instances/{$id}", null, $this->dataTransform($data));
    }

    /**
     * Delete content instance.
     * Delete a content instance.
     *
     * Parameters:
     * $id (int) -- Content instance id.
     *
     * Example
     * $data = $this->deleteContentInstance(20);
     */
    public function deleteContentInstance($id)
    {
        return $this->client->raw('delete', "/content/instances/{$id}");
    }
}