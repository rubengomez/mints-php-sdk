<?php
namespace Mints\User\Content;
use Mints\MintsHelper;

trait Assets {

  /**
   * Get assets.
   * Get a collection of assets.
   *
   * Parameters:
   * $options (array|null) -- List of Resource Collection Options shown above can be used as parameter.
   * $use_post (bool) -- Variable to determine if the request is by 'post' or 'get' functions.
   *
   * First Example:
   * $data = $mintsUser->getAssets();
   *
   * Second Example:
   * $options = ['fields' => 'id, title'];
   * $data = $mintsUser->getAssets($options);
   *
   * Third Example:
   * $options = ['fields' => 'id, title'];
   * $data = $mintsUser->getAssets($options, true);
   */
  public function getAssets($options = null, $use_post = true) {
    return MintsHelper::getQueryResults($this->client, '/content/assets', $options, $use_post);
  }

  /**
   * Get asset.
   * Get an asset info.
   *
   * Parameters:
   * $id (int) -- Asset id.
   * $options (array|null) -- List of Resource Collection Options shown above can be used as parameter.
   *
   * First Example:
   * $data = $mintsUser->getAsset(1);
   *
   * Second Example:
   * $options = ['fields' => 'id, title'];
   * $data = $mintsUser->getAsset(1, $options);
   */
  public function getAsset($id, $options = null) {
    return $this->client->raw('get', "/content/assets/{$id}", $options);
  }

  /**
   * Create asset.
   * Create an asset with data.
   *
   * Parameters:
   * $data (array) -- Data to be submitted.
   *
   * Example:
   * $data = [
   *     'title' => 'New Asset',
   *     'slug' => 'new-asset',
   * ];
   * $data = $mintsUser->createAsset($data);
   */
  public function createAsset($data) {
    return $this->client->raw('post', '/content/assets', null, $this->dataTransform($data));
  }

  /**
   * Update asset.
   * Update an asset info.
   *
   * Parameters:
   * $id (int) -- Asset id.
   * $data (array) -- Data to be submitted.
   *
   * Example:
   * $data = [
   *     'title' => 'New Asset Modified',
   *     'slug' => 'new-asset'
   * ];
   * $data = $mintsUser->updateAsset(5, $data);
   */
  public function updateAsset($id, $data) {
    return $this->client->raw('put', "/content/assets/{$id}", null, $this->dataTransform($data));
  }

  /**
   * Delete asset.
   * Delete an asset.
   *
   * Parameters:
   * $id (int) -- Asset id.
   *
   * Example:
   * $data = $mintsUser->deleteAsset(6);
   */
  public function deleteAsset($id) {
    return $this->client->raw('delete', "/content/assets/{$id}");
  }

  /**
   * Get asset link info.
   * Get information of an asset by url.
   *
   * Parameters:
   * $data (array) -- Data to be submitted.
   *
   * Example:
   * $data = ['link' => 'https://www.example.com/img/img.jpg'];
   * $data = $mintsUser->getAssetLinkInfo(json_encode($data));
   */
  public function getAssetLinkInfo($data) {
    return $this->client->raw('post', '/content/assets/getLinkInfo', null, $data);
  }

  /**
   * Download asset.
   * Get information of an asset.
   *
   * Parameters:
   * $id (int) -- Asset id.
   *
   * Example:
   * $data = $mintsUser->downloadAsset(2);
   */
  public function downloadAsset($id) {
    // FIXME: File not found at path, error in result but method works
    return $this->client->raw('get', "/content/assets/download/{$id}");
  }

  /**
   * Get asset thumbnails.
   *
   * Parameters:
   * $id (int) -- Asset id.
   *
   * Example:
   * $data = $mintsUser->getAssetThumbnails(2);
   */
  public function getAssetThumbnails($id) {
    // FIXME: Returns json invalid token
    return $this->client->raw('get', "/content/assets/thumbnails/{$id}");
  }

  /**
   * Get asset usage.
   * Get usage of an asset.
   *
   * Parameters:
   * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
   */
  public function getAssetUsage($options) {
    return $this->client->raw('get', '/content/assets/usage', $options);
  }

  /**
   * Get asset info.
   * Get info of an asset.
   * TODO: Research if is an asset or many assets
   *
   * Parameters:
   * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
   */
  public function getAssetInfo($options) {
    return $this->client->raw('get', '/content/assets/getAssetInfo', $options);
  }

  /**
   * Get asset doc types.
   * Get doc types of assets.
   */
  public function getAssetDocTypes() {
    return $this->client->raw('get', '/content/assets/docTypes');
  }

  /**
   * Get asset public route.
   * Get public route of assets.
   */
  public function getAssetPublicRoute() {
    return $this->client->raw('get', '/content/assets/publicRoute');
  }

  /**
   * Upload asset.
   * Upload an asset. It can be images, documents and videos.
   *
   * Parameters:
   * $data (array) -- Data to be submitted.
   *
   * First Example (with files)
   *
   * Second Example (with urls)
   * $data = [
   *     'title' => 'asset title',
   *     'description' => 'asset description',
   *     'link' => 'https://link/example',
   *     'url-type' => 'url-image',
   *     'slug' => 'slug',
   *     'type' => 'link',
   *     'father_id' => 1
   * ];
   * $data = $mintsUser->uploadAsset(json_encode($data));
   *
   * Third Example (with video)
   * $data = [
   *     'title' => 'Video Title',
   *     'fileType' => 'video/mp4',
   *     'type' => 'video',
   *     'slug' => 'video-slug',
   *     'status' => 'not-uploaded',
   *     'ext' => 'mp4',
   *     'size' => 29605264,
   *     'access_token' => 'access_token',
   *     'name' => 'Video Title',
   *     'videoData' => [
   *         'id' => 80313307,
   *         'name' => 'Video Title',
   *         'type' => 'video',
   *         'created' => '2021-10-19T19:18:17+00:00',
   *         'updated' => '2021-10-19T19:18:17+00:00',
   *         'duration' => 191.936133,
   *         'hashed_id' => 'hashed_id',
   *         'progress' => 0.14285714285714285,
   *         'status' => 'queued',
   *         'thumbnail' => [
   *             'url' => 'https://www.example.com/img/img.jpg',
   *             'width' => 200,
   *             'height' => 120
   *         ],
   *         'account_id' => 1234567
   *     ]
   * ];
   * $data = $mintsUser->uploadAsset(json_encode($data));
   */
  public function uploadAsset($data) {
    // TODO: Research a way to upload a File across sdk
    return $this->client->raw('post', '/content/assets/upload', null, $data);
  }

  /**
   * Get asset sizes.
   * Get a collection of sizes of an asset.
   *
   * Parameters:
   * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
   * FIXME: Double get asset sizes method!
   */
  public function getAssetSizes($options) {
    return $this->client->raw('get', '/content/assets/sizes', $options);
  }

  /**
   * Get asset size.
   * Get sizes of an asset.
   *
   * Parameters:
   * $id (int) Asset id.
   *
   * Example:
   * $data = $mintsUser->getAssetSize(2);
   */
  public function getAssetSize($id) {
    // FIXME: wrong number of arguments (given 1, expected 0)
    return $this->client->raw('get', "/content/assets/sizes/{$id}");
  }

  /**
   * Create asset size.
   * Create an asset size by data.
   *
   * Parameters:
   * $data (array) -- Data to be submitted.
   *
   * Example:
   * $data = [
   *     'aspectRadio' => 'custom',
   *     'assetId' => 23,
   *     'drawPosData' => [
   *         'pos' => [
   *             'sx' => 100,
   *             'sy' => 100,
   *             'swidth' => 200,
   *             'sheight' => 200
   *         ]
   *     ],
   *     'width' => 100,
   *     'height' => 100,
   *     'slug' => 'fuji_size_slug',
   *     'title' => 'fuji_size',
   *     'variationId' => 'original'
   * ];
   * $data = $mintsUser->createAssetSize(json_encode($data));
   */
  public function createAssetSize($data) {
    return $this->client->raw('post', '/content/assets/sizes', null, $data);
  }

  /**
   * Get asset variation.
   * Get variation of an asset.
   *
   * Parameters:
   * $id (int) Asset variation id.
   *
   * Example:
   * $data = $mintsUser->getAssetSizes(2);
   * TODO: Research if is an asset id or an variation id
   */
  public function getAssetVariation($id) {
    // FIXME: Id 1 and 4: Trying to get property 'path' of non-object maybe json conversion is bad
    // FIXME: Id 2 and 3: File not found at path maybe doesnt exist
    return $this->client->raw('get', "/content/assets/variation/{$id}");
  }

  /**
   * Generate asset variation.
   * Create an asset variation of an existing asset.
   *
   * Parameters:
   * $data (array) -- Data to be submitted.
   */
  public function generateAssetVariation($data) {
    // FIXME: Trying to get property 'width' of non-object
    return $this->client->raw('post', '/content/assets/generate-asset-variations', null, $data);
  }
}