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

    /**
     * @param string $defaultTitle
     * @return string
     */
    public function getPageMetaTitle(string $defaultTitle):string
    {
        $title = $this->getView()->fetch('title_for_layout','');
        if (empty($title) === false)
        {
            $title = $title . ' - ' . $defaultTitle;
        }
        else
        {
            $title = $defaultTitle;
        }
        return $title;
    }

    /**
     * @param string $title
     * @return void
     */
    public function setPageMetaTitle(string $title): void
    {
        $this->getView()->assign('title_for_layout', $title);
    }

    /**
     * @param string $defaultTitle
     * @return string
     */
    public function getPageHeaderTitle(string $defaultTitle):string
    {
        return $this->getView()->fetch('title_for_header',$defaultTitle);
    }


    /**
     * @param string $title
     * @return void
     */
    public function setPageHeaderTitle(string $title): void
    {
        $this->getView()->assign('title_for_header', $title);
    }
}
