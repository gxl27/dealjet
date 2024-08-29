<?php

namespace App\Services\Admin\Source;

use App\Enums\Source;
use App\Services\Admin\Sync\PipeDriveSync;
use App\Services\Admin\Source\ProviderSource;

 class PipeDriveSource extends ProviderSource
{
    public function __construct(PipeDriveSync $pipedriveSync)
    {
        $this->setSyncService($pipedriveSync);
        $this->setSource(Source::PIPEDRIVE);
    }
}