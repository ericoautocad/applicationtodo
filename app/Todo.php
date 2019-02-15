<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    
    const CREATED_AT = 'date_created';
    
    const UPDATED_AT = 'date_updated';

    protected $table = 'todos';
    
    protected $primaryKey = 'uuid';

    protected $fillable = ['content', 'type', 'sort_order', 'done'];
}
