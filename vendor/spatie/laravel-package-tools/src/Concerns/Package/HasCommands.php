<?php

namespace Spatie\LaravelPackageTools\Concerns\Package;

trait HasCommands
{
    public array $commands = [];
<<<<<<< HEAD
=======
    public array $consoleCommands = [];
>>>>>>> 890ebdd96f7d6873ba198cc859e87d61062ce611

    public function hasCommand(string $commandClassName): static
    {
        $this->commands[] = $commandClassName;

        return $this;
    }

    public function hasCommands(...$commandClassNames): static
    {
        $this->commands = array_merge(
            $this->commands,
            collect($commandClassNames)->flatten()->toArray()
        );

        return $this;
    }
<<<<<<< HEAD
=======

    public function hasConsoleCommand(string $commandClassName): static
    {
        $this->consoleCommands[] = $commandClassName;

        return $this;
    }

    public function hasConsoleCommands(...$commandClassNames): static
    {
        $this->consoleCommands = array_merge(
            $this->consoleCommands,
            collect($commandClassNames)->flatten()->toArray()
        );

        return $this;
    }
>>>>>>> 890ebdd96f7d6873ba198cc859e87d61062ce611
}
