<?php

namespace Tests\Feature\Categories;

use App\Category;
use App\Subcategory;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriesShowTest extends TestCase
{
    //use RefreshDatabase;

    /** @test */
    public function guestUsersCannotShowCategories()
    {
        $category = factory(Category::class)->create();

        $this->get(route('categories.show', $category))->assertRedirect(route('login'));
    }

    /** @test */
    public function loggedInUsersCanShowCategories()
    {
        $this->withoutExceptionHandling();  //Mostrar el error. Quitarlo cuando el test pase

        $user = factory(User::class)->create();
        $category = factory(Category::class)->create();

        $response = $this->actingAs($user)->get(route('categories.show', $category));

        $response->assertOk();

        $response->assertViewIs('category.show');
    }

    /** @test */
    public function showOfCategoriesHasContent()
    {
        $user = factory(User::class)->create();
        $category = factory(Category::class)->create();

        $response = $this->actingAs($user)->get(route('categories.show', $category));

        $response->assertSee('Category');
        $response->assertSee('Details');        
        $response->assertSee('Name');
        $response->assertSee('Price');
        $response->assertSee('Stock');
    }

    /** @test */
    public function categoryInformationIsDisplayedOnIndex()
    {
        $user = factory(User::class)->create();
        $category = factory(Category::class)->create();
        $subcategory = factory(Subcategory::class)->create();

        $response = $this->actingAs($user)->get(route('categories.show', $category));

        $response->assertSee(route('subcategories.show', $subcategory));
        //$response->assertSee('Edit', route('categories.edit', $category));
        //$response->assertSee('Delete', '/categories/' . $category->id . '/confirmDelete');
    }
}
