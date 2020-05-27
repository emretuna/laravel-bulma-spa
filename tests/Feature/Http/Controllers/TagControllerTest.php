<?php

namespace Tests\Feature\Http\Controllers;

use App\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TagController
 */
class TagControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $tags = factory(Tag::class, 3)->create();

        $response = $this->get(route('tag.index'));
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TagController::class,
            'store',
            \App\Http\Requests\TagStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $tag = $this->faker->word;

        $response = $this->post(route('tag.store'), [
            'tag' => $tag,
        ]);

        $tags = Tag::query()
            ->where('tag', $tag)
            ->get();
        $this->assertCount(1, $tags);
        $tag = $tags->first();
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $tag = factory(Tag::class)->create();

        $response = $this->get(route('tag.show', $tag));
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TagController::class,
            'update',
            \App\Http\Requests\TagUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $tag = factory(Tag::class)->create();
        $tag = $this->faker->word;

        $response = $this->put(route('tag.update', $tag), [
            'tag' => $tag,
        ]);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $tag = factory(Tag::class)->create();

        $response = $this->delete(route('tag.destroy', $tag));

        $response->assertOk();

        $this->assertDeleted($tag);
    }
}
