<?php
namespace Mints\User\Content;
trait Pages
{
    /**
     * Get page groups.
     * Get content page groups.
     *
     * Example:
     * $data = $this->getPageGroups();
     */
    public function getPageGroups()
    {
        return $this->client->raw('get', '/content/pages/groups');
    }

    /**
     * Get pages.
     * Get a collection of content pages.
     *
     * Parameters:
     * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
     *
     * Example:
     * $data = $this->getPages();
     */
    public function getPages($options = null)
    {
        return $this->client->raw('get', '/content/pages', $options);
    }

    /**
     * Get bundles.
     * Get a collection of content pages.
     *
     * Parameters:
     * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
     *
     * Example:
     * $data = $this->getPages();
     */
    public function getBundles($options = null)
    {
        return $this->client->raw('get', '/content/pages', $options);
    }

    /**
     * Get page.
     * Get a content page.
     *
     * Parameters:
     * $id (int) -- Page id.
     *
     * Example:
     * $data = $this->getPage(1);
     */
    public function getPage($id)
    {
        return $this->client->raw('get', "/content/pages/{$id}");
    }

    /**
     * Create page.
     * Create a content page with data.
     *
     * Parameters:
     * $data (array) -- Data to be submitted.
     *
     * Example:
     * $data = ['title' => "New Page", 'slug' => "new-page-slug", 'description' => "New page description"];
     * $data = $this->createPage($data);
     */
    public function createPage($data)
    {
        return $this->client->raw('post', '/content/pages', null, $this->dataTransform($data));
    }

    /**
     * Update page.
     * Update a content page info.
     *
     * Parameters:
     * $id (int) -- Page id.
     * $data (array) -- Data to be submitted.
     *
     * Example:
     * $data = ['title' => "New Page Modified"];
     * $data = $this->updatePage(5, $data);
     */
    public function updatePage($id, $data)
    {
        return $this->client->raw('put', "/content/pages/{$id}", null, $data);
    }

    /**
     * Delete page.
     * Delete a content page.
     *
     * Parameters:
     * $id (int) -- Page id.
     *
     * Example:
     * $this->deletePage(3);
     */
    public function deletePage($id)
    {
        return $this->client->raw('delete', "/content/pages/{$id}");
    }
}