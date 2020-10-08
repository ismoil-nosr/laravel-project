<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class Pushall
{
    private $key;
    private $id;

    protected $url = 'https://pushall.ru/api.php';

    public function __construct($key, $id)
    {
        $this->key = $key;
        $this->id = $id;
    }

    public function send(\App\Post $post)
    {
        $data = [
            "type"  => "self",
            "url"  => url('/') . '/posts/' . $post->slug,
            "id"    => $this->id,
            "key"   => $this->key,
            "text"  =>  Str::limit($post->body, 80, '...'),
            "title" => $post->title,
        ];

        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $this->url,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_RETURNTRANSFER => true
        ]);

        $response = curl_exec($ch); 
        curl_close($ch);

        return $response;
    }
}