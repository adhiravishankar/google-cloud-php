<?php

namespace Google\Cloud\CloudDns;

use Google\Cloud\CloudDns\Connection\ConnectionInterface;
use Google\Cloud\CloudDns\Connection\Rest;
use Google\Cloud\Core\ClientTrait;
use Google\Cloud\Core\Exception\NotFoundException;
use Psr\Cache\CacheItemPoolInterface;

class CloudDnsClient
{
    use ClientTrait;

    const READ_WRITE_SCOPE = 'https://www.googleapis.com/auth/ndev.clouddns.readwrite';
    const READ_ONLY_SCOPE = 'https://www.googleapis.com/auth/ndev.clouddns.readonly';

    /**
     * @var ConnectionInterface $connection Represents a connection to Storage.
     */
    protected $connection;

    protected $project;


    /**
     * Create a CloudDns client.
     *
     * @param array $config [optional] {
     *     Configuration options.
     *
     *     @type string $projectId The project ID from the Google Developer's
     *           Console.
     *     @type CacheItemPoolInterface $authCache A cache used storing access
     *           tokens. **Defaults to** a simple in memory implementation.
     *     @type array $authCacheOptions Cache configuration options.
     *     @type callable $authHttpHandler A handler used to deliver Psr7
     *           requests specifically for authentication.
     *     @type callable $httpHandler A handler used to deliver Psr7 requests.
     *           Only valid for requests sent over REST.
     *     @type string $keyFile The contents of the service account
     *           credentials .json file retrieved from the Google Developers
     *           Console.
     *     @type string $keyFilePath The full path to your service account
     *           credentials .json file retrieved from the Google Developers
     *           Console.
     *     @type int $retries Number of retries for a failed request.
     *           **Defaults to** `3`.
     *     @type array $scopes Scopes to be used for the request.
     * }
     */
    public function __construct(array $config = [])
    {
        if (!isset($config['scopes'])) {
            $config['scopes'] = [self::READ_WRITE_SCOPE];
        }

        $this->connection = new Rest($this->configureAuthentication($config));
        $this->project = $this->detectProjectId($config);
    }

    /**
     * Check whether or not the project exists.
     *
     * Example:
     * ```
     * if ($bucket->exists()) {
     *     echo 'Bucket exists!';
     * }
     * ```
     *
     * @return bool
     */
    public function exists()
    {
        try {
            $this->connection->getProject();
        } catch (NotFoundException $ex) {
            return false;
        }

        return true;
    }


    /**
     * Create a managed zone. Managed zone names must be unique as Cloud Storage uses a flat
     * namespace. For more information please see
     * [bucket name requirements](https://cloud.google.com/storage/docs/naming#requirements)
     *
     * Example:
     * ```
     * $managedZone = $cloudDns->createManagedZone('myManagedZone');
     * ```
     *
     * ```
     * // Create a bucket with logging enabled.
     * $managedZone = $cloudDns->createManagedZone('myManagedZone');
     * ```
     *
     * @see https://cloud.google.com/storage/docs/json_api/v1/buckets/insert Buckets insert API documentation.
     *
     * @param string $name Name of the managed zone to be created.
     * @param array $options [optional] {
     *     Configuration options.
     *
     * }
     * @return ManagedZone
     */
    public function createManagedZone($name, array $options = [])
    {
        $response = $this->connection->createManagedZone($options + ['name' => $name, 'project' => $this->projectId]);
        return new ManagedZone($this->connection, $name, $response);
    }


    /**
     * Lazily instantiates a managed zone. There are no network requests made at this
     * point. To see the operations that can be performed on a managed zone please
     * see {@see Google\Cloud\CloudDns\ManagedZone}.
     *
     * Example:
     * ```
     * $zone = $dns->managedZone('my-zone');
     * ```
     *
     * @param string $name The name of the managed zone to request.
     * @return ManagedZone
     */
    public function managedZone($name)
    {
        return new ManagedZone($this->connection, $name);
    }



}