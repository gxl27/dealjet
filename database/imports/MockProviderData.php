<?php

namespace Database\Imports;

use App\Enums\Source;

class MockProviderData 
{
    public static function mockData(string $entityString, Source $source)
    {
        return match ($entityString) {
            'deals' => self::createDeals($source),
            'clients' => self::createClients($source),
            default => throw new \InvalidArgumentException('Invalid entity string provided.'),
        };

    }

    private static function createClients(Source $source)
    {

        $clients = [];
        $randomNumber = rand(10, 20);

        for ($i = 0; $i < $randomNumber; $i++) { 
            $client = [
                'email' => fake()->unique()->safeEmail(),
                'last_name' => fake()->lastName()
            ];
            if ($source == SOURCE::PIPEDRIVE) {
                $client['first_name'] = fake()->firstName();
            }

            if ($source == SOURCE::SALESFORCE) {
                $client['firstname'] = fake()->firstName();
            }

            if ($source == SOURCE::WEBSITE) {
                $client['firstName'] = fake()->firstName();
            }

            $clients[$i] = $client;
        }

        return $clients;
    }

    private static function createDeals(Source $source)
    {
        $deals = [];
        $randomNumber = rand(10, 20);

        for ($i = 0; $i < $randomNumber; $i++) { 
            $deal = [
                'email' => fake()->unique()->safeEmail(),
                'last_name' => fake()->lastName()
            ];
            if ($source == SOURCE::PIPEDRIVE) {
                $deal['first_name'] = fake()->firstName();
            }

            if ($source == SOURCE::SALESFORCE) {
                $deal['firstname'] = fake()->firstName();
            }

            if ($source == SOURCE::WEBSITE) {
                $deal['firstName'] = fake()->firstName();
            }
            $deals[$i] = $deal;
        }

        return $deals;
    }

}