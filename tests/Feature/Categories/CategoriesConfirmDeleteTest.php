<?php

namespace Tests\Feature\Categories;

use App\Category;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriesConfirmDeleteTest extends TestCase
{
    /** @test */
    public function guestUsersCannotDeleteCategories()
    {
        $this->get('/categories/{id}/confirmDelete')->assertRedirect(route('login'));
    }

    /** @test */
    public function loggedInUsersCanDeleteCategories()
    {
        $this->withoutExceptionHandling();  //Mostrar el error. Quitarlo cuando el test pase

        $user = factory(User::class)->create();
        $category = factory(Category::class)->create();

        $response = $this->actingAs($user)->get('/categories/{id}/confirmDelete');

        //$response->assertOk();
        $response->assertSuccessful();

        $response->assertViewIs('confirmDelete');
    }
}
