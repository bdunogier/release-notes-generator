<?php

namespace RNGenerator;

class PackageDiffer
{

    private $fromPackageList;
    private $toPackageList;

    public function __construct($fromPackageList, $toPackageList)
    {
        $this->fromPackageList = $fromPackageList;
        $this->toPackageList = $toPackageList;
    }

    public function getToPackageList()
    {
        return $this->toPackageList;
    }

    public function getFromPackageList()
    {
        return $this->fromPackageList;
    }

    private function findPackageInList($packageList, $packageName){
        /** @var Package $packageItem */
        foreach ($packageList as $packageItem) {
            if ($packageItem->getName() == $packageName) {
                return $packageItem;
            }
        }

        return null;
    }

    /**
     * @param $packageName
     *
     * @return Package
     */
    private function findPackageInFromList($packageName) {
        return $this->findPackageInList($this->fromPackageList, $packageName);
    }

    /**
     * @param $packageName
     *
     * @return Package
     */
    private function findPackageInToList($packageName) {
        return $this->findPackageInList($this->toPackageList, $packageName);
    }

    public function generateNewPackages()
    {
        $newPackages = [];

        /** @var Package $toPackage */
        foreach ($this->toPackageList as $toPackage) {

            $fromPackage = $this->findPackageInFromList($toPackage->getName());

            if ($fromPackage === null) {
                $newPackages[] = $toPackage;
            }
        }

        return $newPackages;
    }

    public function generateUpdatedPackages()
    {
        $newPackages = [];

        /** @var Package $toPackage */
        foreach ($this->toPackageList as $toPackage) {

            $fromPackage = $this->findPackageInFromList($toPackage->getName());

            if ($fromPackage !== null) {
                if ($fromPackage->getVersion() != $toPackage->getVersion()) {
                    $newPackages[] = $toPackage;
                }

            }
        }

        return $newPackages;
    }

    public function generateDeletedPackages()
    {
        $deletedPackages = [];

        /** @var Package $fromPackage */
        foreach ($this->fromPackageList as $fromPackage) {
            $toPackage = $this->findPackageInToList($fromPackage->getName());

            if ($toPackage === null) {
                $deletedPackages[] = $fromPackage;
            }
        }

        return $deletedPackages;
    }
}
