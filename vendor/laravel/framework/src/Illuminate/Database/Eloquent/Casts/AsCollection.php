<?php

namespace Illuminate\Database\Eloquent\Casts;

use Illuminate\Contracts\Database\Eloquent\Castable;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Support\Collection;
<<<<<<< HEAD
=======
use Illuminate\Support\Str;
>>>>>>> 890ebdd96f7d6873ba198cc859e87d61062ce611
use InvalidArgumentException;

class AsCollection implements Castable
{
    /**
     * Get the caster class to use when casting from / to this cast target.
     *
     * @param  array  $arguments
     * @return \Illuminate\Contracts\Database\Eloquent\CastsAttributes<\Illuminate\Support\Collection<array-key, mixed>, iterable>
     */
    public static function castUsing(array $arguments)
    {
        return new class($arguments) implements CastsAttributes
        {
            public function __construct(protected array $arguments)
            {
<<<<<<< HEAD
=======
                $this->arguments = array_pad(array_values($this->arguments), 2, '');
>>>>>>> 890ebdd96f7d6873ba198cc859e87d61062ce611
            }

            public function get($model, $key, $value, $attributes)
            {
                if (! isset($attributes[$key])) {
                    return;
                }

                $data = Json::decode($attributes[$key]);

<<<<<<< HEAD
                $collectionClass = $this->arguments[0] ?? Collection::class;
=======
                $collectionClass = empty($this->arguments[0]) ? Collection::class : $this->arguments[0];
>>>>>>> 890ebdd96f7d6873ba198cc859e87d61062ce611

                if (! is_a($collectionClass, Collection::class, true)) {
                    throw new InvalidArgumentException('The provided class must extend ['.Collection::class.'].');
                }

<<<<<<< HEAD
                return is_array($data) ? new $collectionClass($data) : null;
=======
                if (! is_array($data)) {
                    return null;
                }

                $instance = new $collectionClass($data);

                if (! isset($this->arguments[1]) || ! $this->arguments[1]) {
                    return $instance;
                }

                if (is_string($this->arguments[1])) {
                    $this->arguments[1] = Str::parseCallback($this->arguments[1]);
                }

                return is_callable($this->arguments[1])
                    ? $instance->map($this->arguments[1])
                    : $instance->mapInto($this->arguments[1][0]);
>>>>>>> 890ebdd96f7d6873ba198cc859e87d61062ce611
            }

            public function set($model, $key, $value, $attributes)
            {
                return [$key => Json::encode($value)];
            }
        };
    }

    /**
<<<<<<< HEAD
     * Specify the collection for the cast.
     *
     * @param  class-string  $class
     * @return string
     */
    public static function using($class)
    {
        return static::class.':'.$class;
=======
     * Specify the type of object each item in the collection should be mapped to.
     *
     * @param  array{class-string, string}|class-string  $map
     * @return string
     */
    public static function of($map)
    {
        return static::using('', $map);
    }

    /**
     * Specify the collection type for the cast.
     *
     * @param  class-string  $class
     * @param  array{class-string, string}|class-string  $map
     * @return string
     */
    public static function using($class, $map = null)
    {
        if (is_array($map) && is_callable($map)) {
            $map = $map[0].'@'.$map[1];
        }

        return static::class.':'.implode(',', [$class, $map]);
>>>>>>> 890ebdd96f7d6873ba198cc859e87d61062ce611
    }
}
