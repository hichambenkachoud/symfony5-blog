<?php


namespace App\Application\Validator;

use App\Application\Repository\UserRepository;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Class UniqueEmailValidator
 * @package App\Application\Validator
 */
class UniquePseudoValidator extends ConstraintValidator
{

    /**
     * @var UserRepository
     */
    private UserRepository $userRepository;

    /**
     * UniqueEmailValidator constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param mixed $value
     * @param Constraint $constraint
     */
    public function validate($value, Constraint $constraint)
    {

        if ($this->userRepository->count(['pseudo' => $value]) > 0)
        {
            $this->context->buildViolation($constraint->message)->addViolation();
        }
    }
}
