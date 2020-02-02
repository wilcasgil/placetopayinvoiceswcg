<?php

namespace Tests\Feature\Categories;

use App\Category;
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

        //$response->assertSee('categories');
    }

    /** @test */
    public function indexOfCategoriesHasContent()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('categories.index'));

        $response->assertSee('categories');
    }

    //Una categoria se visualiza correctamente en el index cuando existe
    public function testCategoryInformationIsDisplayedOnIndex()
    {
        $user = factory(User::class)->create();
        $category = factory(Category::class)->create();

        $response = $this->actingAs($user)->get(route('categories.index'));

        $response->assertSee($category->name);
    }
}
