<?php


namespace App\Action\Users\DeleteUser;


use App\User;

class DeleteUserRequest
{
    /**
     * @var User
     */
    private $user;

    /**
     * DeleteUserRequest constructor.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }
}
