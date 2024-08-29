<?php

namespace App\Enums;

enum Source: int
{
    case WEBSITE = 10;
    case PIPEDRIVE = 20;
    case SALESFORCE = 30;
    case UNKNOWN = 99;


    public function alias(): string
    {
        return match($this) 
        {
            Source::WEBSITE => 'Website',
            Source::PIPEDRIVE => 'Pipedrive',
            Source::SALESFORCE => 'Salesforce',
            Source::UNKNOWN => 'Unknown',
        };
    }

    public function isInternal(): bool
    {
        return match($this) 
        {
            Source::WEBSITE => true,
            Source::PIPEDRIVE => false,
            Source::SALESFORCE => false,
            Source::UNKNOWN => false,
        };
    }

    public static function getAllValues() :array
    {
        $array = [];
        $cases = Source::cases();
        for ($i = 0; $i < sizeof($cases); $i++) {
           
            $array[$i] = Self::getValues($cases[$i]);
        }
        
        return $array;
    }

    public static function getValues($enum) :array
    {
        return [
            'id' => $enum->value,
            'name' => $enum->alias(),
            'isInternal' => $enum->isInternal()
        ];
    }

    public static function getSources(): array
    {
        return array_column(Source::cases(), 'value');
    }

    public function toArray(): array
    {
        return [
            'value' => $this->value,
            'alias' => $this->alias(),
            'IsInternal' => $this->isInternal()
        ];
    }
}
