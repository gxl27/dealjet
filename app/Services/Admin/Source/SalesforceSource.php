<?php

namespace App\Services\Admin\Source;

use App\Enums\Source;
use App\Services\Admin\Sync\SalesforceSync;
use App\Services\Admin\Source\ProviderSource;

 class SalesforceSource extends ProviderSource
{

    public function __construct(SalesforceSync $salesforceSync)
    {
        $this->setSyncService($salesforceSync);
    }

    public function getSource(): Source
    {
        return Source::SALESFORCE;
    }

}