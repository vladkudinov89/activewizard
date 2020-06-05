<?php

namespace App\Http\Controllers;


use App\Action\Users\GetAllUsers\GetAllUsersAction;

class UserController extends Controller
{
    /**
     * @var GetAllUsersAction
     */
    private $getAllUsersAction;

    /**
     * UserController constructor.
     * @param GetAllUsersAction $getAllUsersAction
     */
    public function __construct(GetAllUsersAction $getAllUsersAction)
    {
        $this->getAllUsersAction = $getAllUsersAction;
    }

    public function index()
    {
        $users = $this->getAllUsersAction->execute()->getCollection();

        return view('users.index' , compact('users'));
    }
}
