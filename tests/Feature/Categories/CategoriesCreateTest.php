<?php

namespace Tests\Feature\Categories;

use App\Category;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriesCreateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guestUsersCannotCreateCategories()
    {
        $this->get(route('categories.create'))->assertRedirect(route('login'));
    }

    /** @test */
    public function loggedInUsersCanCreateCategories()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('categories.create'));

        $response->assertOk();

        $response->assertViewIs('category.create');
    }

    /** @test */
    public function createViewOfCategoriesHasContent()
    {
        $user = factory(User::class)->create();
        //$categories = factory(Category::class)->create();

        $response = $this->actingAs($user)->get(route('categories.create'));

        $response->assertSee('New Category');
        $response->assertSee('Back', route('categories.index'));
        $response->assertSee('Name');
        $response->assertSee(route('categories.store'));
    }
}
