<?php

namespace App\Enums;

enum ClientStatus: int
{
    case ACTIVE = 10;
    case BLACKLISTED = 80;
    case DELETED = 90;

    public function alias() :string
    {
        return match($this) 
        {
            ClientStatus::ACTIVE => 'Active',
            ClientStatus::BLACKLISTED => 'Blacklisted',
            ClientStatus::DELETED => 'Deleted',
        };
    }

    public static function getAllValues() :array
    {
        $array = [];
        $cases = ClientStatus::cases();
        for ($i = 0; $i < sizeof($cases); $i++) {
           
            $array[$i] = Self::getValues($cases[$i]);
        }
        
        return $array;
    }

    public static function getValues($enum) :array
    {
        return [
            'id' => $enum->value,
            'name' => $enum->alias()
        ];
    }

    public static function getClientStatuses(): array
    {
        return array_column(ClientStatus::cases(), 'value');
    }

    public function toArray(): array
    {
        return [
            'value' => $this->value,
            'alias' => $this->alias(),
        ];
    }

}
