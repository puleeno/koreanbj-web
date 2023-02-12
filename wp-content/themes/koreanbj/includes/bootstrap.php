<?php

use Jankx\TemplateEngine\Engines\Latte;

final class KoreanBJ_Bootstrap
{
    public function useLatteEngine()
    {
        add_filter('jankx/template/engine/apply', function () {
            return Latte::class;
        });
    }
}

new KoreanBJ_Bootstrap();
