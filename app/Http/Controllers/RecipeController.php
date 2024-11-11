<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $recipes = Recipe::all();
        return view('recipe.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $usercheck = Auth::check();
        $user_id = $usercheck ? Auth::user()->id : 0;
        if ($user_id == 0) {
            return redirect('/login');
        }
        return $usercheck && Auth::user()->isadmin ? view('admin.formaddrecipe', compact('user_id')) : view('clients.formaddrecipe', compact('user_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'content_recipe' => 'required',
            'user_id' => 'required',
            'image_file' => 'image',
        ]);
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/banner/';
            $file->move($path, $filename);
        }
        $content = $this->processDataContent($request->content_recipe);
        // dd($content);
        Recipe::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id,
            'image' => $path . $filename,
            'content' =>  $content,
        ]);
        return redirect()->route('recipe')->with('msg', 'Recipe created success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $path = explode("/", request()->path());
        $recipe = Recipe::find($id);
        if (!isset($recipe->id)) {
            return redirect()->route('/');
        }
        return view('clients.detailrecipe', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user_id = Auth::check() ? Auth::user()->id : 0;
        $recipe = Recipe::find($id);
        return view('admin.formeditrecipe', compact('recipe', 'user_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'content_recipe' => 'required',
            'user_id' => 'required',
            'image_file' => 'image',
        ]);
        $recipe = Recipe::findOrFail($id);
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/banner/';
            $file->move($path, $filename);
        }
        $content = $this->processDataContent($request->content_recipe);
        if (isset($recipe)) {
            if (!$request->hasFile('image_file')) {
                $recipe->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'user_id' => $request->user_id,
                    'content' =>  $content,
                ]);
            } else {
                $recipe->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'user_id' => $request->user_id,
                    'image' => $path . $filename,
                    'content' =>  $content,
                ]);
            }
            return redirect()->route('recipe')->with('msg', 'update recipe successfully');
        } else {
            return redirect()->route('recipe')->with('msg', 'update recipe failure');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $recipe = Recipe::findOrFail($id);
        if (isset($recipe)) {
            $image_path = public_path($recipe->image);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            $recipe->delete();
            return redirect()->route('recipe')->with('msg', 'delete recipe successfully');
        } else {
            return redirect()->route('recipe')->with('msg', 'delete recipe failure');
        }
    }
    // process data cotent
    public function processDataContent($content)
    {
        $dom = new \DOMDocument();
        $previously = libxml_use_internal_errors(true);
        // $contentType = '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
        $dom->loadHTML('<meta http-equiv="Content-Type" content="charset=utf-8">' . $content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $xmlErrors = libxml_get_errors();
        $imageFile = $dom->getElementsByTagName('imageFile');
        foreach ($imageFile as $item => $image) {
            $data = $image->getAttribute('src');

            list($type, $data) = explode(';', $data);

            list(, $data)      = explode(',', $data);

            $imgeData = base64_decode($data);

            $image_name = "/upload/" . time() . $item . '.png';

            $path = public_path() . $image_name;

            file_put_contents($path, $imgeData);

            $image->removeAttribute('src');

            $image->setAttribute('src', $image_name);
        }
        unset($xmlErrors);
        libxml_clear_errors();
        libxml_use_internal_errors($previously);
        $newcontent = $dom->saveXML();
        // dd($dom, $newcontent);
        return $newcontent;
    }
}
