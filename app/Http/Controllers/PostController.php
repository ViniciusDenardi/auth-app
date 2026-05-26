<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index()
    {
        $posts = Post::all();
   
        $categorias = Categoria::all();

        return view('Post.index', compact('posts', 'categorias'));
        //
    }


    /**
     * Show the form for creating a new resource.
     */
    
    public function create()
    {
        $categorias = Categoria::all();

        return view ('Post.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {
        // Validar dados
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB
            'categorias_id' => 'required|exists:categorias,id',
        ], [
            'image.image' => 'O arquivo deve ser uma imagem válida.',
            'image.mimes' => 'A imagem deve ser do tipo: jpeg, png, jpg ou gif.',
            'image.max' => 'A imagem não pode ser maior que 2MB.',
        ]);

        // Processar upload da imagem
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('post', 'public');
            $validated['image'] = $imagePath;
        }

        // Criar post
        Post::create($validated);

        return redirect()->route('Post.index')->with('success', 'Post criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
   // 1. Mude o argumento para $Post (Maiúsculo)
public function edit(Post $Post) 
{
    $categorias = Categoria::all();

    // Mantemos a chave como 'post' minúsculo para não precisar alterar sua view inteira!
    return view('Post.edit', ['post' => $Post, 'categorias' => $categorias]);
}

// 2. Mude o argumento para $Post (Maiúsculo)
public function update(Request $request, Post $Post) 
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'text' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'categorias_id' => 'required|exists:categorias,id',
    ]);

    if ($request->hasFile('image')) {
        if ($Post->image && Storage::disk('public')->exists($Post->image)) {
            Storage::disk('public')->delete($Post->image);
        }
        $imagePath = $request->file('image')->store('post', 'public');
        $validated['image'] = $imagePath;
    }

    // Atualiza usando a variável corrigida
    $Post->update($validated); 

    return redirect()->route('Post.index')->with('success', 'Post atualizado com sucesso!');
}
    /**
     * Remove the specified resource from storage.
     */
   /**
 * Remove the specified resource from storage.
 */
public function destroy(Post $Post) // <-- 'P' maiúsculo aqui
{
    // Deletar imagem se existir (usando a variável corrigida)
    if ($Post->image && Storage::disk('public')->exists($Post->image)) {
        Storage::disk('public')->delete($Post->image);
    }

    // Agora o Laravel sabe exatamente qual registro deletar
    $Post->delete();

    // Redireciona de volta para o index com uma mensagem de sucesso
    return redirect()->route('Post.index')->with('success', 'Post deletado com sucesso!');
}
}
