<?php
/**
 * File containing the QueryBuilderTestCommand class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 * @version //autogentag//
 */

namespace EzSystems\QueryBuilderBundle\Command;

use eZ\Publish\API\Repository\QueryBuilder;
use eZ\Publish\API\Repository\Values\Content\Content;
use eZ\Publish\API\Repository\Values\Content\Query;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Helper\TableHelper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class QueryBuilderTestCommand extends ContainerAwareCommand
{
    protected function execute( InputInterface $input, OutputInterface $output )
    {
        // get the query from a method to have proper type hinting
        $queryBuilder = $this->getQueryBuilder();

        // use the fluent API to build the query
        $queryBuilder
            ->contentTypeIdentifier()->in( 'article', 'blog_post' )
            ->textLineField( 'title' )->contains( 'service' )
            ->textLineField( 'title' )->not()->contains( 'enterprise' )
            ->contentId()->not()->in( 81 )
            ->sortBy()
                ->contentName()->descending();

        $query = $queryBuilder->getQuery();

        if ( $output->getVerbosity() > OutputInterface::VERBOSITY_NORMAL )
        {
            $output->writeln( '' );
            $output->writeln( "QUERY: $query" );
            $output->writeln( '' );
        }

        // run the query, and print out the results
        $this->printSearchResults(
            $output,
            $query
        );
    }

    protected function configure()
    {
        $this->setName( 'query-builder:test' );
    }

    /** 
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder
     */
    private function getQueryBuilder()
    {
        return $this->getContainer()->get( 'ezpublish.api.query_builder' );
    }
    
    private function printSearchResults( OutputInterface $output, Query $query )
    {
        $searchService = $this->getContainer()->get( 'ezpublish.api.service.search' );
        $results = $searchService->findContent( $query );

        if ( $results->totalCount === 0 )
        {
            $output->writeln( "No results" );
            return;
        }

        $output->writeln( '' );
        $output->writeln( "<options=bold>{$results->totalCount} results</options=bold>" );
        $output->writeln( '' );
        $table = $this->getTableHelper();
        $table->setHeaders( array( 'Content ID', 'Name', 'Type' ) );
        foreach ( $results->searchHits as $searchHit )
        {
            /** @var Content $content */
            $content = $searchHit->valueObject;

            $table->addRow(
                array(
                    $content->id,
                    $content->contentInfo->name,
                    $this->getContentTypeIdentifier( $content->contentInfo->contentTypeId )
                )
            );
        }
        $table->render( $output );
    }

    /**
     * @return TableHelper
     */
    private function getTableHelper()
    {
        return $this->getHelperSet()->get( 'table' );
    }

    private function getContentTypeIdentifier( $contentTypeId )
    {
        static $contentTypeIdIdentifierMap = array();

        if ( !isset( $contentTypeIdIdentifierMap[$contentTypeId] ) )
        {
            $contentTypeService = $this->getContainer()->get( 'ezpublish.api.service.content_type' );
            $contentTypeIdIdentifierMap[$contentTypeId] = $contentTypeService->loadContentType( $contentTypeId )->identifier;
        }

        return $contentTypeIdIdentifierMap[$contentTypeId];
    }
}
