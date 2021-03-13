<?php
namespace App\Http\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Unirest;

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
        $response = Http::get('https://platform.clickatell.com/messages/http/send?apiKey='.$this->key.'&to='.$this->to.'&content='.$this->content);
    }
}
