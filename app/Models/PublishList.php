<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class PublishList extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'publish_list';

    protected $fillable = [
        'uid',
        'location',
        'location_detail',
        'name',
        'sex',
        'age',
        'room_type',
        'budget',
        'contact',
        'contact_detail',
        'note',
        'Handler'
    ];

}
