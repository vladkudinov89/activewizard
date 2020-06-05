<?php


namespace App\Action\Users\DeleteUser;


use App\Repository\Users\UsersRepositoryInterface;

class DeleteUserAction
{
    /**
     * @var UsersRepositoryInterface
     */
    private $usersRepository;

    /**
     * DeleteUserAction constructor.
     */
    public function __construct(UsersRepositoryInterface $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    public function execute(DeleteUserRequest $request): void
    {
        $this->usersRepository->deleteById($request->getUser()->id);
    }
}
