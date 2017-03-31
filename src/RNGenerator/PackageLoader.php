<?php

namespace RNGenerator;

class PackageLoader
{
    private $filePath;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function getFilePath()
    {
        return $this->filePath;
    }

    private function loadFileContent()
    {
        return file_get_contents($this->filePath);
    }

    private function loadPackageContent() {
        $composerLock = json_decode($this->loadFileContent());

        return $composerLock->packages;
    }

    public function getPackages()
    {
        $packages = [];
        foreach ($this->loadPackageContent() as $packageContent) {
            $packages[] = new Package(
                $packageContent->name,
                $packageContent-> version,
                $packageContent->source->url
            );
        }

        return $packages;
    }
}
