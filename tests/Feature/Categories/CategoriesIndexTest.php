<?php

namespace Tests\Feature\Categories;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @internal
 * @coversNothing
 */
class CategoriesIndexTest extends TestCase
{
    use RefreshDatabase;  //Correr las migraciones

    /** @test */
    public function guestUsersCannotListCategories()
    {
        $this->get(route('categories.index'))->assertRedirect(route('login'));
    }

    /** @test */
    public function loggedInUsersCanListCategories()
    {
        $this->withoutExceptionHandling();  //Mostrar el error. Quitarlo cuando el test pase

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('categories.index'));

        $response->assertOk();
        //$response->assertSuccessful();

        $response->assertViewIs('category.index');

        $response->assertSee('categories');
    }
}
