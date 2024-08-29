<?php

namespace App\Services\Admin\Factory;

use App\Enums\Source;
use App\Contracts\ModelInterface;
use App\Services\Admin\Model\DealWebsiteModel;
use App\Services\Admin\Model\DealPipeDriveModel;
use App\Services\Admin\Model\DealSalesforceModel;
use App\Services\Admin\Factory\AbstractModelFactory;

class DealFactory extends AbstractModelFactory
{
    public function __construct(protected Source $enumSource)
    {
        //
    }
    
    public function create(): ModelInterface
    {
        $model = match ($this->enumSource->alias()) {
            'Pipedrive' => new DealPipeDriveModel(),
            'Website' => new DealWebsiteModel(),
            'Salesforce' => new DealSalesforceModel(),
            default => throw new \InvalidArgumentException('Invalid deal source provided.'),
        };
      
        return $model;
    }
}