<?php
/**
 * Created by PhpStorm.
 * User: adhi
 * Date: 1/2/17
 * Time: 1:26 PM
 */

namespace Google\Cloud\CloudDns;


class ResourceRecordSet
{

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $type;

    /**
     * @var int
     */
    private $ttl;

    /**
     * @var array
     */
    private $rrdatas;

    /**
     * ResourceRecordSet constructor.
     * @param string $name
     * @param string $type
     * @param int $ttl
     * @param array $rrdatas
     */
    public function __construct($name, $type, $ttl, array $rrdatas)
    {
        $this->name = $name;
        $this->type = $type;
        $this->ttl = $ttl;
        $this->rrdatas = $rrdatas;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getTtl(): int
    {
        return $this->ttl;
    }

    /**
     * @return array
     */
    public function getRrdatas(): array
    {
        return $this->rrdatas;
    }


}