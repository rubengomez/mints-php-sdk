<?php
namespace Mints\User\Content;
use Mints\MintsHelper;

trait StoryVersions
{
    /**
     * Get story versions.
     * Get a collection of story versions.
     *
     * Parameters:
     * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
     * $use_post (bool) -- Variable to determine if the request is by 'post' or 'get' functions.
     *
     * First Example:
     * $data = $this->getStoryVersions();
     *
     * Second Example:
     * $options = ['fields' => 'id, title'];
     * $data = $this->getStoryVersions($options);
     *
     * Third Example:
     * $options = ['fields' => 'id, title'];
     * $data = $this->getStoryVersions($options, true);
     */
    public function getStoryVersions($options = null, $use_post = true)
    {
        return MintsHelper::getQueryResults($this->client, '/content/story-versions', $options, $use_post);
    }

    /**
     * Get story version.
     * Get a story version info.
     *
     * Parameters:
     * $id (int) -- Story version id.
     * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
     *
     * First Example:
     * $data = $this->getStoryVersion(1);
     *
     * Second Example:
     * $options = ['fields' => 'id, title'];
     * $data = $this->getStoryVersion(1, $options);
     */
    public function getStoryVersion($id, $options = null)
    {
        return $this->client->raw('get', "/content/story-versions/{$id}", $options);
    }

    /**
     * Create story version.
     * Create a story version with data.
     *
     * Parameters:
     * $data (array) -- Data to be submitted.
     * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
     *
     * Example:
     * $data = ['title' => 'New Story', 'slug' => 'new-story', 'social_metadata' => 'social metadata'];
     * $data = $this->createStoryVersion($data);
     */
    public function createStoryVersion($data, $options = null)
    {
        return $this->client->raw('post', '/content/story-versions', $options, $this->dataTransform($data));
    }

    /**
     * Update story version.
     * Update a story version info.
     *
     * Parameters:
     * $id (int) -- Story version id.
     * $data (array) -- Data to be submitted.
     * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
     *
     * Example:
     * $data = ['title' => 'New Story Modified', 'slug' => 'new-story'];
     * $data = $this->updateStoryVersion(5, $data);
     */
    public function updateStoryVersion($id, $data, $options = null)
    {
        return $this->client->raw('put', "/content/story-versions/{$id}", $options, $this->dataTransform($data));
    }

    /**
     * Delete story version.
     * Delete a story version.
     *
     * Parameters:
     * $id (int) -- Story version id.
     *
     * Example:
     * $data = $this->deleteStoryVersion(6);
     */
    public function deleteStoryVersion($id)
    {
        return $this->client->raw('delete', "/content/story-versions/{$id}");
    }

    /**
     * Duplicate story version.
     * Duplicate a story version.
     *
     * Parameters:
     * $id (int) -- Story version id.
     * $data (array) -- Data to be submitted.
     *
     * Example:
     * $data = ['options' => []];
     * $data = $this->duplicateStoryVersion(1, $data);
     */
    public function duplicateStoryVersion($id, $data)
    {
        return $this->client->raw('post', "/content/story-versions/{$id}/duplicate", null, $data);
    }

    /**
     * Publish story version.
     * Publish a story version.
     *
     * Parameters:
     * $id (int) -- Story version id.
     * $data (array) -- Data to be submitted.
     *
     * Example:
     * $data = ['title' => 'New Story Modified', 'slug' => 'new-story'];
     * $data = $this->publishStoryVersion(1, $data);
     */
    public function publishStoryVersion($id, $data)
    {
        return $this->client->raw('put', "/content/story-versions/{$id}/publish", null, $data);
    }
}