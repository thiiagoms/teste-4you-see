<?php

declare(strict_types=1);

namespace FourYouSee\Helpers;

final class Container
{
    /**
     * @var array
     */
    private array $dependencies = [];

    /**
     * @param string $class
     * @param callable $resolver
     * @return void
     */
    public function set(string $class, callable $resolver): void
    {
        $this->dependencies[$class] = $resolver;
    }

    /**
     * @param string $class
     * @return mixed
     */
    public function get(string $class)
    {
        if (! array_key_exists($class, $this->dependencies)) {
            throw new \Exception("Class not found {$class}");
        }

        $handler = $this->dependencies[$class];

        return $handler($this);
    }
}
