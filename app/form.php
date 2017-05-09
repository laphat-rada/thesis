<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use  Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class form extends Eloquent {
	protected $table = 'form';
}
?>