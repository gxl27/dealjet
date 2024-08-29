<?php

namespace App\Services\Admin\Factory;

use App\Enums\Source;
use App\Contracts\ModelInterface;

abstract class AbstractModelFactory 
{
    abstract function create(): ModelInterface;
}