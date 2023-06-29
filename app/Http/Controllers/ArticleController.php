<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Validator;
use \App\Http\Requests\StoreArticleRequest;
use App\Models\Category;
use  Illuminate\Support\Str;

class ArticleController extends Controller
{

    public function homepage()
    {
        return view('welcome');
    }


    public function create()
    {
        $categories = Category::all();

        $action= route('articles.store');
        $method= 'POST';
        $article= new Article();

        return view('articles.form', compact('categories', 'action', 'method', 'article'));
    }
    public function store(Request $request)
    {

        // METODO IN CUI CUI SALVA DUE VOLTE (PIù RICHIESTE AL DB), ANCHE SE MENO CODICE
        // $article= Article::create($request->all());
        // $article->image=$imagePath;
        // $article->save();


        // METODO IN CUI CUI SALVA 1 VOLTA (MENO RICHIESTA AL DATABASE), ANCHE SE PIù CODICE
        $article = new Article();

        $article->title = $request->title;
        $article->user_id = auth()->user()->id;

        $article->body = $request->body;

        $article->save();

        $article->categories()->attach($request->categories);


        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            // primo modo di caricare immagine
            $fileName = $request->file('image')->getClientOriginalName();

            //secondo modo di caricare immagine
            $randomFileName = uniqid('image_') . '.' . $request->file('image')->extension();

            //terzo modo di caricare immagine
            $seoFriendlyFileName = Str::slug($request->title) . '.' . $request->file('image')->extension();


            $imagePath = $request->file('image')->storeAs('public/images/' . $article->id, $seoFriendlyFileName);

            $article->image = $imagePath;


            $article->save();
        }


        return redirect()->route('articles.index')->with(['success' => 'Articolo creato correttamente']);
    }




    public function index()
    {
        // Primo metodo per chiamare gli articoli di uno specifico user
        // $articles = Article::where('user_id', auth()->user()->id)->get();

        // Secondo metodo 
        $articles = auth()->user()->articles;

        return view('articles.index', ['articles' => $articles]);
    }

    public function edit(Article $article){
        if($article->user_id !== auth()->user()->id){
            abort(403);
        }

        $categories=Category::all();

        $action=  route('articles.update', $article);
        $method= 'PUT';

        return view('articles.form', compact('article', 'categories', 'action', 'method'));

    }
    public function update(Request $request, Article $article){
        


        $article->fill($request->all())->save();

        $article->categories()->detach();
        $article->categories()->attach($request->categories);



        return redirect()->back()->with(['success'=> 'Articolo modificato con successo']);

    }

    public function destroy(Article $article){
        if($article->user_id !== auth()->user()->id){
            abort(403);
        }

        // elimino categorie collegate
        $article->categories()->detach();

        // elimino articolo
        $article->delete();

        return redirect()->back()->with(['success'=>'Articolo cancellato']);
    }



    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }


}
