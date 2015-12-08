<?php

namespace Lucaszz\SymfonyFormGeneratorBundle;

use Lucaszz\SymfonyFormGenerator\ObjectWithMixedMetadata;
use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;

class Controller extends BaseController
{
    public function testAction()
    {
        $form = $this->get('form_generator')
            ->generateFormBuilder(ObjectWithMixedMetadata::class)
            ->getForm();

        $form->submit([
            'propertyBoolean'   => true,
            'propertyArray'     => ['test'],
            'propertyInteger'   => 1,
            'propertyDateTime'  => '2016-01-01 00:00:00',
            'propertyUndefined' => 'test',
        ]);
    }
}
