<?php


namespace App;


use Illuminate\Database\Eloquent\Model;


class Slide extends Model
{

    protected $table='slide';

    const PUBLISH_N = 'N';
    const PUBLISH_Y = 'Y';
	const PUBLISH = [self::PUBLISH_N , self::PUBLISH_Y];

}

