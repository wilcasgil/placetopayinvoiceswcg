<?php

namespace Tests\Feature\Categories;

use App\Category;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriesEditTest extends TestCase
{
    //use RefreshDatabase;

    /** @test */
    public function guestUsersCannotEditCategories()
    {
        $this->get('/categories/{id}/edit')->assertRedirect(route('login'));
    }

    /** @test */
    public function loggedInUsersCanEditCategories()
    {
        $this->withoutExceptionHandling();  //Mostrar el error. Quitarlo cuando el test pase

        $user = factory(User::class)->create();
        $category = factory(Category::class)->create();

        $response = $this->actingAs($user)->get('/categories/' . $category->id . '/edit');

        $response->assertOk();

        $response->assertViewIs('category.edit');
    }

    /** @test */
    public function editViewOfCategoriesHasContent()
    {
        $user = factory(User::class)->create();
        $category = factory(Category::class)->create();

        $response = $this->actingAs($user)->get(route('categories.edit', $category));

        $response->assertSee('Edit Category');
        $response->assertSee('Back', route('categories.index'));
        $response->assertSee('Name');
        $response->assertSee(route('categories.update', $category));
    }
}
