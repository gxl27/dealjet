<?php

namespace App\Services\Admin\Source;

use App\Enums\Source;
use App\Services\Admin\Sync\WebsiteSync;

 class WebsiteSource extends ProviderSource
 {
 
    public function __construct(WebsiteSync $websiteSync)
    {
        $this->setSyncService($websiteSync);
    }

    public function getSource(): Source
    {
        return Source::WEBSITE;
    }

}