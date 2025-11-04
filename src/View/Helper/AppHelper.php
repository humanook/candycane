<?php
declare(strict_types=1);

namespace App\View\Helper;

use Cake\View\Helper;

/**
 * Application Helper
 *
 * @package candycane
 */
class AppHelper extends Helper
{
    /**
     * initialize
     *
     * @param array $config
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);
    }

    /**
     * @param string $text
     * @return array
     */
    protected function parseWrapWord(string $text): array
    {
        if (str_contains($text, '|') === true) {
            $tags = explode('|', $text, 2);
            if (count($tags) === 1) {
                $tags[] = '';
            }
        } else {
            $tags = [$text, ''];
        }

        return $tags;
    }
}
