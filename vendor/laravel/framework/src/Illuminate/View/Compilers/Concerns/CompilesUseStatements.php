<?php

namespace Illuminate\View\Compilers\Concerns;

trait CompilesUseStatements
{
    /**
     * Compile the use statements into valid PHP.
     *
     * @param  string  $expression
     * @return string
     */
    protected function compileUse($expression)
    {
<<<<<<< HEAD
        $segments = explode(',', preg_replace("/[\(\)]/", '', $expression));
=======
        $expression = preg_replace('/[()]/', '', $expression);

        // Preserve grouped imports as-is...
        if (str_contains($expression, '{')) {
            $use = ltrim(trim($expression, " '\""), '\\');

            return "<?php use \\{$use}; ?>";
        }

        $segments = explode(',', $expression);
>>>>>>> 890ebdd96f7d6873ba198cc859e87d61062ce611

        $use = ltrim(trim($segments[0], " '\""), '\\');
        $as = isset($segments[1]) ? ' as '.trim($segments[1], " '\"") : '';

        return "<?php use \\{$use}{$as}; ?>";
    }
}
