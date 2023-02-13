<?php
namespace Kbj\Crawler\Datasource;

use Puleeno\Rake\WordPress\Traits\WordPressTooth;
use Ramphor\Rake\Abstracts\CrawlerTooth;

class kbj19 extends CrawlerTooth {
    use WordPressTooth;


    public function validateUrl($url) {
    }
}
