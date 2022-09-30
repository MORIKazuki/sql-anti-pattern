<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentTreePath extends Model
{
    protected $primaryKey = ['ancestor', 'descendant'];

    public $incrementing = false;

    protected $fillable = [
        'ancestor',
        'descendant',
        'path_length',
    ];
}
