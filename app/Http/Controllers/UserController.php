<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Traits\APIResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use APIResponse;

    public function getUsers() {
        $search = request("search");
        $filter = request("active");

        $users = User::query()
            ->when($search, fn($q) => $q->search($search))
            ->when($filter, fn($q) => $q->where("role", $filter))
            ->orderBy("created_at", "desc")
            ->paginate(20);
        $users->through(function($user) {
            $user->formatted_created_at = $user->created_at->format("d, M Y");
            return $user;
        });

        return view("pages.users.index", compact("users"));
    }


    public function getUser($id) {
        $user = User::find($id);
        if($user == null) {
            return $this->error("The user with the id $id, does not exist", 404);
        }

        $htmlString = view("pages.users.details.content", compact("user"))->render();
        return $this->success($htmlString, "Successfully retrieved user");
    }

    public function updateUser(UpdateUserRequest $request, $id) {
        logger()->info("METHOD HIT");
        $validatedData = $request->validated();
        $user = User::find($id)->update($validatedData);
        return $this->success($user, "Successfully updated the user with id $id");
    }
}
