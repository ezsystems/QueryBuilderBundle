<?php
/**
 * File containing the BaseCriterionBuilder class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder;

use eZ\Publish\API\Repository\Values\Content\Query\Criterion;
use eZ\Publish\Core\Base\Exceptions\InvalidArgumentException;
use eZ\Publish\Core\Base\Exceptions\InvalidArgumentType;

abstract class BaseCriterionBuilder
{
    /**
     * @var CriterionFactoryWorkerRegistry
     */
    protected $criterionFactoryWorkerRegistry;

    /**
     * Only used when building as an expression builder.
     * @var \eZ\Publish\API\Repository\Values\Content\Query\Criterion[]
     */
    protected $criterionArray = array();

    public function __construct( CriterionFactoryWorkerRegistry $criterionFactoryWorkerRegistry )
    {
        $this->criterionFactoryWorkerRegistry = $criterionFactoryWorkerRegistry;
    }

    public function addCriterion( Criterion $criterion )
    {
        $this->criterionArray[] = $criterion;
    }

    /**
     * Returns the array of criteria from {@see $criterionArray}
     */
    public function getCriteria()
    {
        return $this->criterionArray;
    }

    /**
     * Creates a factory worker of type $id
     *
     * @param string $id id of a value builder from {@see self::$valueBuilders}
     * @param string $criterionClass The FQN of the Criterion class
     * @param string $criterionTarget Optional criterion target
     *
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\CriterionFactoryWorker
     * @throws \eZ\Publish\API\Repository\Exceptions\InvalidArgumentException If value builder with this ID is found
     *
     */
    protected function startCriterionFactoryWork( $id, $criterionClass, $criterionTarget = null )
    {
        return $this->criterionFactoryWorkerRegistry->create(
            $id,
            $this->getFactoryBuilder(),
            new CriterionFactory( $criterionClass, $criterionTarget )
        );
    }

    /**
     * Creates a Worker of $type with a field criterion targeted at $fieldIdentifier
     */
    protected function startFieldCriterionFactoryWork( $type, $fieldIdentifier, $customCriterionClass = null )
    {
        return $this->startCriterionFactoryWork(
            $type,
            $customCriterionClass ?: 'eZ\Publish\API\Repository\Values\Content\Query\Criterion\Field',
            $fieldIdentifier
        );
    }

    /**
     * Returns the builder that must be injected the product of the factories.
     *
     * Returns $this by default.
     *
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder\CriterionBuilder
     */
    protected function getFactoryBuilder()
    {
        return $this;
    }

    public function __call( $methodName, $arguments )
    {
        if ( $methodName !== 'and' && $methodName !== 'or' )
        {
            throw new InvalidArgumentException( 'methodName', "Unknown method $methodName" );
        }

        if ( $methodName === 'and' )
        {
            if ( !$arguments[0] instanceof CriterionBuilder )
            {
                throw new InvalidArgumentType( 'criterionBuilder', "CriterionBuilder", $arguments[0] );
            }
            $this->addCriterion(
                new Criterion\LogicalAnd( $arguments[0]->getCriteria() )
            );
        }

        if ( $methodName === 'or' )
        {
            if ( !$arguments[0] instanceof CriterionBuilder )
            {
                throw new InvalidArgumentType( 'criterionBuilder', "CriterionBuilder", $arguments[0] );
            }
            $this->addCriterion(
                new Criterion\LogicalOr( $arguments[0]->getCriteria() )
            );
        }

        return $this;
    }
}
