<?php

namespace App\Services\Admin\Model;

use App\Enums\Source;
use App\Models\Client;
use App\Enums\ClientStatus;
use App\Contracts\ModelInterface;


class ClientPipeDriveModel implements ModelInterface
{
    public function save(array $data): Client
    {
        return Client::firstOrCreate(
            [
                'email' => $data['email']
            ],
            [
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'source' => Source::PIPEDRIVE,
                'status' => ClientStatus::ACTIVE
            ]
        );
    }

    public function saveAll(array $data): void
    {
        foreach ($data as $row) {
            $this->save($row);
        }
    }
}