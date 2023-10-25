<?php

namespace Kosmos\MustacheBundle;

use InvalidArgumentException;
use Mustache_Engine;
use Mustache_Template;
use RuntimeException;

class Mustache
{
    private Mustache_Engine $mustache;

    public function __construct(array $options)
    {
        $this->mustache = new Mustache_Engine($options);
    }

    /**
     * Renders a template.
     *
     * @param mixed $name       A template name
     * @param array $parameters An array of parameters to pass to the template
     *
     * @return string The evaluated template as a string
     *
     * @throws InvalidArgumentException if the template does not exist
     * @throws RuntimeException         if the template cannot be rendered
     */
    public function render($name, array $parameters = array()): string
    {
        return $this->load($name)->render($parameters);
    }

    /**
     * Loads the given template.
     *
     * @param mixed $name A template name or an instance of Mustache_Template
     *
     * @return Mustache_Template A \Mustache_Template instance
     *
     * @throws InvalidArgumentException if the template does not exist
     */
    private function load($name): Mustache_Template
    {
        if ($name instanceof Mustache_Template) {
            return $name;
        }

        return $this->mustache->loadTemplate($name);
    }
}
