<?php

namespace App\DataObjects;

use Illuminate\Support\Arr;

class FeedItem
{

    protected $data = [];

    public static function create(array $params): FeedItem
    {
        $keys = [
            'title',
            'description',
            'author',
            'publish_at',
            'filesize',
            'guid',
            'link',
            'type',
            'duration',
            'image',
        ];

        $instance = new FeedItem();

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
