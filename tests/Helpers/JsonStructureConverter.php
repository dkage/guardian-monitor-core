<?php

namespace Tests\Helpers;

use Illuminate\Testing\TestResponse;

class JsonStructureConverter
{
    public static function convert(string $jsonFilePath): array
    {
        $jsonContent = file_get_contents($jsonFilePath);
        $jsonData = json_decode($jsonContent, true);

        return self::traverse($jsonData);
    }

    private static function traverse(array $data): array
    {
        $result = [];
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $result[$key] = self::traverse($value);
            } else {
                $result[] = $key;
            }
        }
        return $result;
    }
}
