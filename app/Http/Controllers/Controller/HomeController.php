<?php


namespace App\Http\Controllers\Controller;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Post;
use App\Models\Rubric;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    public function index(Request $request)
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

        //dump($request->session()->all());
        /*$request->session()->put('test', 'Test Value');
        session(['cart'=>[
            ['id'=> 1, 'title'=> 'Product1'],
            ['id'=> 2, 'title'=> 'Product2'],
        ]]);*/
        //dump(session('test'));
        //dump(session('cart') [1] ['title']);
        //dump($request->session()->get('cart') [0] ['title']);
        //$request->session()->push('cart', ['id'=> 3, 'title'=> 'Product3']);
        //dump($request->session()->pull('test'));
        //$request->session()->forget(['test', 'Test Value']);
        //$request->session()->flush();
        //dump(session()->all());
        //Cookie::queue('test', 'Test cookie', 5);
        //Cookie::queue(Cookie::forget('test'));
        //dump(Cookie::get('test'));
        //dump($request->cookie('test'));

        //Cache::put('key', 'Value', 300);
        //Cache::forget('key');
        //dump(Cache::get('key'));
        //Cache::put('key', 'Value', 300);
        //Cache::flush();
        /*dump(Cache::pull('key'));
        dump(Cache::get('key'));*/


        /*if (Cache::has('posts')){
            $posts = Cache::get('posts');
        }else{
            $posts = Post::orderBy('id', 'desc')->get();
            Cache::put('posts', $posts);
        }*/

        $posts = Post::orderBy('created_at', 'desc')->paginate(3);
        /* Log::warning($posts);
        \Debugbar::warning($posts);*/
        $title = 'Home Page';

        return view('home', compact('title', 'posts'));

    }

        public function create(){
            $title = 'Create Post';
            $rubrics = Rubric::pluck('title', 'id')->all();
            return view('create', compact('title', 'rubrics'));
        }



        public function store(Request $request){

            /*dump($request->input('title'));
            dump($request->input('content'));
            dd($request->input('rubric_id'));*/

            //return redirect('/home');
            //dd($request->all());

            $this->validate($request, [
                'title'=> 'required|min:5|max:100',
                'content'=> 'required',
                'rubric_id'=> 'integer',
            ]);

            /*$rules = [
                'title'=> 'required|min:5|max:100',
                'content'=> 'required',
                'rubric_id'=> 'integer',
            ];

            $messages = [
                'title.required' => 'Заполнте название поля',
                'title.min' => 'Минимум 5 символов в названии',
                'content.required' => 'Заполните содержимое поста',
                'rubric_id.integer' => 'Выберите рубрику из списка',
            ];

            $validator = Validator::make($request->all(), $rules, $messages)->validate();*/

            Post::create($request->all());
            $request->session()->flash('success', 'Данные сохранены!');
        return redirect()->route('home');

        }




}
