<?php


namespace app\blog\services;


use app\blog\entities\User;
use app\blog\forms\SignupForm;
use app\blog\repositories\UserRepository;

class SignupService
{
    private $repository;
    public function __construct(UserRepository $repository)
    {
        $this->repository=$repository;
    }

    public function signup(SignupForm $form)
    {
        if ($this->repository->findByUsername($form->username)) {
            throw new \DomainException('Username already exist.');
        }
        $user=User::signup($form->username, $form->email, $form->password);
        $this->repository->save($user);
        return $user;
    }
}