# Simple Validation

This package provide validation array, object and etc.

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

$validator = objectWith([
    required('id', [integer(), lowerThan(5)]),
    sometimes('data', arrayOf([
        integer()
    ]))
]);
```

## How can create my own rule

Extend a contract and implement `validate` method.

if you extend `CompositeValidator` or you should call `validateChildren` method in `validate` method too.

you can override `validateChildren` too.