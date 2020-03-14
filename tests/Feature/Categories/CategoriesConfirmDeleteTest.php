<?php

namespace Tests\Feature\Categories;

use App\Category;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriesConfirmDeleteTest extends TestCase
{
    use RefreshDatabase;

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

        $response = $this->actingAs($user)->get('/categories/' . $category->id . '/confirmDelete');

        $response->assertOk();

        $response->assertViewIs('category.confirmDelete');
    }

    /** @test */
    public function confirmDeleteViewOfCategoriesHasContent()
    {
        $user = factory(User::class)->create();
        $category = factory(Category::class)->create();

        $response = $this->actingAs($user)->get('/categories/' . $category->id . '/confirmDelete');

        $response->assertSee('Delete Category', $category->name );
        $response->assertSee('Back', route('categories.index'));
        $response->assertSee('Edit', route('categories.edit', $category));
        $response->assertSee('Details');
        $response->assertSee('Id');
        $response->assertSee(route('categories.destroy', $category->id));
        //$response->assertClick('button[type=submit]');
    }
}
