<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'employee';


}
