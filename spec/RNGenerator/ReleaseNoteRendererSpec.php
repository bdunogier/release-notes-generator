<?php

namespace spec\RNGenerator;

use RNGenerator\Package;
use RNGenerator\ReleaseNoteRenderer;
use PhpSpec\ObjectBehavior;

class ReleaseNoteRendererSpec extends ObjectBehavior
{
    private $customTemplateName = "custom.md.twig";
    private $defaultTemplateName = "standard.md.twig";
//    private $defaultTemplatesPath = '';

    function it_is_initializable()
    {
        $this->shouldHaveType(ReleaseNoteRenderer::class);
    }

    function it_has_the_template_name() {
        $this->beConstructedWith($this->customTemplateName);

        $this->getTemplateName()->shouldReturn($this->customTemplateName);
    }

    function it_has_the_default_template_name_if_not_provided() {
        $this->getTemplateName()->shouldReturn($this->defaultTemplateName);
    }

    function it_lets_you_override_the_default_templates_path() {
        $this->setTemplatesPath('');
//        $this->setTemplatePath()->shouldReturn($this->standardTemplateName);
    }

//    function it_renders_the_release_note() {
//        $new = [new Package('a', 'b', 'c')];
//        $updated = [new Package('d', 'e', 'f')];
//        $deleted = [new Package('g', 'h', 'i')];
//
//        TODO need custom template for testing
//
//        $this->render($new, $updated, $deleted)->shouldReturn('FIXME');
//    }


}
