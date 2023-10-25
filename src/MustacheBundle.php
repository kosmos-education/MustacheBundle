<?php

declare(strict_types=1);

namespace Kosmos\MustacheBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
class MustacheBundle extends Bundle
{

    public function build(ContainerBuilder $container): void
    {
        parent::build($container);
    }
}
