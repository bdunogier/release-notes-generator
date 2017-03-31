<?php

namespace RNGenerator;

use Twig_Loader_Filesystem;
use Twig_Environment;

class ReleaseNoteRenderer
{
    private $templatesPath = './templates';

    private $templateName = 'standard.md.twig';

    public function __construct($templateName = null)
    {
        if ($templateName !== null) {
            $this->templateName = $templateName;
        }
    }

    public function getTemplateName()
    {
        return $this->templateName;
    }

    public function render($newPackages, $updatedPackages, $deletedPackages)
    {
        $loader = new Twig_Loader_Filesystem($this->templatesPath);
        $twig = new Twig_Environment($loader);
        $template = $twig->load($this->templateName);

        return $template->render(
            [
                'newPackages' => $newPackages,
                'updatedPackages' => $updatedPackages,
                'deletedPackages' => $deletedPackages
            ]
        );
    }

    public function setTemplatesPath($argument1)
    {
        // TODO: write logic here
    }
}
