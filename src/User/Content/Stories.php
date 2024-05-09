<?php
namespace Mints\User\Content;
use Mints\MintsHelper;

trait Stories
{
    /**
     * Duplicate story.
     * Duplicate a story.
     *
     * Parameters:
     * $id (int) -- Story id.
     * $data (array) -- Data to be submitted.
     *
     * Example:
     * $data = ['options' => []];
     * $data = $this->duplicateStory(1, $data);
     */
    public function duplicateStory($id, $data)
    {
        return $this->client->raw('post', "/content/stories/{$id}/duplicate", null, $data);
    }

    /**
     * Get stories.
     * Get a collection of stories.
     *
     * Parameters:
     * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
     * $use_post (bool) -- Variable to determine if the request is by 'post' or 'get' functions.
     *
     * First Example:
     * $data = $this->getStories();
     *
     * Second Example:
     * $options = ['fields' => 'id, slug'];
     * $data = $this->getStories($options);
     *
     * Third Example:
     * $options = ['fields' => 'id, slug'];
     * $data = $this->getStories($options, true);
     */
    public function getStories($options = null, $use_post = true)
    {
        return MintsHelper::getQueryResults($this->client, '/content/stories', $options, $use_post);
    }

    /**
     * Get story.
     * Get a story info.
     *
     * Parameters:
     * $id (int) -- Story id.
     * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
     *
     * First Example:
     * $data = $this->getStory(1);
     *
     * Second Example:
     * $options = ['fields' => 'id, slug'];
     * $data = $this->getStory(1, $options);
     */
    public function getStory($id, $options = null)
    {
        return $this->client->raw('get', "/content/stories/{$id}", $options);
    }

    /**
     * Create story.
     * Create a story with data.
     *
     * Parameters:
     * $data (array) -- Data to be submitted.
     * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
     *
     * Example:
     * $data = ['user_id' => 1, 'slug' => 'new-story', 'story_template_id' => 1];
     * $options = ['fields' => 'id, slug'];
     * $data = $this->createStory($data, $options);
     */
    public function createStory($data, $options = null)
    {
        return $this->client->raw('post', '/content/stories', $options, $this->dataTransform($data));
    }

    /**
     * Update story.
     * Update a story info.
     *
     * Parameters:
     * $id (int) -- Story id.
     * $data (array) -- Data to be submitted.
     * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
     *
     * Example:
     * $data = ['user_id' => 1, 'slug' => 'new-story'];
     * $data = $this->updateStory(5, $data);
     */
    public function updateStory($id, $data, $options = null)
    {
        return $this->client->raw('put', "/content/stories/{$id}", $options, $this->dataTransform($data));
    }

    /**
     * Delete story.
     * Delete a story.
     *
     * Parameters:
     * $id (int) -- Story id.
     *
     * Example:
     * $this->deleteStory(6);
     */
    public function deleteStory($id)
    {
        return $this->client->raw('delete', "/content/stories/{$id}");
    }
}