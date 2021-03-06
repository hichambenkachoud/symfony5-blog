<?php


namespace App\Domain\Blog\Responder;


use App\Application\Entity\Post;

/**
 * Class RedirectPostResponder
 * @package App\Responder
 */
class RedirectPostResponder
{
    /**
     * @var Post
     */
    private Post $post;

    /**
     * RedirectPostResponder constructor.
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * @return Post
     */
    public function getPost(): Post
    {
        return $this->post;
    }

}
