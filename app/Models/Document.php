<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function programChair(){
        return $this->belongsTo(ProgramChair::class);
    }

    public function faculty(){
        return $this->belongsTo(Faculty::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function attachments(){
        return $this->hasMany(Attachment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
