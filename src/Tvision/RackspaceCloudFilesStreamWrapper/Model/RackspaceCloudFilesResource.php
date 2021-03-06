<?php

namespace Tvision\RackspaceCloudFilesStreamWrapper\Model;

/**
 * Class RackspaceCloudFilesResource
 * @package Tvision\RackspaceCloudFilesStreamWrapper\Model
 *
 * @author liuggio
 */
class RackspaceCloudFilesResource
{

    private $containerName;
    private $currentPath;
    private $resourceName;
    private $object;
    private $container;

    /**
     * @param string $path
     */
    public function __construct($path = null)
    {
        if (!empty($path)) {
            $this->initResourceByPath($path);
        }
        $this->setObject(null);
        $this->setContainer(null);
    }

    /**
     * Take the container and the resource name from the
     *
     * @param string $path
     * @return RSCFResource|false
     *
     * @api
     */
    public function initResourceByPath($path)
    {
        $parsed = parse_url($path);

        if ($parsed === false) {
            return false;
        }
        $this->currentPath = $path;

        if (isset($parsed['host'])) {
            $this->containerName = $parsed['host'];
        }
        if (isset($parsed['path'])) {
            $this->resourceName = $this->cleanName($parsed['path']);
        }
        return $this;
    }

    /**
     * @return String
     *
     * @api
     */
    public function getContainerName()
    {
        return $this->containerName;
    }

    /**
     * @return String
     *
     * @api
     */
    public function getResourceName()
    {
        return $this->resourceName;
    }

    /**
     * @param string $containerName
     *
     * @api
     */
    public function setContainerName($containerName)
    {
        $this->containerName = $containerName;
    }

    /**
     * @param string $resourceName
     *
     * @api
     */
    public function setResourceName($resourceName)
    {
        $this->resourceName = $resourceName;
    }

    /**
     * @param String $pathName
     * @return String
     */
    public function cleanName($pathName)
    {
        $pathName = ltrim($pathName, '/');
        return $pathName;
    }

    /**
     * set the variable given to the $object property
     *
     * @param type $object
     */
    public function setObject($object)
    {
        $this->object = $object;
    }

    /**
     * get the current $object
     *
     * @return $object
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * set the variable given to the container property
     *
     * @param type container
     */
    public function setContainer($container)
    {
        $this->container = $container;
    }

    /**
     * get the current container
     *
     * @return $object
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @return string
     */
    public function getCurrentPath()
    {
        return $this->currentPath;
    }

    /**
     * @param $currentPath
     */
    public function setCurrentPath($currentPath)
    {
        $this->currentPath = $currentPath;
    }

}

