<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AllPeopleController extends Controller
{
    public function index() {
        return view('dash.allPeople.index', ['users' => User::get()]);
    }

    public function delete($id) {

        $user = User::find($id);
        $delete = $user->delete();

        if ($delete) {
            return redirect()
                ->route('peoples_list')
                ->with('good', 'Account successfully deleted');
        }
    }
}
