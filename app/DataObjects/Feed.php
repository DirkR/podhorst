<?php

namespace App\DataObjects;

use Illuminate\Support\Arr;

class Feed
{

    protected $data = [];

    public static function create(array $params): Feed
    {
        $keys = [
            'title',
            'description',
            'link',
            'image',
            'author',
            'email',
            'category',
            'language',
            'copyright',
            'last_build_date',
        ];

        $instance = new Feed();

        foreach ($params as $key => $value) {
            if (in_array($key, $keys)) {
                $instance->data[$key] = $value;
            }
        }
        return $instance;
    }

    public function __get($name)
    {
        return Arr::get($this->data, $name);
    }

}
