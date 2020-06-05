<?php


namespace App\Repository\Users;


use App\User;

class UsersRepository implements UsersRepositoryInterface
{
    public function getAllUsers()
    {
        return User::paginate(10);
    }

    public function deleteById(int $id): void
    {
        User::destroy($id);
    }


}
