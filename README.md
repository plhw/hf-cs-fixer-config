# php-cs-fixer-config

PHP CS Fixer config for healthy feet components

It's based on the ideas of [`refinery29/php-cs-fixer-config`](https://github.com/refinery29/php-cs-fixer-config/).

## Installation

Run

```
$ composer require --dev plhw/php-cs-fixer-config:^2.8.1
```

Add to composer.json;

```json
"scripts": {
  "check": [
    "@cs",
  ],
  "cs": "php-cs-fixer fix -v --diff --dry-run",
  "cs-fix": "php-cs-fixer fix -v --diff",
}
```
  
## Usage

### Configuration

Create a configuration file `.php_cs` in the root of your project:

```php
<?php

$config = new HF\CS\Config();
$config->getFinder()->in(__DIR__);
$config->getFinder()->append(['.php_cs']);

$cacheDir = getenv('TRAVIS') ? getenv('HOME') . '/.php-cs-fixer' : __DIR__;

$config->setCacheFile($cacheDir . '/.php_cs.cache');

return $config;
```

### Git

Add `.php_cs.cache` (this is the cache file created by `php-cs-fixer`) to `.gitignore`:

```
vendor/
.php_cs.cache
```

### Travis

Update your `.travis.yml` to cache the `php_cs.cache` file:

```yml
cache:
  directories:
    - $HOME/.php-cs-fixer
```

Then run `php-cs-fixer` in the `script` section:

```yml
script:
  - composer cs
```

### GitLab

Update your `.gitlab-ci` to cache the `php_cs.cache` file:

```
  script:
  - composer cs
```

## Fixing issues

### Manually

If you need to fix issues locally, just run

```
$ . composer cs-fix
```

### Pre-commit hook

You can add a `pre-commit` hook

```
$ touch .git/pre-commit && chmod +x .git/pre-commit
```
 
Paste this into `.git/pre-commit`:

```bash
#!/usr/bin/env bash

echo "pre commit hook start"

CURRENT_DIRECTORY=`pwd`
GIT_HOOKS_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

PROJECT_DIRECTORY="$GIT_HOOKS_DIR/../.."

cd $PROJECT_DIRECTORY;
PHP_CS_FIXER="vendor/bin/php-cs-fixer"

HAS_PHP_CS_FIXER=false

if [ -x "$PHP_CS_FIXER" ]; then
    HAS_PHP_CS_FIXER=true
fi

if $HAS_PHP_CS_FIXER; then
    git status --porcelain | grep -e '^[AM]\(.*\).php$' | cut -c 3- | while read line; do
        ${PHP_CS_FIXER} fix --config-file=.php_cs --verbose ${line};
        git add "$line";
    done
else
    echo ""
    echo "Please install php-cs-fixer, e.g.:"
    echo ""
    echo "  composer require friendsofphp/php-cs-fixer:^2.8.1"
    echo ""
fi

cd $CURRENT_DIRECTORY;
echo "pre commit hook finish"
```
 
## License

This package is licensed using the MIT License.

## Greetz

Bas Kamer
