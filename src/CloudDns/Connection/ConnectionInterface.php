<?php
/**
 * Created by PhpStorm.
 * User: adhi
 * Date: 1/2/17
 * Time: 12:43 PM
 */

namespace Google\Cloud\CloudDns\Connection;

/**
 * Represents a connection to
 * [Cloud Dns](https://cloud.google.com/dns/).
 */
interface ConnectionInterface
{

    /**
     * @param array $args
     */
    public function createChanges(array $args = []);

    /**
     * @param array $args
     */
    public function getChanges(array $args = []);

    /**
     * @param array $args
     */
    public function listChanges(array $args = []);

    /**
     * @param array $args
     */
    public function createManagedZone(array $args = []);

    /**
     * @param array $args
     */
    public function deleteManagedZones(array $args = []);

    /**
     * @param array $args
     */
    public function getManagedZones(array $args = []);

    /**
     * @param array $args
     */
    public function listManagedZones(array $args = []);

    /**
     * @param array $args
     */
    public function getProject(array $args = []);

    /**
     * @param array $args
     */
    public function getResourceRecordSets(array $args = []);

}