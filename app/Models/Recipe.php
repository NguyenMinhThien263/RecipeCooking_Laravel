<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'image',
        'content',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function scopeSearch($query, $search = '')
    {
        $query->where('title', 'like', '%' . $search . '%');
    }
}
