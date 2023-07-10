<?php

namespace infrastructure\Facade;
use Illuminate\Support\Facades\Facade;
use Infrastructure\ImageService;

class ImagesFacade extends Facade{

    protected static function getFacadeAccessor(){

        return ImageService::class;
    }


}