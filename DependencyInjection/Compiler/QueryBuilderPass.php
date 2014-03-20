<?php
/**
 * File containing the AddFieldTypePass class.
 *
 * @copyright Copyright (C) 1999-2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace EzSystems\QueryBuilderBundle\DependencyInjection\Compiler;

use EzSystems\QueryBuilderBundle\Generator\QueryBuilderGenerator;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * This compiler pass will register eZ Publish field types.
 */
class QueryBuilderPass implements CompilerPassInterface
{
    /**
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     *
     * @throws \LogicException
     */
    public function process( ContainerBuilder $container )
    {
        $generator = new QueryBuilderGenerator();
        $generator->setSkeletonDirs(
            array(
                '/home/bertrand/ezpublish5/vendor/ezsystems/query-builder-bundle/EzSystems/QueryBuilderBundle/Resources/skeletons/',
                '/home/bertrand/ezpublish5/vendor/ezsystems/query-builder-bundle/EzSystems/QueryBuilderBundle/Resources/'
            )
        );
        $generator->generate(
            $this->gatherCriteria( $container ),
            $this->gatherFieldTypes( $container )
        );
    }

    private function gatherCriteria( ContainerBuilder $container )
    {
        $criteria = array();
        foreach ( $container->findTaggedServiceIds( 'ezpublish.api.content_query_criterion' ) as $serviceId => $serviceTags )
        {
            $definition = $container->findDefinition( $serviceId );
            $criteria[] = array(
                'class' => $container->getParameter( trim( $definition->getClass(), '%' ) ),
                'worker_type' => $serviceTags[0]['type']
            );
        }
        return $criteria;
    }

    private function gatherFieldTypes( ContainerBuilder $container )
    {
        $fieldTypes = array();
        foreach ( $container->findTaggedServiceIds( 'ezpublish.fieldType' ) as $serviceId => $serviceTags )
        {
            $definition = $container->findDefinition( $serviceId );
            $fieldTypeClass = $container->getParameter( trim( $definition->getClass(), '%' ) );
            $fieldTypeClassName = $this->getFieldTypeClassName( $fieldTypeClass );
            $workerType = $this->getFieldTypeWorkerType( $fieldTypeClassName );
            if ( $workerType === false )
            {
                continue;
            }
            $fieldTypes[] = array(
                'id' => $fieldTypeClassName,
                'worker_type' => $workerType
            );
        }
        return $fieldTypes;
    }

    private function getFieldTypeWorkerType( $fieldTypeClassName )
    {
        $map = array(
            'Author' => 'text',
            'BinaryFile' => 'text',
            'Checkbox' => 'bool',
            'Country' => 'text',
            'Date' => 'date',
            'DateAndTime' => 'date',
            'EmailAddress' => 'text',
            'Float' => 'text',
            'FullText' => 'text',
            'Image' => 'text',
            'Integer' => 'text',
            'Keyword' => 'text',
            'Media' => 'text',
            'MapLocation' => 'text',
            'Price' => 'text',
            'Rating' => 'text',
            'RichText' => 'text',
            'TextLine' => 'text',
            'Time' => 'date',
            'Tweet' => 'text',
            'Subtree' => 'text',
            'XmlText' => 'text',
        );

        if ( isset( $map[$fieldTypeClassName] ) )
        {
            return $map[$fieldTypeClassName];
        }

        return false;
    }

    /**
     * @param $fieldTypeClass
     *
     * @return mixed
     */
    private function getFieldTypeClassName( $fieldTypeClass )
    {
        list( $fieldTypeClassName ) = array_slice( explode( '\\', $fieldTypeClass ), -2, 1 );

        return $fieldTypeClassName;
    }
}
