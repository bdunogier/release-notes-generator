<?php

namespace spec\RNGenerator;

use RNGenerator\Package;
use RNGenerator\PackageDiffer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PackageDifferSpec extends ObjectBehavior
{
    private $fromPackageList;
    private $toPackageList;

    function let() {
        $this->fromPackageList = [
            new Package('pizza', '1', 'https://gh.com/pizza.git'),
            new Package('burger', '2', 'https://gh.com/burger.git'),
            new Package('delete', '32', 'https://gh.com/delete.git'),
            new Package('steak', '70', 'https://gh.com/steak.git'),
        ];

        $this->toPackageList = [
            new Package('pizza', '2', 'https://gh.com/pizza.git'),
            new Package('new', '1', 'https://gh.com/new.git'),
            new Package('burger', '3', 'https://gh.com/burger.git'),
            new Package('steak', '70', 'https://gh.com/steak.git'),
        ];

        $this->beConstructedWith($this->fromPackageList, $this->toPackageList);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(PackageDiffer::class);
    }

    function it_has_a_from_package_list() {
        $this->getFromPackageList()->shouldReturn($this->fromPackageList);
    }

    function it_has_a_to_package_list() {
        $this->getToPackageList()->shouldReturn($this->toPackageList);
    }

    function it_generates_the_list_of_new_packages() {
        $newPackages = $this->generateNewPackages();

        $newPackages->shouldBeArray();
        $newPackages->shouldHaveCount(1);
    }

    function it_generates_the_list_of_updated_packages() {
        $newPackages = $this->generateUpdatedPackages();

        $newPackages->shouldBeArray();
        $newPackages->shouldHaveCount(2);
    }

    function it_generates_the_list_of_deleted_packages() {
        $newPackages = $this->generateDeletedPackages();

        $newPackages->shouldBeArray();
        $newPackages->shouldHaveCount(1);
    }


}
