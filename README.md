# Symfony Form Generator Bundle [![Build Status](https://travis-ci.org/lzakrzewski/SymfonyFormGeneratorBundle.svg?branch=master)](https://travis-ci.org/lzakrzewski/SymfonyFormGeneratorBundle) [![Coverage Status](https://coveralls.io/repos/github/lzakrzewski/SymfonyFormGeneratorBundle/badge.svg?branch=master)](https://coveralls.io/github/lzakrzewski/SymfonyFormGeneratorBundle?branch=master)

This bundle integrates library [SymfonyFormGenerator](https://github.com/lzakrzewski/SymfonyFormGenerator) with symfony framework.

## Example

Object of given class:

```php
use Lzakrzewski\SymfonyFormGenerator\Annotation\Form;
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
use Lzakrzewski\SymfonyFormGenerator\Form\Type\GeneratorFormType;
use Lzakrzewski\SymfonyFormGenerator\ObjectWithMixedMetadata;
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

## Related SymfonyFormGenerator documentation

- [Supported value objects](https://github.com/Lzakrzewski/SymfonyFormGenerator/blob/master/doc/value_objects.md)
- [Guess priorities](https://github.com/Lzakrzewski/SymfonyFormGenerator/blob/master/doc/guess_priorities.md)
- [Form annotation guess](https://github.com/Lzakrzewski/SymfonyFormGenerator/blob/master/doc/form_annotation_guess.md)
- [PHPDoc comment guess](https://github.com/Lzakrzewski/SymfonyFormGenerator/blob/master/doc/phpdoc_comment_guess.md)
- [Validator guess](https://github.com/Lzakrzewski/SymfonyFormGenerator/blob/master/doc/validator_guess.md)
- [Type hint guess](https://github.com/Lzakrzewski/SymfonyFormGenerator/blob/master/doc/type_hint_guess.md)
