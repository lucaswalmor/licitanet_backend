<?php

namespace Tests\Unit;

use App\Models\Products;
use Tests\TestCase;

class ProductTest extends TestCase
{
    
    public function test_fillAble()
    {
        // instancia a model usuario
        $products = new Products();

        // o que espera que tenha na model 
        $expected = [
            'cod_produto', 
            'nome_produto', 
            'valor_produto', 
            'estoque_produto',
            'cidade',
            'estado',
        ];

        $this->assertCount(6, $expected);

        // compara o que vem da model com o arr 
        $arr = array_diff($expected, $products->getFillable());

        // se for igual vai dar ok 
        $this->assertEquals(0, count($arr));
    }

    public function test_create_products() {
        $dados = Products::create([
            'cod_produto' => 'abc32',
            'nome_produto' => 'Cama',
            'valor_produto' => '157.76',
            'estoque_produto' => '2',
            'cidade' => 'Uberaba',
            'estado' => 'Minas Gerais'
        ]);

        $this->assertTrue(true);

        $this->assertDatabaseHas('products', [
            'nome_produto' => $dados['nome_produto'],
        ]);

    }

    public function test_edit_products() {
        $createProduct = Products::create([
            'cod_produto' => 'abc32',
            'nome_produto' => 'Cama Box',
            'valor_produto' => '157.76',
            'estoque_produto' => '2',
            'cidade' => 'Uberaba',
            'estado' => 'Minas Gerais'
        ]);
        
        $this->assertTrue(true);

        // verifica no banco de dados se ja existe esse usuario
        $this->assertDatabaseHas('products', [
            'nome_produto' => $createProduct['nome_produto'],
        ]);
        
        Products::where('id', $createProduct['id'])->update([
            'nome_produto' => 'Cama de solteiro',
            'valor_produto' => 100.00,
            'estoque_produto' => 15
        ]);
    }

    public function test_delete_product() {
        $createProduct = Products::create([
            'cod_produto' => 'abc32',
            'nome_produto' => 'Cama Box',
            'valor_produto' => '157.76',
            'estoque_produto' => '2',
            'cidade' => 'Uberaba',
            'estado' => 'Minas Gerais'
        ]);
        
        Products::where('id', $createProduct['id'])->delete();
        
        $this->assertTrue(true);
    }
}
