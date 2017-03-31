<?php

namespace spec\RNGenerator;

use PhpSpec\ObjectBehavior;
use RNGenerator\ReleaseNoteGenerator;

class ReleaseNoteGeneratorSpec extends ObjectBehavior
{
    private $fromFileName = "../assets/fromFile.json";
    private $toFileName = "../assets/toFile.json";
    private $template = "TODO";

    function let() {
        $this->beConstructedWith($this->fromFileName, $this->toFileName, $this->template);
    }

    function it_is_initializable() {
        $this->shouldHaveType(ReleaseNoteGenerator::class);
    }

    function it_has_a_from_file() {
        $this->getFromFile()->shouldReturn($this->fromFileName);
    }

    function it_has_a_to_file() {
        $this->getToFile()->shouldReturn($this->toFileName);
    }

    function it_has_a_template() {
        $this->getTemplate()->shouldReturn($this->template);
    }

    function it_prints_the_release_note() {
        $this->printReleaseNote()->shouldReturn("FIXME"); //TODO
    }
}
