<?php

namespace Modules\Knowledgebase\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'kbcategories';
    protected $fillable = ['id', 'slug', 'name', 'description', 'status', 'parent', 'created_at', 'updated_at'];
}
