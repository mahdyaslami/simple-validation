# Simple Validation

This package provide validation for array, object and etc.

I have use compsite pattern to writing this package.

![UML Diagram](https://www.plantuml.com/plantuml/png/VP3DJi9058NtynGtaKKHomCODHXMHeq99cwC8PVE5KRc1-S7RPHtTrfWR6XXDPEJxzoSSqREe_L1IUQMGg_GeW8fDFboHM2iNnWcj2VxZWN12qh1qHjxjvTOMu9BM6z5odhn5wZF6CwSjrXuA2Gw1sEZLiO9JyaEFmmWxxZMAnP2SaiQhk7rBKA3jH4SaFD7r6M6rcBv3_MRG7RqN8MTLLYAEjuTI94tNTMkVeV3Zl2ieyzvdjzq3DQQufxAI8M39GRJQM5q14FXi_W8FOVUaieBs1MsGPAh9wcxp8oHi40NhwK6KLRYcpZCoJVrJKVSs2pFsraOsuQiui_9JeAaexCqcBtjmNoTDYKYMMwhUhLm96GYakLfza65F-b9I39Dw3C8IxpMMhrhLsAQlcUZo0j5xeJn01gHva79Fm00)

## Usage without helpers

```php
<?php

$validator = new ObjectRule([
    new RequiredRule('id', [new IntegerRule(), new LowerRule(5)]),
    new SometimesRule('data', [new ArrayRule([
        new IntegerRule()
    ])]);
]);

$validator->validate($value);
```

Call validate method throw `ValidationException` on errors and do nothing on correct.

## Usage with helpers
```php
<?php

$validator = objectOf([
    required('id', [integer(), lowerThan(5)]),
    sometimes('data', arrayOf([
        integer()
    ]))
]);
```

## How can create my own rule

Extend one of the contracts and implement `validate` method.

if you extend `CompositeValidator`, you should call `validateChildren` method in `validate` method too.

you can override `validateChildren` too.

## Available Validators

- #### `objectOf($arrayOfKeyValueValidator)`

Call array of key value validators on requested object.

- #### `arrayOf($arrayOfValidator)`

Call array of validator on all array items.

- #### `integer()`

Check if requested value is integer.

- #### `numeric()`

Check if requested value is number.

- #### `lowerThan($min)`

Check if requested value is lower than `$min`.

### **Key Value validators**

- #### `required($key, $arrayOfValidators)`

Check requested object should has `$key` key and call array of validators on its value.

- #### `sometimes($key, $arrayOfValidators)`

Check of requested object has `$key` key then call
array of validators on its value.
