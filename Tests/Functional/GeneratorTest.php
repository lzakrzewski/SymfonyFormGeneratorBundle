<?php

namespace Lucaszz\SymfonyFormGeneratorBundle\Tests\Functional;

use Lucaszz\SymfonyFormGenerator\Generator;
use Lucaszz\SymfonyFormGeneratorBundle\Tests\fixtures\CustomValueObject;
use Lucaszz\SymfonyFormGeneratorBundle\Tests\fixtures\ObjectWithCustomValueObject;
use Lucaszz\SymfonyFormGeneratorBundle\Tests\fixtures\ObjectWithoutMetadata;
use Lucaszz\SymfonyFormGeneratorBundle\Tests\fixtures\ObjectWithPhpDocMetadataOnProperties;

class GeneratorTest extends FunctionalTestCase
{
    /** @test */
    public function it_creates_form_generator_service()
    {
        $this->assertInstanceOf(Generator::class, $this->container->get('form_generator'));
    }

    /** @test */
    public function it_generates_simple_form_for_class_without_metadata()
    {
        $form = $this->container->get('form_generator')->generate(ObjectWithoutMetadata::class)->getForm();

        $form->submit(['property' => 'test123']);
        $formData = $form->getData();

        $this->assertTrue($form->isValid());
        $this->assertEquals(new ObjectWithoutMetadata('test123'), $formData);
    }

    /** @test */
    public function it_generates_form_for_class_with_metadata_on_properties()
    {
        $form = $this->container->get('form_generator')->generate(ObjectWithPhpDocMetadataOnProperties::class)->getForm();

        $form->submit(
            [
                'propertyDateTime' => '2016-01-01 00:00:00',
                'propertyUuid' => 'test123',
                'propertyMoney' => 'test123',
            ]
        );
        $formData = $form->getData();

        $this->assertTrue($form->isValid());
        $this->assertEquals(
            new ObjectWithPhpDocMetadataOnProperties(new \DateTime('2016-01-01 00:00:00'), 'test123', 'test123'),
            $formData
        );
    }

    /** @test */
    public function it_generates_form_for_class_with_custom_variable_type()
    {
        $form = $this->container->get('form_generator')->generate(ObjectWithCustomValueObject::class)->getForm();

        $form->submit(['property' => 'test123']);
        $formData = $form->getData();

        $this->assertTrue($form->isValid());
        $this->assertEquals(new ObjectWithCustomValueObject(CustomValueObject::create('test123')), $formData);

    }
}
