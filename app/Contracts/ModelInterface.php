<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;

interface ModelInterface 
{
    public function save(array $data): Model;

    public function saveAll(array $data): void;
}