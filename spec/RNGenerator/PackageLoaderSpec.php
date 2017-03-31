<?php

namespace spec\RNGenerator;

use RNGenerator\PackageLoader;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PackageLoaderSpec extends ObjectBehavior
{
    private $filePath = "assets/packageLoader.json";

    function let() {
        $this->beConstructedWith($this->filePath);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(PackageLoader::class);
    }

    function it_has_a_filePath() {
        $this->getFilePath()->shouldReturn($this->filePath);
    }

    function it_loads_packages_from_file() {
        $packages = $this->getPackages();

        $packages->shouldBeArray();
        $packages->shouldHaveCount(2);

    }
}
