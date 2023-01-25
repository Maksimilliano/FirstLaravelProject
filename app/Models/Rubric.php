<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * Class Rubric
 * @package App\Models
 * @mixin Builder
 */
class Rubric extends Model
{
    use HasFactory;
    // $rubric = Rubric::find(1);
    // $rubric->post
    public function posts(){
        return $this->hasMany(Post::class);

    }

}
