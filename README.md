[![License](https://poser.pugx.org/arodygin/php-dictionary/license)](https://packagist.org/packages/arodygin/php-dictionary)
[![Latest Stable Version](https://poser.pugx.org/arodygin/php-dictionary/v/stable)](https://packagist.org/packages/arodygin/php-dictionary)
[![Build Status](https://travis-ci.org/arodygin/php-dictionary.svg?branch=master)](https://travis-ci.org/arodygin/php-dictionary)
[![Code Coverage](https://scrutinizer-ci.com/g/arodygin/php-dictionary/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/arodygin/php-dictionary/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/arodygin/php-dictionary/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/arodygin/php-dictionary/?branch=master)

# Static dictionary implementation for PHP

## Requirements

PHP needs to be a minimum version of PHP 5.4.

## Installation

The recommended way to install is via Composer:

```bash
composer.phar require "arodygin/php-dictionary"
composer.phar install
```

## Usage

To create custom dictionary you have to extend `StaticDictionary` class and implement the `all` function, which must return your dictionary as associated array.
After that you can use [`StaticDictionaryInterface`](https://github.com/arodygin/php-dictionary/blob/master/src/StaticDictionaryInterface.php) interface to work with your dictionary.

Example dictionary:

```php
namespace Dictionary;

class Color extends StaticDictionary
{
    const BLACK   = 'Black';
    const BLUE    = 'Blue';
    const GREEN   = 'Green';
    const CYAN    = 'Cyan';
    const RED     = 'Red';
    const MAGENTA = 'Magenta';
    const YELLOW  = 'Yellow';
    const WHITE   = 'White';

    /**
     * {@inheritdoc}
     */
    public static function all()
    {
        return [
            self::BLACK   => '#000000',
            self::BLUE    => '#0000FF',
            self::GREEN   => '#00FF00',
            self::CYAN    => '#00FFFF',
            self::RED     => '#FF0000',
            self::MAGENTA => '#FF00FF',
            self::YELLOW  => '#FFFF00',
            self::WHITE   => '#FFFFFF',
        ];
    }
}
```

Input sanitizing:

```php
public function setColor($color)
{
    if (Dictionary\Color::has($color)) {
        $this->color = $color;
    }
}
```

Symfony validation:

```php
use Symfony\Component\Validator\Constraints;

class Settings
{
    /**
     * @Constraints\NotNull()
     * @Constraints\Choice(callback = {"Dictionary\Color", "keys"})
     */
    public $color;
}
```

Symfony form:

```php
class ColorType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('color', ChoiceType::class, [
            'label'   => 'color',
            'choices' => array_flip(Dictionary\Color::all()),
        ]);
    }
}
```

Please note, if you try to get a value from your dictionary using non-existing key, you will get `NULL` without any failures or warnings.
Sometimes it's useful to have a default fallback value to be returned instead of `NULL`.
This can be done by defining a `FALLBACK` constant in your dictionary class:

```php
class Shell extends StaticDictionary
{
    const FALLBACK = self::UNITY;

    const XFCE  = 1;
    const KDE   = 2;
    const GNOME = 3;
    const LXDE  = 4;
    const UNITY = 5;
    const MATE  = 6;

    /**
     * {@inheritdoc}
     */
    public static function all()
    {
        return [
            self::UNITY => 'Unity',
            self::GNOME => 'Gnome',
            self::KDE   => 'KDE',
            self::LXDE  => 'LXDE',
            self::XFCE  => 'Xfce',
            self::MATE  => 'MATE',
        ];
    }
}

// This returns 'Gnome'
Shell::get(Shell::GNOME);

// This returns 'Unity'
Shell::get(Color::BLACK);
```

## Development

```bash
phpunit --coverage-text
./bin/php-cs-fixer fix
```
