<?php
/**
 * File containing the QueryBuilderGenerator class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\Generator;

use eZ\Publish\API\Repository\Values\Content\Query\Criterion;
use InvalidArgumentException;
use Sensio\Bundle\GeneratorBundle\Generator\Generator;

class QueryBuilderGenerator extends Generator
{
    /**
     * @var array[] $criteria
     * @var array[] $criteria
     */
    public function generate( array $criteria = array(), array $fieldTypes = array() )
    {
        $parameters = array(
            'criterion_list' => $this->processCriterionClasses( $criteria ),
            'fieldtype_list' => $this->processFieldTypeClasses( $fieldTypes )
        );

        $this->renderFile( 'QueryBuilder/QueryBuilder.php.twig', null, $parameters );
        $this->renderFile( 'QueryBuilder/CriterionBuilder.php.twig', null, $parameters );
        $this->renderFile( 'QueryBuilder/QueryBuilderInterface.php.twig', null, $parameters );
        $this->renderFile( 'QueryBuilder/CriterionBuilderInterface.php.twig', null, $parameters );
    }

    protected function renderFile( $template, $target, $parameters )
    {
        if ( $target === null )
            $target = $this->getTarget( $template );
        if (!is_dir(dirname($target))) {
            mkdir(dirname($target), 0777, true);
        }

        return file_put_contents($target, $this->render($template, $parameters));
    }

    /**
     * Returns the target file matching $template
     * @param string $template
     */
    protected function getTarget( $template )
    {
        $map = array(
            'QueryBuilder/QueryBuilder.php.twig' => 'app/cache/dev/QueryBuilder.php',
            'QueryBuilder/CriterionBuilder.php.twig' => 'app/cache/dev/CriterionBuilder.php',
            'QueryBuilder/QueryBuilderInterface.php.twig' => 'app/cache/dev/QueryBuilderInterface.php',
            'QueryBuilder/CriterionBuilderInterface.php.twig' => 'app/cache/dev/CriterionBuilderInterface.php',
        );

        if ( !isset( $map[$template] ) )
        {
            throw new InvalidArgumentException( "Unknown template $template" );
        }

        return $map[$template];
    }

    protected function getWorkerClassName( $workerId )
    {
        $map = array(
            'date' => 'DateCriterionFactoryWorker',
            'identifier' => 'IdentifierCriterionFactoryWorker',
            'id' => 'IdCriterionFactoryWorker',
            'text' => 'TextCriterionFactoryWorker',
            'bool' => 'BooleanCriterionFactoryWorker'
        );

        if ( !isset( $map[$workerId] ) )
        {
            throw new InvalidArgumentException( "Unknown worker id '$workerId'" );
        }

        return $map[$workerId];
    }

    private function processCriterionClasses( $criteria )
    {
        $criterionClasses = array();
        foreach ( $criteria as $criterionStruct )
        {
            $reflectionClass = new \ReflectionClass( $criterionStruct['class'] );
            $workerClassName = $this->getWorkerClassName( $criterionStruct['worker_type'] );
            $criterionClasses[] = array(
                'id' => lcfirst( $reflectionClass->getShortName() ),
                'class' => $criterionStruct['class'],
                'worker_type' => $criterionStruct['worker_type'],
                'worker_classname' => $workerClassName
            );
        }
        return $criterionClasses;
    }

    private function processFieldTypeClasses( $fieldTypes )
    {
        $fieldTypeClasses = array();

        foreach ( $fieldTypes as $fieldTypeStruct )
        {
            $workerClassName = $this->getWorkerClassName( $fieldTypeStruct['worker_type'] );
            $fieldTypeClasses[] = array(
                'id' => lcfirst( $fieldTypeStruct['id'] ),
                'worker_type' => $fieldTypeStruct['worker_type'],
                'worker_classname' => $workerClassName
            );
        }

        return $fieldTypeClasses;
    }
}
