# Custom mapping 

## Default mapping:
| property type | form type |
|---|---|
| array | generator_array |
| string | generator_string |
| int | integer |
| integer | integer |
| float | number |
| double | number |
| real | number |
| bool | checkbox |
| boolean | checkbox |
| \DateTime | generator_datetime |
| \Ramsey\Uuid\UuidInterface | generator_uuid |
| \Money\Money | generator_money |

## Customize mapping in config.yml
```yaml
symfony_form_generator:
    property_type_mappings:
        - { property_type: Lzakrzewski\SymfonyFormGeneratorBundle\Tests\fixtures\CustomValueObject, form_type: custom_value_object }
```