<?php

namespace App\View\Helper;

use Cake\Event\Event;
use Cake\View\Helper;
use Netcarver\Textile\Parser;

class CandyViewHelper extends Helper
{
    public function textilizable($text, $options=[]): string
    {
        $parser = new Parser('html5');
        $text = $parser->parse($text);
        // @todo 2025-08-06 元のコードから転記、不要かどうかを判定する
//        $text = preg_replace_callback('/(!)?(\[\[([^\]\n\|]+)(?:\|([^\]\n\|]+))?()\]\])/',
//            array($this, '_replaceWikiLinks'),
//            $text);
//        $text = preg_replace_callback('{([\s\(,\-\>]|^)(!)?(attachment|document|version|commit|source|export|message)?((#|r)(\d+)|(:)([^"\s<>][^\s<>]*?|"[^"]+?"))(?=(?=[[:punct:]]\W)|\s|<|$)}',
//            array($this, '_replaceCandycaneLinks'),
//            $text);
        $event = new Event('Helper.Candy.afterTextilizable',$this,[
            'text' => $text
        ]);
        $this->getView()->getEventManager()->dispatch($event);
        if( empty($event->getResult()['text']) === false )
        {
            $text = $event->getResult()['text'];
        }
        return $text;
    }
}
