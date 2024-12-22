<?php

namespace Tests\Feature;

use App\Caixa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class MeuPrimeiroTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    // public function testCaixaContemItem ()
    // {
    //     $caixa = new Caixa(['zequinha', 'bileide', 'mateus']);
    //     $this->assertTrue($caixa->contem('bileide'));
    //     // $this->assertFalse($caixa->contem('bileide'));
    // }

    // public function testPegarUmItem ()
    // {
    //     $caixa = new Caixa(['lençol']);
    //     $this->assertEquals('lençol', $caixa->pegarUm());
    //     // $this->assertFalse($caixa->contem('bileide'));
    //     $this->assertNull($caixa->pegarUm());
    // }

    // public function testComecaComLetra()
    // {
    //     $caixa = new Caixa(['suceta', 'arroz', 'alface', 'celular', 'computador']);

    //     // $result = $caixa->comecaCom('a');

    //     // $this->assertCount(2, $result);
    //     // $this->assertContains('buceta', $result);
    //     // $this->assertContains('alface', $result);

    //     $this->assertEmpty($caixa->comecaCom('t'));
    // }


    // public function testPostCustomers() 
    // {
    //     $customer = [
    //         "name" => "kauanSouza", 
    //         "type" => "B", 
    //         "email" => "kauanSouza@gmail.com", 
    //         "address" => "rua das ostras", 
    //         "city" => "alcobaça", 
    //         "state" => "Bahia", 
    //         "postalCode" => "99879-213", 
    //     ];

    //     $response = $this->post('api/v1/customers', $customer);
    //     $response->assertStatus(200)->assertJson([
    //         'created' => true,
    //     ]);
    // }

    // public function testGetCustomers() {
    //     $response = $this->get('api/v1/customers');

    //     $response->assertStatus(200);
    // }

    public function test_avatars_can_be_uploaded(): void
    {
        Storage::fake('avatars');
 
        $file = UploadedFile::fake()->image('avatar.jpg');
 
        $response = $this->post('/avatar', [
            'avatar' => $file,
        ]);
 
        Storage::disk('avatars')->assertExists($file->hashName());
    }
}
