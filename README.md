# Symfony Form Generator Bundle [![Build Status](https://travis-ci.org/Lucaszz/SymfonyFormGeneratorBundle.svg?branch=master)](https://travis-ci.org/Lucaszz/SymfonyFormGeneratorBundle)

This bundle integrates library [SymfonyFormGenerator](https://github.com/Lucaszz/SymfonyFormGenerator) with symfony framework.

## Example

Object of given class:

```php
use Lucaszz\SymfonyFormGenerator\Annotation\Form;
use Symfony\Component\Validator\Constraints as Assert;

class ObjectWithMixedMetadata
{
    /**
     * @var bool
     */
    public $propertyBoolean;

    /**
     * @Assert\Count(max="5")
     */
    public $propertyArray;

    /**
     * @Form\Field("integer", options={"label"="Property Integer"})
     */
    public $propertyInteger;

    public $propertyDateTime;

    public $propertyUndefined;

    public function __construct($propertyBoolean, $propertyArray, $propertyInteger, \DateTime $propertyDateTime, $propertyUndefined)
    {
        $this->propertyBoolean   = $propertyBoolean;
        $this->propertyArray     = $propertyArray;
        $this->propertyInteger   = $propertyInteger;
        $this->propertyDateTime  = $propertyDateTime;
        $this->propertyUndefined = $propertyUndefined;
    }
}
```

after:
```php
        $form = $this->get('form_generator')
            ->generateFormBuilder(ObjectWithMixedMetadata::class)
            ->getForm();
```

will have `form` equivalent:

```php
use Lucaszz\SymfonyFormGenerator\Form\Type\GeneratorFormType;
use Lucaszz\SymfonyFormGenerator\ObjectWithMixedMetadata;
use Symfony\Component\Form\Forms;

Forms::createFormFactory()->createBuilder()
    ->create('form', new GeneratorFormType(ObjectWithMixedMetadata::class))
    ->add('propertyBoolean', 'checkbox')
    ->add('propertyArray', 'generator_array')
    ->add('propertyInteger', 'integer')
    ->add('propertyDateTime', 'generator_datetime')
    ->add('propertyUndefined', 'generator_string');
```
`generator_array` type extends `collection`,
`generator_datetime` type extends `datetime`,
`generator_string` type extends `text`.

`generator_*` types are custom form types for better support raw values.


## Documentation

Topics: 
- [Installation](Resources/doc/installation.md)
- [Usage](Resources/doc/usage.md)
- [Custom mapping](Resources/doc/custom_mapping.md)

## Related `SymfonyFormGenerator` documentation

- [Supported value objects](https://github.com/Lucaszz/SymfonyFormGenerator/blob/master/doc/value_objects.md)
- [Guess priorities](https://github.com/Lucaszz/SymfonyFormGenerator/blob/master/doc/guess_priorities.md)
- [Form annotation guess](https://github.com/Lucaszz/SymfonyFormGenerator/blob/master/doc/form_annotation_guess.md)
- [PHPDoc comment guess](https://github.com/Lucaszz/SymfonyFormGenerator/blob/master/doc/phpdoc_comment_guess.md)
- [Validator guess](https://github.com/Lucaszz/SymfonyFormGenerator/blob/master/doc/validator_guess.md)
- [Type hint guess](https://github.com/Lucaszz/SymfonyFormGenerator/blob/master/doc/type_hint_guess.md)
