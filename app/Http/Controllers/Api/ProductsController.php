<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Products::all();
    }

    public function store(Request $request)
    {
        
        $validator = $request->validate([
            'cod_produto' => 'required|max:255',
            'nome_produto' => 'required|max:255|unique:products',
            'valor_produto' => 'required|max:255',
            'estoque_produto' => 'required|max:255',
            'cidade' => 'required|max:255',
            'estado' => 'required|max:255',
        ]);
        
        Products::create([
            'cod_produto' => $validator['cod_produto'],
            'nome_produto' => $validator['nome_produto'],
            'valor_produto' => $validator['valor_produto'],
            'estoque_produto' => $validator['estoque_produto'],
            'cidade' => $validator['cidade'],
            'estado' => $validator['estado'],
        ]);

        return response()->json(['success' => 'Produto cadastrado com sucesso'], 200);
    }
    
    public function show($id)
    {
        return Products::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        if(!empty($request)) {
            Products::where('id', $id)->update([
                'cod_produto' => $request['cod_produto'],
                'nome_produto' => $request['nome_produto'],
                'valor_produto' => $request['valor_produto'],
                'estoque_produto' => $request['estoque_produto'],
            ]);
        }
        
        return response()->json(['success' => 'Produto editado com sucesso'], 200);
    }
    
    public function destroy($id)
    {
        Products::where('id', $id)->delete($id);
        return response()->json(['success' => 'Produto deletado com sucesso'], 200);
    }
}
