<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $visible = ['id', 'name', 'description', 'numberOfTopics'];
    protected $appends = ['numberOfTopics'];
    // protected $appends = ['number_of_topics'];

    protected $fillable = ['id', 'name', 'description'];

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

    public function getNumberOfTopicsAttribute() 
    {
        return $this->topics->count();
    }

}
