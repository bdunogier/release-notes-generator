<?php

namespace RNGenerator;

class ReleaseNoteGenerator
{
    private $fromFile;

    private $toFile;

    private $template; //TODO refactor

    public function __construct($fromFile, $toFile, $template)
    {
        $this->fromFile = $fromFile;
        $this->toFile = $toFile;
        $this->template = $template;
    }

    public function getFromFile()
    {
        return $this->fromFile;
    }

    public function getToFile()
    {
        return $this->toFile;
    }

    public function getTemplate()
    {
        return $this->template;
    }

    public function printReleaseNote()
    {
        $fromPackages = new PackageLoader($this->fromFile);
        $toPackages = new PackageLoader($this->toFile);

        $packageDiffer = new PackageDiffer($fromPackages, $toPackages);

        //TODO create renderer(templatename)

        //TODO use renderer
        return "FIXME";
    }
}
