<?php

namespace App\Domain\Blog\Presenter;

use App\Domain\Blog\Responder\CreatePostResponder;
use App\Domain\Blog\Responder\RedirectPostResponder;
use App\Domain\Blog\Responder\UpdatePostResponder;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

/**
 * Class UpdatePostPresenter
 * @package App\Domain\Blog\Presenter
 */
class UpdatePostPresenter implements UpdatePostPresenterInterface
{
    /**
     * @var Environment
     */
    private Environment $twig;

    /**
     * @var UrlGeneratorInterface
     */
    private UrlGeneratorInterface $urlGenerator;

    /**
     * ReadPostPresenter constructor.
     * @param Environment $twig
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(Environment $twig, UrlGeneratorInterface $urlGenerator)
    {
        $this->twig = $twig;
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @param UpdatePostResponder $responder
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function present(UpdatePostResponder $responder): Response
    {
        return new Response(
            $this->twig->render('blog/update.html.twig',
                ['form' => $responder->getFormView()]
            )
        );
    }


    /**
     * @param RedirectPostResponder $responder
     * @return RedirectResponse
     */
    public function redirect(RedirectPostResponder $responder): RedirectResponse
    {
        return new RedirectResponse(
            $this->urlGenerator->generate("blog_read", ["id" => $responder->getPost()->getId()])
        );
    }
}
