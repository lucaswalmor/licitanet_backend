<?php

namespace Tests\Unit;

use App\Models\Products;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_get_products()
    {
        $response = $this->get('/api/products');
 
        $response->assertStatus(200);
    }

    public function test_get_one_products()
    {
        $dados = Products::create([
            'cod_produto' => 'abc32',
            'nome_produto' => 'Cama',
            'valor_produto' => '157.76',
            'estoque_produto' => '2',
            'cidade' => 'Uberaba',
            'estado' => 'Minas Gerais'
        ]);

        $response = $this->get('/api/products/' . $dados['id']);
 
        $response->assertStatus(200);
    }

    public function test_create_products_route()
    {
        $response = $this->postJson('/api/products', [
            'cod_produto' => 'abc32',
            'nome_produto' => 'Garf',
            'valor_produto' => '157.76',
            'estoque_produto' => '2',
            'cidade' => 'Uberaba',
            'estado' => 'Minas Gerais'
        ]);
 
        $response->assertStatus(200);
    }

    public function test_edit_one_products()
    {
        $dados = Products::create([
            'cod_produto' => 'abc32',
            'nome_produto' => 'FAQUEIRO',
            'valor_produto' => 157.76,
            'estoque_produto' => '2',
            'cidade' => 'Uberaba',
            'estado' => 'Minas Gerais'
        ]);

        $response = $this->putJson('/api/products/' . $dados['id'], [
            'cod_produto' => 'abc32',
            'nome_produto' => 'Faca',
            'valor_produto' => 157.76,
            'estoque_produto' => '2',
            'cidade' => 'Uberaba',
            'estado' => 'Minas Gerais'
        ]);

        $response->assertStatus(200);
    }

    public function test_delete_one_products()
    {
        $dados = Products::create([
            'cod_produto' => 'abc32',
            'nome_produto' => 'Isqueiro',
            'valor_produto' => 157.76,
            'estoque_produto' => '2',
            'cidade' => 'Uberaba',
            'estado' => 'Minas Gerais'
        ]);

        $response = $this->deleteJson('/api/products/' . $dados['id'], [
            'id' => $dados['id']
        ]);
        
        $response->assertStatus(200);
    }
}
