<?php

namespace RNGenerator;

class Package
{
    private $name;
    private $version;
    private $url;

    public function __construct($name, $version, $url)
    {
        $this->name = $name;
        $this->version = $version;
        $this->url = $url;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function getUrl()
    {
        return $this->url;
    }
}
