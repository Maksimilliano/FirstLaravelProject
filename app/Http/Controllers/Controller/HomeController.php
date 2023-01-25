<?php


namespace App\Http\Controllers\Controller;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Post;
use App\Models\Rubric;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index()
    {
       // DB::insert("INSERT INTO posts (title, content) VALUES (?, ?)", ['Article 5', 'Lorem ipsum 5']);

       // DB::update("UPDATE posts SET created_at = ?, updated_at = ? WHERE created_at IS NULL OR updated_at IS NULL", [NOW(), NOW()]);

      //  DB::delete("DELETE FROM posts WHERE id = :id", ['id'=> 4]);

      /*  DB::beginTransaction();
        try {
            DB::update("UPDATE posts SET created_at = ? WHERE created_at IS NULL", [NOW()]);
            DB::update("UPDATE posts SET updated_at = ? WHERE updated_at IS NULL", [NOW()]);
            DB::commit();
        } catch (\Exception $e){
            DB::rollBack();
            echo $e->getMessage();
        }


       $posts = DB::select("SELECT * FROM posts WHERE id >(:id)", ['id'=> 2]);
        echo '<pre>';
        print_r($posts);
        echo '</pre>';
*/
        //dump($_ENV['MY_SETTING']);
        //dump(env('MY_SETTING2'));
        //dump(config('app.timezone'));
        //dump(config('database.connections.mysql.database'));
        //dump($_ENV);
        //echo '<pre>';
        //print_r($data);
        //echo '</pre>';

       /* $post = new Post();
        $post->title = 'Article2';
        //$post->content = 'Lorem ipsum1';
        $post->save();
*/

        //$data = Country::all();
        //$data = Country::query()->limit(5)->get();
       // $data = Country::where('Code', '<', 'ALB')->select('Code', 'Name')->offset(1)->limit(2)->get();
       // $data = City::find(5);
        //$data = Country::find('AGO');
        //dd($data);
        /*$post = new Post();
        $post->title = 'Article3';
        $post->content = 'Lorem ipsum3';
        $post->save();
        */
        //Post::create(['title' => 'Article4', 'content'=> 'Lorem ipsum4']);
        /*$post = new Post();
        $post->fill(['title' => 'Article6', 'content'=> 'Lorem ipsum6']);
        $post->save();

        $post = Post::find(4);
        $post->content = 'Lorem ipsum3';
        $post->save();
*/
//        Post::where('id', '>', 3)
//            ->update(['updated_at'=> NOW()]);
//        $post = Post::find(6);
//        $post->delete();
         //Post::destroy(5);

//        $post = Post::find(3);
//        dump($post->title, $post->rubric->title);
//        $rubric = Rubric::find(3);
//        dump($rubric->title, $rubric->post->title);
//        $rubric = Rubric::find(1);
//        dump($rubric->posts);
//        $post = Post::find(2);
//        dump($post->title, $post->rubric->title);

        /*$posts = Rubric::find(1)->posts()->select('title')->where('id', '>','2')
        ->get();
        dump($posts);*/
       /* $posts = Post::with('rubric')->where('id', '>', '1')->get();
        foreach ($posts as $post){
            dump($post->title, $post->rubric->title);
        }*/
        /*
                $post = Post::find(5);
                dump($post->title);
                foreach ($post->tags as $tag){
                    dump($tag->title);
                }

                $tag = Tag::find(3);
                dump($tag->title);
                foreach ($tag->posts as $post){
                    dump($post->title);
                }*/
        $posts = Post::orderBy('id', 'desc')->get();
        $title = 'Home Page';

        return view('home', compact('title', 'posts'));

        //$data = DB::table('country')->get();
        //$data = DB::table('country')->limit(5)->get();
        //$data = DB::table('country')->select('Code', 'Name')->limit(5)->get();
        //$data = DB::table('country')->select('Code', 'Name')->first();
        //$data = DB::table('country')->select('Code', 'Name')->orderBy('Code','desc')->first();
        //$data = DB::table('city')->select('ID', 'Name')->find(2);
       /* $data = DB::table('city')->select('ID', 'Name')->where([
            array('id', '>', 1),
            ['id', '<', 5],
        ])->get();*/

        //$data = DB::table('city')->where('id', '<', 5)->value('Name');
        //$data = DB::table('country')->limit(10)->pluck('Name', 'Code');
        //$data = DB::table('country')->count();
        //$data = DB::table('country')->max('Population');
        //$data = DB::table('country')->min('Population');
        //$data = DB::table('country')->sum('Population');
        //$data = DB::table('country')->avg('Population');
        //$data = DB::table('city')->select('CountryCode')->distinct()->get();
       /* $data = DB::table('city')->select('city.ID', 'city.Name as city_name', 'country.Code',
        'country.Name as country_name')->limit(10)->join('country', 'city.CountryCode', '=',
        'country.Code')
            ->orderBy('city.ID')
            ->get();
        dd($data); */


    }

    public function test()
    {
        return __METHOD__;
    }


}
