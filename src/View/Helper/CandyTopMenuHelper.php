<?php
declare(strict_types=1);

namespace App\View\Helper;

class CandyTopMenuHelper extends AppHelper
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
    }


    public function getTopMenu(): array
    {
        return [];
    }

}
