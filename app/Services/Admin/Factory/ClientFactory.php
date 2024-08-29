<?php

namespace App\Services\Admin\Factory;

use App\Enums\Source;
use App\Contracts\ModelInterface;
use App\Services\Admin\Model\ClientWebsiteModel;
use App\Services\Admin\Model\ClientPipeDriveModel;
use App\Services\Admin\Model\ClientSalesforceModel;
use App\Services\Admin\Factory\AbstractModelFactory;

class ClientFactory extends AbstractModelFactory
{
    public function __construct(protected Source $enumSource)
    {
        //
    }
    
    public function create(): ModelInterface
    {
        $model = match ($this->enumSource->alias()) {
            'Pipedrive' => new ClientPipeDriveModel(),
            'Website' => new ClientWebsiteModel(),
            'Salesforce' => new ClientSalesforceModel(),
            default => throw new \InvalidArgumentException('Invalid client source provided.'),
        };
      
        return $model;
    }
}