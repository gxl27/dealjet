<?php

namespace App\Services\Admin\Sync;

use App\Enums\Source;
use App\Contracts\SyncInterface;

class PipeDriveSync implements SyncInterface
{
   public function sync(Source $source): array
   {
      // API call
      return [];
   }

}