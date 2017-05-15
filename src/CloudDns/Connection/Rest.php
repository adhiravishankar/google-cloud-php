<?php
/**
 * Created by PhpStorm.
 * User: adhi
 * Date: 1/2/17
 * Time: 12:49 PM
 */

namespace Google\Cloud\CloudDns\Connection;

use Google\Cloud\Core\RequestBuilder;
use Google\Cloud\Core\RequestWrapper;
use Google\Cloud\Core\RestTrait;
use Google\Cloud\Core\UriTrait;

class Rest implements ConnectionInterface
{

    use RestTrait;
    use UriTrait;

    const BASE_URI = 'https://www.googleapis.com/dns/v1/projects/';

    /**
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->setRequestWrapper(new RequestWrapper($config));
        $this->setRequestBuilder(new RequestBuilder(
            __DIR__ . '/ServiceDefinition/clouddns-v1.json',
            self::BASE_URI
        ));
    }

    /**
     * @param array $args
     * @return array
     */
    public function createChanges(array $args = [])
    {
        return $this->send('changes', 'create', $args);
    }

    /**
     * @param array $args
     * @return array
     */
    public function getChanges(array $args = [])
    {
        return $this->send('changes', 'get', $args);
    }

    /**
     * @param array $args
     * @return array
     */
    public function listChanges(array $args = [])
    {
        return $this->send('changes', 'list', $args);
    }

    /**
     * @param array $args
     * @return array
     */
    public function createManagedZones(array $args = [])
    {
        return $this->send('managedZones', 'create', $args);
    }

    /**
     * @param array $args
     * @return array
     */
    public function deleteManagedZones(array $args = [])
    {
        return $this->send('managedZones', 'delete', $args);
    }

    /**
     * @param array $args
     * @return array
     */
    public function getManagedZones(array $args = [])
    {
        return $this->send('managedZones', 'get', $args);
    }

    /**
     * @param array $args
     * @return array
     */
    public function listManagedZones(array $args = [])
    {
        return $this->send('managedZones', 'list', $args);
    }

    /**
     * @param array $args
     * @return array
     */
    public function getProject(array $args = [])
    {
        return $this->send('projects', 'get', $args);
    }

    /**
     * @param array $args
     * @return array
     */
    public function getResourceRecordSets(array $args = [])
    {
        return $this->send('resourceRecordSets', 'list', $args);
    }

}