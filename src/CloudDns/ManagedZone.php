<?php
/**
 * Created by PhpStorm.
 * User: adhi
 * Date: 1/2/17
 * Time: 1:25 PM
 */

namespace Google\Cloud\CloudDns;


use Google\Cloud\CloudDns\Connection\ConnectionInterface;
use Google\Cloud\Core\ArrayTrait;
use Google\Cloud\Core\Iterator\ItemIterator;
use Google\Cloud\Core\Iterator\PageIterator;

class ManagedZone
{
    use ArrayTrait;

    /**
     * @var string
     */
    private $name;

    /**
     * @var ConnectionInterface Represents a connection to Cloud Storage.
     */
    private $connection;



    /**
     * Fetches all buckets in the project.
     *
     * Example:
     * ```
     * $buckets = $storage->buckets();
     * ```
     *
     * ```
     * // Get all buckets beginning with the prefix 'album'.
     * $buckets = $storage->buckets([
     *     'prefix' => 'album'
     * ]);
     *
     * foreach ($buckets as $bucket) {
     *     echo $bucket->name() . PHP_EOL;
     * }
     * ```
     *
     * @see https://cloud.google.com/storage/docs/json_api/v1/buckets/list Buckets list API documentation.
     *
     * @param array $options [optional] {
     *     Configuration options.
     *
     *     @type int $maxResults Maximum number of results to return per
     *           requested page.
     *     @type int $resultLimit Limit the number of results returned in total.
     *           **Defaults to** `0` (return all results).
     *     @type string $pageToken A previously-returned page token used to
     *           resume the loading of results from a specific point.
     *     @type string $prefix Filter results with this prefix.
     *     @type string $projection Determines which properties to return. May
     *           be either 'full' or 'noAcl'.
     *     @type string $fields Selector which will cause the response to only
     *           return the specified fields.
     * }
     * @return ItemIterator<Google\Cloud\Storage\Bucket>
     */
    public function resourceRecordSets(array $options = [])
    {
        $resultLimit = $this->pluck('resultLimit', $options, false);
    }

}