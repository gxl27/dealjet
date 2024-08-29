<?php

namespace App\Services\Admin\Sync;

use App\Contracts\SyncInterface;
use App\Enums\Source;

class SalesforceSync implements SyncInterface
{
   public function sync(Source $source): array
   {
      // API call
      return [];
   }

}