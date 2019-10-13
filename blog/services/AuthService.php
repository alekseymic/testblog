<?php


namespace app\blog\services;


use app\blog\forms\LoginForm;
use app\blog\repositories\UserRepository;

class AuthService
{
    private $userRepository;

    public function __construct(UserRepository $repository)
    {
        $this->userRepository=$repository;
    }

    public function auth(LoginForm $form)
    {
        $user=$this->userRepository->findByUsername($form->username);
        if (!$user || !$user->validatePassword($form->password)) {
            throw new \DomainException('Incorrect username or password.');
        }
        return $user;
    }
    
}