<?php
namespace App\Http\Helpers;

use Illuminate\Support\Facades\Http;

class SMS{


    protected $key;
    protected $content;
    protected $to;

    public function __construct($content, $to){
        $this->key = ENV('CLICKATELL_KEY');
        $this->content = $content;
        $this->to = $to;

            //It is what it is
            $this->send();
    }

    //Send the boys their tings skraaa
    public function send(): void
    {
        Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => $this->key
        ])->post('https://platform.clickatell.com/messages', [
            json_encode([
                'content' => $this->content,
                'to' => $this->to
            ], JSON_THROW_ON_ERROR)
        ]);
    }
}
