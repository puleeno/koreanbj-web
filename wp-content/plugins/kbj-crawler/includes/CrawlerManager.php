<?php
namespace Kbj\Crawler;

use Kbj\Crawler\Datasource\kbj19;
use Kbj\Crawler\Procsessors\DataProcessing;
use Puleeno\WebdriverRequest\WebdriverClient;
use Ramphor\Rake\Abstracts\Tooth;
use Ramphor\Rake\Feeds\PagingFeed;
use Ramphor\Rake\Rake;

class CrawlerManager {
    public function setup() {
        $rake  = new Rake( 'rake_id', null, null, WebdriverClient::getInstance() );
        $tooth = new kbj19( 'cp_products', $rake );
        $feed  = new PagingFeed( 'vipbj' );
        $feed->parseUrl('https://www.vipbj.mom/?orderby=ID&order=ASC');
        $feed->setPaginateFormat('{{ scheme}}://{{ domain }}/{{ path }}/page/{{ page }}?orderby=ID&order=ASC');
        $feed->setTooth( $tooth );

        $tooth->registerProcessor( new DataProcessing() );
        $tooth->setFormat( Tooth::FORMAT_HTML );
        $tooth->addFeed( $feed );

        $rake->addTooth( $tooth );
        $rake->execute();
    }
}
