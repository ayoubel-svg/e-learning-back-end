<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
<<<<<<< HEAD
    use HasFactory;
    
    protected $fillable = [
        "title", "description", "Duration", "language", "price", "category", "image"
    ];

=======
    use HasFactory, SoftDeletes;
    protected $fillable = ["title", "description", "Duration", "language", "price", "category", "image"];
>>>>>>> 4d8ad6bf2cefafe93aa4e7674aa245c2b0635100
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
