<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Recipes;
use Illuminate\Support\Facades\Response;

class RecipesController extends Controller
{
    public function fileReName($name)
    {
        $FullName = explode('.', $name);
        $extension = end($FullName);
        $file_name = $FullName[0];
        return $file_name . rand(10, 999) . '.' . $extension;
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = DB::table('recipes')->orderBy('updated_at', 'desc')->paginate(10);
        return view('Recipes.index',  ['recipes' => $recipes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recipes = DB::table('recipes')->orderBy('updated_at', 'desc')->paginate(10);
        return response(['recipes' => $recipes]);
        //return 'dzialaa';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {

            $request->validate([
                'title' => 'required|min:5|max:255',
                'short' => 'required|min:20|max:255',
                'description' => 'required|min:20',
            ]);
            if ($request->hasFile('file')) {
                $destinationPath = 'upload';
                $file = $request->file('file');
                $FullName = explode('.', $file->getClientOriginalName());
                $extension = end($FullName);
                $file_name = $FullName[0];
                $path = $file_name . rand(10, 999) . '.' . $extension;
                $file->move($destinationPath, $path);

                $recipes = new Recipes();
                $recipes->category = $request->category;
                $recipes->title = $request->title;
                $recipes->photo = 'upload/' . $path;
                $recipes->short = $request->short;
                $recipes->description = $request->description;
                $recipes->save();
            }
        }
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Recipes::find($id);
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
        if ($request->ajax()) {

            $request->validate([
                'title' => 'required|min:5|max:255',
                'short' => 'required|min:20|max:255',
                'description' => 'required|min:20',
            ]);
            $recipes = App\Recipes::find($request->id);

            if ($request->change == true) {
                $destinationPath = 'upload';
                $file = $request->file('file');
                $FullName = explode('.', $file->getClientOriginalName());
                $extension = end($FullName);
                $file_name = $FullName[0];
                $path = $file_name . rand(10, 999) . '.' . $extension;
                $file->move($destinationPath, $path);
                $recipes->photo = 'upload/' . $path;
                //return "add photo";
            }
            
            $recipes->category = $request->category;
            $recipes->title = $request->title;
            $recipes->short = $request->short;
            $recipes->description = $request->description;
            $recipes->save();
            return $id;
        }
    }
    public function editpost(Request $request)
    {
        if ($request->ajax()) {

            $request->validate([
                'title' => 'required|min:5|max:255',
                'short' => 'required|min:20|max:255',
                'description' => 'required|min:20',
            ]);
            $recipes = Recipes::find($request->id);

            
            
            $recipes->category = $request->category;
            $recipes->title = $request->title;
            $recipes->short = $request->short;
            $recipes->description = $request->description;
            $recipes->save();
            return $request->id;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $recipe = Recipes::find($request->id);
        $recipe->delete();
    }
}
