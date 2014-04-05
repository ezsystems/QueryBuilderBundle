<?php

namespace EzSystems\QueryBuilderBundle;

use EzSystems\QueryBuilderBundle\DependencyInjection\Compiler\QueryBuilderPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class EzSystemsQueryBuilderBundle extends Bundle
{
    public function build( ContainerBuilder $container )
    {
        parent::build( $container );
    }
}
