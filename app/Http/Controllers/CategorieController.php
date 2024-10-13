<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $categorie = Categorie::all();
            return response()->json($categorie);
        } catch (\Exception $e) {
            return response()->json("propleme de recuperation des donnée");
        }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $categorie = new Categorie([
          "nomcategorie"=>$request-> input("nomcategorie"),
          "imagecategorie"=>$request-> input("imagecategorie")
        
        
        
        
        ]);
        $categorie->save();
            return response()->json($categorie);
        } catch (\Exception $e) {
            return response()->json("insertion impossible");
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
    
      

try {
    $categorie = Categorie::findOrFail($id);
    return response()->json($categorie);
} catch (\Exception $e) {
    return response()->json("recruperation des categorie impossible {$e->getmessage()}");
}

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $categorie=Categorie::findOrFail($id);
            $categorie->update($request->all());


            return response()->json($categorie);
        } catch (\Exception $e) {
            return response()->json( $e->getmessage());
        }
        
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $id)
    {
        


try {
    $categorie = Categorie::find($id);
$categorie->delete();
return response()->json('Catégorie supprimée !');
} 

catch (\Exception $e) {


 
    return response()->json("recruperation des categorie impossible {$e->getmessage()}");


}







    }}

