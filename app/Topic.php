<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Topic extends Model
{
    use SoftDeletes;
    protected $table = 'topics';
    protected $primaryKey = 'topic_id';
}
