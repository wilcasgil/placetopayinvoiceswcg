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
    }

    /**
     * indexOfCategoriesHasContent
     * Contenido estatico de la vista.
     *
     * @test
     */
    public function indexOfCategoriesHasContent()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('categories.index'));

        $response->assertSee('categories');
        $response->assertSee('Create a new category', route('categories.create'));
        $response->assertSee('Name');
        $response->assertSee('Actions');
    }

    /**
     * CategoryInformationIsDisplayedOnIndex
     * Una categoria se visualiza correctamente en el index cuando existe.
     * Contenido dinamico de la vista.
     *
     * @test
     */
    public function categoryInformationIsDisplayedOnIndex()
    {
        $user = factory(User::class)->create();
        $category = factory(Category::class)->create();

        $response = $this->actingAs($user)->get(route('categories.index'));

        $response->assertSee(route('categories.show', $category));
        $response->assertSee('Edit', route('categories.edit', $category));
        $response->assertSee('Delete', '/categories/'.$category->id.'/confirmDelete');
    }
}
