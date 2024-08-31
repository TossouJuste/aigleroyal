<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        return view('admin.galleries.index', compact('galleries'));
    }

     // Afficher une galerie spécifique
     public function show($id)
     {
         $gallery = Gallery::findOrFail($id);
         return view('admin.galleries.show', compact('gallery'));
     }
     

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Générer un nom unique pour l'image
    $imageName = time().'.'.$request->image->extension();

    // Déplacer l'image dans le répertoire 'public' de 'storage/app'
    $request->image->storeAs('public', $imageName);

    // Créer une nouvelle entrée dans la base de données
    Gallery::create([
        'title' => $request->title,
        'description' => $request->description,
        'image' => $imageName,
    ]);

    return redirect()->route('admin.galleries.index')->with('success', 'Image added successfully.');
}


    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $imageName = $gallery->image;
    
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($gallery->image) {
                Storage::delete('public/' . $gallery->image);
            }
    
            // Enregistrer la nouvelle image dans le même répertoire que lors de la création
            $imageName = time().'.'.$request->image->extension();
            $request->image->storeAs('public', $imageName);
        }
    
        $gallery->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
        ]);
    
        return redirect()->route('admin.galleries.index')->with('success', 'Image mise à jour avec succès.');
    }
    
    public function destroy(Gallery $gallery)
    {
        // Supprimer l'image du disque si elle existe
        if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
            Storage::disk('public')->delete($gallery->image);
        }
    
        // Supprimer la galerie
        $gallery->delete();
    
        // Rediriger vers la liste des galeries avec un message de succès
        return redirect()->route('admin.galleries.index')->with('success', 'Image deleted successfully.');
    }
    
    // app/Http/Controllers/GalleryController.php
public function showInVitrine()
{
   $galleries = Gallery::paginate(12); // Récupère toutes les galeries
    return view('vitrine.gallery', compact('galleries')); // Passe les galeries à la vue
}

   
}
