<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;


/**
 * Class Post
 * @package App\Models
 * @mixin Builder
 */
class Post extends Model
{
    use HasFactory;

    // protected $table = 'my_posts';
    //  protected $primaryKey = 'post_id';
    //    public $incrementing = false;
    //    protected $keyType = 'string';
    //    public $timestamps = false;
   // protected $attributes = [ 'content'=> 'Lorem ipsum...',];
    protected $fillable = ['title', 'content', 'rubric_id'];

    public function rubric(){
        return $this->belongsTo(Rubric::class);
    }


    public function tags(){
        return $this->belongsToMany(Tag::class);

    }

    public function getPostDate(){
        /*$formatter = new \IntlDateFormatter('ru_Ru', \IntlDateFormatter::FULL,
            \IntlDateFormatter::FULL);
        $formatter->setPattern('d MMM y');
        return $formatter->format(new \DateTime($this->created_at));*/
        return Carbon::parse($this->created_at)->diffForHumans();

        /*\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->format('d.m.Y');*/
    }

}
