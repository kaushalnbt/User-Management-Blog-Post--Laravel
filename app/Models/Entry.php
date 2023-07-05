<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;
    protected $table = 'users';
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'Name', 'Email', 'Phone', 'Address', 'Gender', 'Hobbies', 'State','image'
    ];
    public function getBlogs() 
    {
        return $this->hasMany('App\Models\Blogs','users_id');
    }
}
