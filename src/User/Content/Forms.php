<?php
namespace Mints\User\Content;
trait Forms
{
    /**
     * Get forms.
     * Get a collection of forms.
     *
     * Parameters:
     * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
     *
     * First Example:
     * $data = $this->getForms();
     *
     * Second Example:
     * $options = ['sort' => 'id', 'fields' => 'title'];
     * $data = $this->getForms($options);
     */
    public function getForms($options = null)
    {
        return $this->client->raw('get', '/content/forms', $options);
    }

    /**
     * Publish form.
     * Publish a form.
     *
     * Parameters:
     * $id (int) -- Form id.
     * $data (array) -- Data to be submitted.
     *
     * Example:
     * $data = ['slug' => 'new-publish'];
     * $data = $this->publishForm(1, $data);
     */
    public function publishForm($id, $data)
    {
        // FIXME: Output cannot be processed. response cannot be converted to json.
        return $this->client->raw('put', "/content/forms/{$id}/publish", null, $this->dataTransform($data));
    }

    /**
     * Schedule form.
     * Schedule a form in a specified date.
     *
     * Parameters:
     * $id (int) -- Form id.
     * $data (array) -- Data to be submitted.
     *
     * Example:
     * $data = ['scheduled_at' => '2021-09-06T20:29:16+00:00'];
     * $data = $this->scheduleForm(1, $data);
     */
    public function scheduleForm($id, $data)
    {
        // FIXME: Output cannot be processed. response cannot be converted to json.
        return $this->client->raw('put', "/content/forms/{$id}/schedule", null, $this->dataTransform($data));
    }

    /**
     * Revert published form.
     * Revert a published form.
     *
     * Parameters:
     * $id (int) -- Form id.
     *
     * Example:
     * $data = $this->revertPublishedForm(1);
     */
    public function revertPublishedForm($id)
    {
        return $this->client->raw('get', "/content/forms/{$id}/revert-published-data");
    }

    /**
     * Duplicate form.
     * Duplicate a form.
     *
     * Parameters:
     * $id (int) -- Form id.
     *
     * Example:
     * $data = $this->duplicateForm(3);
     */
    public function duplicateForm($id)
    {
        return $this->client->raw('post', "/content/forms/{$id}/duplicate");
    }

    /**
     * Get activation words form.
     * Get activation words a form.
     *
     * Parameters:
     * $id (int) -- Form id.
     *
     * Example:
     * $data = $this->getFormActivationWords(3);
     */
    public function getFormActivationWords($id)
    {
        return $this->client->raw('post', "/content/forms/{$id}/activation-words");
    }

    /**
     * Get form support data.
     * Get form support data.
     *
     * Example:
     * $data = $this->getFormSupportData();
     */
    public function getFormSupportData()
    {
        return $this->client->raw('get', '/content/forms/support-data');
    }

    /**
     * Get form submissions.
     * Get form submissions.
     *
     * Parameters:
     * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
     *
     * First Example:
     * $data = $this->getFormSubmissions();
     *
     * Second Example:
     * $options = ['fields' => 'id'];
     * $data = $this->getFormSubmissions($options);
     */
    public function getFormSubmissions($options = null)
    {
        return $this->client->raw('get', '/content/forms/submissions', $options);
    }

    /**
     * Get form submission.
     * Get form submission.
     *
     * Parameters:
     * $id (int) -- Form submission id.
     * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
     *
     * First Example:
     * $data = $this->getFormSubmission(1);
     *
     * Second Example:
     * $options = ['fields' => 'id'];
     * $data = $this->getFormSubmission(1, $options);
     */
    public function getFormSubmission($id, $options)
    {
        return $this->client->raw('get', "/content/forms/submissions/{$id}", $options);
    }

    /**
     * Delete form submission.
     * Delete a form submission.
     *
     * Parameters:
     * $id (int) -- Form submission id.
     *
     * Example:
     * $data = $this->deleteFormSubmission(1);
     */
    public function deleteFormSubmission($id)
    {
        return $this->client->raw('delete', "/content/forms/submissions/{$id}");
    }

    /**
     * Get form.
     * Get a form info.
     *
     * Parameters:
     * $id (int) -- Form id.
     * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
     *
     * First Example:
     * $data = $this->getForm(9);
     *
     * Second Example:
     * $options = ['sort' => 'id', 'fields' => 'title'];
     * $data = $this->getForm(2, $options);
     */
    public function getForm($id, $options = null)
    {
        return $this->client->raw('get', "/content/forms/{$id}", $options);
    }

    /**
     * Create form.
     * Create a form with data.
     *
     * Parameters:
     * $data (array) -- Data to be submitted.
     *
     * Example:
     * $data = ['title' => 'New Form', 'slug' => 'new-form-slug'];
     * $data = $this->createForm($data);
     */
    public function createForm($data, $options = null)
    {
        return $this->client->raw('post', '/content/forms', $options, $this->dataTransform($data));
    }

    /**
     * Update form.
     * Update a form info.
     *
     * Parameters:
     * $id (int) -- Form id.
     * $data (array) -- Data to be submitted.
     *
     * Example:
     * $data = ['title' => 'New Form Modified', 'slug' => 'new-form-slug'];
     * $data = $this->updateForm(3, $data);
     */
    public function updateForm($id, $data, $options = null)
    {
        return $this->client->raw('put', "/content/forms/{$id}", $options, $this->dataTransform($data));
    }

    /**
     * Delete form.
     * Delete a form.
     *
     * Parameters:
     * $id (int) -- Form id.
     *
     * Example:
     * $data = $this->deleteForm(9);
     */
    public function deleteForm($id)
    {
        return $this->client->raw('delete', "/content/forms/{$id}");
    }

    /**
     * Get form aggregates.
     * Get a form aggregates info.
     *
     * Parameters:
     * $id (int) -- Form id.
     * $object_id (int) -- Object id.
     *
     * First Example:
     * $data = $this->getFormAggregates(1, 1);
     */
    public function getFormAggregates($id, $object_id)
    {
        return $this->client->raw('get', "/content/forms/{$id}/aggregates?object_id={$object_id}", $options);
    }

    /**
     * Reset aggregates.
     *
     * Parameters:
     * $data (array) -- Data to be submitted.
     *
     * Example:
     * $data = ['object_id' => 1];
     * $data = $this->resetFormAggregates($data);
     */
    public function resetFormAggregates($data)
    {
        return $this->client->raw('post', "/content/forms/{$id}/aggregates", null, $this->dataTransform($data));
    }
}