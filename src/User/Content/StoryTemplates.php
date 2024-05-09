<?php
namespace Mints\User\Content;
use Mints\MintsHelper;

trait StoryTemplates
{
    /**
     * Get support data of story template.
     * Get support data used in a story template.
     *
     * Parameters:
     * $id (int) -- Story template id.
     *
     * Example:
     * $data = $this->getStoryTemplateSupportData(1);
     */
    public function getStoryTemplateSupportData($id)
    {
        return $this->client->raw('get', "/content/story-templates/support-data/stories/{$id}");
    }

    /**
     * Get support data of story templates.
     * Get support data used in story templates.
     *
     * Example:
     * $data = $this->getStoryTemplatesSupportData();
     */
    public function getStoryTemplatesSupportData()
    {
        return $this->client->raw('get', '/content/story-templates/support-data');
    }

    /**
     * Get story templates.
     * Get a collection of story templates.
     *
     * Parameters:
     * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
     *
     * First Example:
     * $data = $this->getStoryTemplates();
     *
     * Second Example:
     * $options = ['fields' => 'id, title'];
     * $data = $this->getStoryTemplates($options);
     */
    public function getStoryTemplates($options = null)
    {
        return $this->client->raw('get', '/content/story-templates', $options);
    }

    /**
     * Get story template.
     * Get a story template info.
     *
     * Parameters:
     * $id (int) -- Story template id.
     * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
     *
     * First Example:
     * $data = $this->getStoryTemplate(2);
     *
     * Second Example:
     * $options = ['fields' => 'title'];
     * $data = $this->getStoryTemplate(1, $options);
     */
    public function getStoryTemplate($id, $options = null)
    {
        return $this->client->raw('get', "/content/story-templates/{$id}", $options);
    }

    /**
     * Create story template.
     * Create a story template with data.
     *
     * Parameters:
     * $data (array) -- Data to be submitted.
     * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
     *
     * Example:
     * $data = ['title' => 'New Story Template', 'slug' => 'new-story-template-slug'];
     * $data = $this->createStoryTemplate($data);
     */
    public function createStoryTemplate($data, $options = null)
    {
        return $this->client->raw('post', '/content/story-templates', $options, $this->dataTransform($data));
    }

    /**
     * Update story template.
     * Update a story template info.
     *
     * Parameters:
     * $id (int) -- Story template id.
     * $data (array) -- Data to be submitted.
     *
     * Example:
     * $data = ['title' => 'New Story Template Modified'];
     * $data = $this->updateStoryTemplate(3, $data);
     */
    public function updateStoryTemplate($id, $data)
    {
        return $this->client->raw('put', "/content/story-templates/{$id}", null, $this->dataTransform($data));
    }
}