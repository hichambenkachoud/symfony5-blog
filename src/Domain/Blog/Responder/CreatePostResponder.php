<?php


namespace App\Domain\Blog\Responder;

use App\Entity\Post;
use Symfony\Component\Form\FormView;

/**
 * Class ReadPostResponder
 * @package App\Responder
 */
class CreatePostResponder
{

    /**
     * @var FormView
     */
    private FormView $formView;

    /**
     * CreatePostResponder constructor.
     * @param FormView $formView
     */
    public function __construct(FormView $formView)
    {
        $this->formView = $formView;
    }

    /**
     * @return FormView
     */
    public function getFormView(): FormView
    {
        return $this->formView;
    }
}
