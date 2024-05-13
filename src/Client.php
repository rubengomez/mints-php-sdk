<?php

namespace Mints;

use Doctrine\Inflector\InflectorFactory;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\RequestOptions;
use Predis\Client as RedisClient;

class Client
{
    public $host;
    public $apiKey;
    public $scope;
    public $sessionToken;
    public $contactTokenId;
    public $visitId;
    public $debug;
    public $timeouts;
    public $baseURL;
    private $inflector;
    private $getHttpTimeout = 10;
    private $postHttpTimeout = 10;
    private $putHttpTimeout = 10;
    private $deleteHttpTimeout = 10;


    public function __construct($host, $apiKey, $scope = null, $sessionToken = null, $contactTokenId = null, $visitId = null, $debug = false, $timeouts = [])
    {
        $this->host = $host;
        $this->apiKey = $apiKey;
        $this->sessionToken = $sessionToken;
        $this->contactTokenId = $contactTokenId;
        $this->visitId = $visitId;
        $this->debug = $debug;
        $this->timeouts = $timeouts;
        $this->setScope($scope);
        $this->inflector = InflectorFactory::create()->build();
    }

    public function raw($action, $url, $options = null, $data = null, $baseUrl = null, $compatibilityOptions = [], $onlyTracking = false)
    {
        $baseUrl = $baseUrl ?: $this->baseURL;
        $methodCalled = debug_backtrace()[0]['function'];

        if ($this->isSingular($methodCalled) && ($url === "//" || is_null($url))) {
            throw new \Exception("Id must be a valid integer number, given URL: {$url}");
        }

        if (is_array($options)) {
            $needEncoding = ['jfilters', 'afilters', 'rfilters'];
            $foundOptionsWithEncoding = array_filter(array_keys($options), function ($key) use ($options, $needEncoding) {
                return in_array(strtolower($key), $needEncoding) && is_array($options[$key]);
            });

            foreach ($foundOptionsWithEncoding as $key) {
                $options[$key] = urlencode(base64_encode(json_encode($options[$key])));
            }

            $uri = http_build_query($options);
        }

        $fullUrl = $this->host . $baseUrl . $url . (isset($uri) ? "?{$uri}" : "");
        // Catch the exception if the file does not exist
//        try {
//            // read mints_config.yml from root directory, and parse it
//            $config = Yaml::parse(file_get_contents(realpath(__DIR__ . '/../') . "/mints_config.yml"));
//        } catch (\Exception $e) {
//            $config = null;
//        }

        $resultFromCache = false;
        $response = null;

        if ($action === 'get') {
            $urlNeedCache = false;

            if (isset($config) && $config['redis_cache']['use_cache']) {
                foreach ($config['redis_cache']['groups'] as $group) {
                    foreach ($group['urls'] as $groupUrl) {
                        if (preg_match("/{$groupUrl}/", $fullUrl)) {
                            $time = $group['time'];
                            $urlNeedCache = true;
                            $redisClient = new RedisClient([
                                'host' => $config['redis_cache']['redis_host'],
                                'port' => $config['redis_cache']['redis_port'] ?? 6379,
                                'db' => $config['redis_cache']['redis_db'] ?? 1,
                            ]);

                            $response = $redisClient->get($fullUrl);

                            if ($response) {
                                $resultFromCache = true;
                            } else {
                                $response = $this->httpRequest($action, $fullUrl, $this->setHeaders($compatibilityOptions), null);
                                $redisClient->setex($fullUrl, $time, $response);
                            }
                            break 2;
                        }
                    }
                }
            }

            if (!$urlNeedCache) {
                $response = $this->httpRequest($action, $fullUrl, $this->setHeaders($compatibilityOptions), null);
            }

        } elseif (in_array($action, ['create', 'post'])) {
            $response = $this->httpRequest('POST', $fullUrl, $this->setHeaders($compatibilityOptions), $data);
        } elseif (in_array($action, ['put', 'patch', 'update'])) {
            $response = $this->httpRequest('PUT', $fullUrl, $this->setHeaders($compatibilityOptions), $data);
        } elseif (in_array($action, ['delete', 'destroy'])) {
            $response = $this->httpRequest('DELETE', $fullUrl, $this->setHeaders($compatibilityOptions), $data);
        }


        if ($this->debug) {
            $responseFrom = $resultFromCache ? 'REDIS' : 'CALI';
            echo "Method: {$action} \nURL: {$url} \nOptions: " . json_encode($options) . "\nOnly tracking: {$onlyTracking} \nResponse from: {$responseFrom}\n";
            if ($data) {
                echo "Data: " . json_encode($data) . "\n";
            }
        }

        if ($resultFromCache) {
            return json_decode($response, true);
        } else {
            return json_decode($response, true);
        }
    }

    // Define a private function called setScope, it should accept a single argument called $scope and returns nothing
    private function setScope($scope)
    {
        $this->scope = $scope;
        // Set baseURL to the correct value based on the scope
        switch ($scope) {
            case 'public':
                $this->baseURL = '/api/v1';
                break;
            case 'contact':
                $this->baseURL = '/api/contact/v1';
                break;
            case 'user':
                $this->baseURL = '/api/user/v1';
                break;
            default:
                $this->baseURL = '/api/v1';
        }
    }

    private function httpRequest($method, $url, $headers = null, $data = null, $timeout = 10)
    {
        // Create a new Guzzle client with a timeout of 10 seconds, $method could be the HTTP verb (GET, POST, PUT, DELETE)
        // $url is the URL to send the request to, $headers is an array of headers to send with the request
        // $data is the data to send with the request, and $timeout is the timeout for the request
        $client = new \GuzzleHttp\Client(['timeout' => $timeout]);
        $options = [
            'headers' => $headers,
            RequestOptions::JSON => $data,
        ];
        try {
            // Send the request and store the response in a variable
            $response = $client->request($method, $url, $options);
            // Return the response body as a string
            return $response->getBody()->getContents();
        } catch (RequestException $e) {
            // If an exception is thrown, return the exception message
            return $e->getMessage();
        }
    }

    public function httpGet($url, $headers = null)
    {
        return $this->httpRequest('GET', $url, $headers, null, $this->getHttpTimeout);
    }

    public function httpPost($url, $headers = null, $data = null)
    {
        return $this->httpRequest('POST', $url, $headers, $data, $this->postHttpTimeout);
    }

    public function httpPut($url, $headers = null, $data = null)
    {
        return $this->httpRequest('PUT', $url, $headers, $data, $this->putHttpTimeout);
    }

    public function httpDelete($url, $headers = null, $data = null)
    {
        return $this->httpRequest('DELETE', $url, $headers, $data, $this->deleteHttpTimeout);
    }

    private function setHeaders($compatibilityOptions = [], $headers = null)
    {
        $h = [
            'Accept' => 'application/json',
            'ApiKey' => $this->apiKey,
        ];

        if (empty($compatibilityOptions['no_content_type'])) {
            $h['Content-Type'] = 'application/json';
        }
        if ($this->contactTokenId) {
            $h['ContactToken'] = $this->contactTokenId;
        }
        if ($this->visitId) {
            $h['Visit-Id'] = $this->visitId;
        }
        if ($this->sessionToken) {
            $h['Authorization'] = 'Bearer ' . $this->sessionToken;
        }

        if ($headers) {
            foreach ($headers as $k => $v) {
                $h[$k] = $v;
            }
        }

        return $h;
    }

    public function contactGet($url, $headers = null, $compatibilityOptions = [])
    {
        $h = $this->setHeaders($compatibilityOptions, $headers);
        return $this->httpGet($url, $h);
    }

    public function contactPost($url, $data, $compatibilityOptions = [])
    {
        $headers = $this->setHeaders($compatibilityOptions);
        return $this->httpPost($url, $headers, $data);
    }

    public function contactPut($url, $data, $compatibilityOptions = [])
    {
        $headers = $this->setHeaders($compatibilityOptions);
        return $this->httpPut($url, $headers, $data);
    }

    public function userGet($url, $headers = null, $compatibilityOptions = [])
    {
        $h = $this->setHeaders($compatibilityOptions, $headers);
        return $this->httpGet($url, $h);
    }

    public function userPost($url, $data, $compatibilityOptions = [])
    {
        $headers = $this->setHeaders($compatibilityOptions);
        return $this->httpPost($url, $headers, $data);
    }

    public function userPut($url, $data, $compatibilityOptions = [])
    {
        $headers = $this->setHeaders($compatibilityOptions);
        return $this->httpPut($url, $headers, $data);
    }

    public function userDelete($url, $data, $compatibilityOptions = [])
    {
        $headers = $this->setHeaders($compatibilityOptions);
        return $this->httpDelete($url, $headers, $data);
    }

    public function publicGet($url, $headers = null, $compatibilityOptions = [])
    {
        $h = $this->setHeaders($compatibilityOptions, $headers);
        return $this->httpGet($url, $h);
    }

    public function publicPost($url, $headers = null, $data = [], $compatibilityOptions = [])
    {
        $h = $this->setHeaders($compatibilityOptions, $headers);
        return $this->httpPost($url, $h, $data);
    }

    public function publicPut($url, $headers = null, $data = [], $compatibilityOptions = [])
    {
        $h = $this->setHeaders($compatibilityOptions, $headers);
        return $this->httpPut($url, $h, $data);
    }

    private function isSingular($str): bool
    {
        $pluralized = $this->inflector->pluralize($str);
        $singularized = $this->inflector->singularize($str);

        return $pluralized !== $str && $singularized === $str;
    }

    public function setSessionToken($sessionToken)
    {
        $this->sessionToken = $sessionToken;
    }
}
