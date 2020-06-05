<?php


namespace App\Action\Users\GetAllUsers;


use App\Repository\Users\UsersRepositoryInterface;

class GetAllUsersAction
{
    /**
     * @var UsersRepositoryInterface
     */
    private $usersRepository;

    /**
     * GetAllUsersAction constructor.
     */
    public function __construct(UsersRepositoryInterface $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    public function execute(): GetAllUsersResponse
    {
        $users = $this->usersRepository->getAllUsers();

        return new GetAllUsersResponse($users);
    }
}
