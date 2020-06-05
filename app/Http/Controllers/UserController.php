<?php

namespace App\Http\Controllers;


use App\Action\Users\DeleteUser\DeleteUserAction;
use App\Action\Users\DeleteUser\DeleteUserRequest;
use App\Action\Users\GetAllUsers\GetAllUsersAction;
use App\User;

class UserController extends Controller
{
    /**
     * @var GetAllUsersAction
     */
    private $getAllUsersAction;
    /**
     * @var DeleteUserAction
     */
    private $deleteUserAction;

    /**
     * UserController constructor.
     * @param GetAllUsersAction $getAllUsersAction
     */
    public function __construct(
        GetAllUsersAction $getAllUsersAction,
         DeleteUserAction $deleteUserAction
    )
    {
        $this->getAllUsersAction = $getAllUsersAction;
        $this->deleteUserAction = $deleteUserAction;
    }

    public function index()
    {
        $users = $this->getAllUsersAction->execute()->getCollection();

        return view('users.index' , compact('users'));
    }

    public function show(User $user)
    {
        return view('users.show' , compact('user'));
    }

    public function destroy(User $user)
    {
        $this->deleteUserAction->execute(new DeleteUserRequest($user));

        return redirect()->route('users.index')
            ->with('status' , 'User Success Deleted!');
    }
}
