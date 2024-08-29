<?php

namespace App\Contracts;

use App\Enums\Source;

interface SyncInterface 
{
    public function sync(Source $source): array;
}