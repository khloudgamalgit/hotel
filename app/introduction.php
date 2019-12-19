<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class introduction extends Model
{
	protected $fillable = ['video_url', 'description'];
	public $table="introduction";
	public $timestamps = false;

}
