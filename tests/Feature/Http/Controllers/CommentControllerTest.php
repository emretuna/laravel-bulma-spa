<?php

namespace Tests\Feature\Http\Controllers;

use App\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CommentController
 */
class CommentControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $comments = factory(Comment::class, 3)->create();

        $response = $this->get(route('comment.index'));
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CommentController::class,
            'store',
            \App\Http\Requests\CommentStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $comment = $this->faker->text;

        $response = $this->post(route('comment.store'), [
            'comment' => $comment,
        ]);

        $comments = Comment::query()
            ->where('comment', $comment)
            ->get();
        $this->assertCount(1, $comments);
        $comment = $comments->first();
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $comment = factory(Comment::class)->create();

        $response = $this->get(route('comment.show', $comment));
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CommentController::class,
            'update',
            \App\Http\Requests\CommentUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $comment = factory(Comment::class)->create();
        $comment = $this->faker->text;

        $response = $this->put(route('comment.update', $comment), [
            'comment' => $comment,
        ]);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $comment = factory(Comment::class)->create();

        $response = $this->delete(route('comment.destroy', $comment));

        $response->assertOk();

        $this->assertDeleted($comment);
    }
}
