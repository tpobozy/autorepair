<?php

namespace App;

class CustomApplication extends \Illuminate\Foundation\Application
{
    
    public function langPath()
    {
        return $this->basePath.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'resources'.DIRECTORY_SEPARATOR.'lang';
    }

}
