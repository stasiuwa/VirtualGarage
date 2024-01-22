<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Car;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(int $id)
    {
        $car = Car::find($id);
        $posts = DB::table('posts')->where('car_id','=', $id)->limit('3')->orderBy('mileage', 'desc')->get();
        return view('/cars/details', ['car' => $car, 'posts' => $posts]);
    }
    public function show(int $id)
    {
        $car = Car::find($id);
//        $posts = Post::all()->where('car_id','=', $id);
//          nie działa tutaj ten sposob - podaje obiekt innego typu, a w przypadku aut juz tak
        $posts = DB::table('posts')->where('car_id','=', $id)->orderBy('mileage', 'desc')->get();
        return view('/cars/posts/index', ['posts' => $posts, 'car' => $car]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cars.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, int $id)
    {
        $car = Car::find($id);

        $this->validate($request, [
            'type' => ['required', 'string','max:64'],
            'details' => ['required', 'string','max:255'],
            'mileage' => ['required', 'integer'],
            'price' => ['gte:0'],
        ]);

        $post = new Post;
        $post->user_id = Auth::id();
        $post->car_id = $id;

        $post->type = $request->input('type');
        $post->date = date('Y-m-d');
        $post->mileage = $request->input('mileage');
        $post->details = $request->input('details');
        $post->price = $request->input('price');

        $newMileage = $request->input('mileage');

        if($newMileage > $car->mileage) {
            $car->mileage = $newMileage;
            $car->save();
        }
        $post->save();

        return redirect('cars/' . $id . '/posts');
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $post = Post::find($id);
        return view('cars.posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $newPost = $request->validate([
            'type' => ['required', 'string','max:64'],
            'details' => ['required', 'string','max:255'],
            'mileage' => ['required', 'integer'],
            'price' => ['gte:0'],
        ]);

        try {
            $oldPost = Post::find($id);
            if($oldPost){
                $oldPost->type = $newPost['type'];
                $oldPost->details = $newPost['details'];
                $oldPost->price = $newPost['price'];
                $oldPost->mileage = $newPost['mileage'];

                $oldPost->save();
            }
        } catch (UniqueConstraintViolationException) {
            return redirect('posts')->withErrors(['id' => 'Niepoprawne id postu'])->withInput();
    }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $post = Post::find($id);
        if($post->user_id == Auth::id()){
            $post->delete();
        }
        return back();
    }
}
