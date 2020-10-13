<?php

namespace Tests\Feature;

use App\Article;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ArticleCreateTest extends TestCase
{
    use RefreshDatabase, DatabaseMigrations;

    /** @test */
    public function unauthorized_user_cannot_create_article()
    {
        $this->get('/article/create')->assertRedirect('/login');
        $this->post('/articles')->assertRedirect('/login');
    }

    /** @test */
    public function authorized_user_can_create_article()
    {
        // $this->withoutExceptionHandling();
        $this->signIn();

        $article = factory(Article::class)->make();
        
        $response = $this->post('/articles', $article->toArray());

        $this->get($response->headers->get('Location'))->assertSee($article->title);
    }

    /** @test */
    public function unauthorized_users_cannot_delete_article()
    {
        $article = factory(Article::class)->create();
        
        $this->delete('article/'.$article->id)->assertRedirect('/login');
    }

    /** @test */
    public function authorized_users_can_delete_article()
    {
        $this->signIn();

        $article = factory(Article::class)->create();
        
        $this->delete('article/'.$article->id);

        $this->assertDatabaseMissing('articles', ['id' => $article->id]);
    }

    /** @test */
    public function unauthorized_users_cannot_update_article()
    {        
        $article = factory(Article::class)->create();

        $this->patch('article/'.$article->id)->assertRedirect('/login');
    }

    /** @test */
    public function authorized_users_can_update_article()
    {   
        // $this->withoutExceptionHandling();
        $this->signIn();
        
        $article = factory(Article::class)->create();

        $updatedTitle = 'Updated title';
        $this->patch('article/'.$article->slug, ['title' => $updatedTitle]);

        $this->assertDatabaseHas('articles', [
            'id' => $article->id,
            'title' => $updatedTitle
        ]);
    }
}