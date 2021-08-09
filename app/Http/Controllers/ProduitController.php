<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;



class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Produits=Produit::all();
        return view('index')->with('Produits',$Produits);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile("cover")){
            $file=$request->file("cover");
            $imageName=time().'_'.$file->getClientOriginalName();
            $file->move(\public_path("cover/"),$imageName);

            $produit=new produit([
                "nom"=>$request->nom,
                "quantite"=>$request->quantite,
                "categorie"=>$request->categorie,                            
                "cover"=>$imageName,
                "adm_Nom"=>$request->adm_nom ,  
            ]);
            $produit->save();
        }

        if($request->hasFile("images")){
            $files=$request->file("images");
            foreach($files as $file){
                $imageName=time().'_'.$file->getClientOriginalName();
                $request['produit_id']=$produit->id;
                $request['image']=$imageName;
                $file->move(\public_path("/images"),$imageName);
                images::create($request->all());
            }
        }
        return redirect("/");
    }

    /**
     * Display the specified resource.    App\http\Controllers\Image
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    // public function show(Produit $produit)
    // {
    //     $produit = Produit::all();
    //     return view('show', ['produit' => $produit]);
    // }  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Produits=Produit::findOrFail($id);
        return view('edit')->with('Produits',$Produits);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produit $produit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produits=Produit::findOrFail($id);

        if(File::exists("cover/".$produits->cover)){
            File::delete("cover/".$produits->cover);
        }
        $images=Images::where("produit_id",$produits->id)->get();
        foreach($images as $image){
            if(File::exists("images/".$image->image)){
                File::delete("images/".$image->image);
            }
        }
        $produits->delete();
        return back();
    }
}
