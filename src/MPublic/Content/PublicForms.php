<?php

namespace Mints\MPublic\Content;
trait PublicForms
{
    /**
     * Get Forms.
     * Get a collection of forms.
     *
     * @param array|null $options
     * @return mixed
     * @throws \Exception
     */
    public function getForms($options = null)
    {
        return $this->client->raw('get', '/content/forms', $options);
    }

    /**
     * Get Form.
     * Get a single form.
     *
     * @param string $slug It's the string identifier generated by Mints.
     * @param array|null $options
     * @return mixed
     * @throws \Exception
     */
    public function getForm($slug, $options = null)
    {
        return $this->client->raw('get', "/content/forms/{$slug}", $options);
    }

    /**
     * Submit Form.
     * Submit a form with data.
     *
     * @param array $data Data to be submitted.
     * @return mixed
     * @throws \Exception
     */
    public function submitForm($data)
    {
        return $this->client->raw('post', '/content/forms/submit', null, $this->dataTransform($data));
    }
}