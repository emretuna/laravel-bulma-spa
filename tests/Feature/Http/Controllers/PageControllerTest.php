<?php

namespace Tests\Feature\Http\Controllers;

use App\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PageController
 */
class PageControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $pages = factory(Page::class, 3)->create();

        $response = $this->get(route('page.index'));
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PageController::class,
            'store',
            \App\Http\Requests\PageStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $page = $this->faker->word;

        $response = $this->post(route('page.store'), [
            'page' => $page,
        ]);

        $pages = Page::query()
            ->where('page', $page)
            ->get();
        $this->assertCount(1, $pages);
        $page = $pages->first();
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $page = factory(Page::class)->create();

        $response = $this->get(route('page.show', $page));
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PageController::class,
            'update',
            \App\Http\Requests\PageUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $page = factory(Page::class)->create();
        $page = $this->faker->word;

        $response = $this->put(route('page.update', $page), [
            'page' => $page,
        ]);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $page = factory(Page::class)->create();

        $response = $this->delete(route('page.destroy', $page));

        $response->assertOk();

        $this->assertDeleted($page);
    }
}
