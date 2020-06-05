<?php


namespace App\Repository\Users;



interface UsersRepositoryInterface
{
    public function getAllUsers();

    public function deleteById(int $id): void;
}
