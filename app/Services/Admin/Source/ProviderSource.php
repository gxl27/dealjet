<?php

namespace App\Services\Admin\Source;

use App\Enums\Source;
use App\Contracts\SyncInterface;
use App\Services\Admin\Factory\ClientFactory;
use App\Services\Admin\Factory\DealFactory;
use Database\Imports\MockProviderData;

class ProviderSource 
{
    protected SyncInterface $syncInterface;
    protected Source $source;

    public function setSyncService(SyncInterface $syncInterface): void
    {
        $this->syncInterface = $syncInterface;
    }

    public function syncronizeData(string $entityString): void
    {
        // get the data from the gateway
        $data = env('MOCK_DATA') 
            ? MockProviderData::mockData(entityString: $entityString, source: $this->getSource())
            : $this->syncInterface->sync($this->getSource());
        
            // create modelCollection for data normalization and save
        $modelFactory = match ($entityString) {
            'deals' => new DealFactory($this->getSource()),
            'clients' => new ClientFactory($this->getSource()),
            default => throw new \InvalidArgumentException('Invalid entity string provided.'),
        };

        // normalize the data and save the models into DB
        $modelFactory->create()->saveAll($data);
    }

    public function setSource(Source $source): self
    {
        $this->source = $source;

        return $this;
    }

    public function getSource(): Source
    {
        return $this->source;
    }

}