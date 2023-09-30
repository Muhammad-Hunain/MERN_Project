<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {

            $data = User::whereNot('type','admin')->get();

            return Datatables::of($data)

                    ->addIndexColumn()

                    ->addColumn('action', function($row){

                        
                        $btn = '';

                        $btn .= '<span class="action-icons">';
                        
                            $btn .= '<a href="'. route('users.edit',$row->id) .'" class="btn btn-sm btn-primary btn-circle" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                <i class="fa fa-edit"></i>
                            </a>';

                            $btn .= '<a href="javascript:void(0)" class="btn  btn-sm btn-danger btn-circle delete_row_" data-url="'. route('users.destroy',$row->id) .'" 
                            data-msg="Are you sure you want to delete this user?" data-toggle="tooltip" data-placement="bottom" title="Delete">
                                <i class="fa fa-trash"></i>
                            </a>';
                        
                        
                        $btn .='</span>';
      

                        return $btn;

                    })

                    ->rawColumns(['action'])
                    ->make(true);

        }

        $pageHead = 'Users';
        $pageTitle = 'Users';
        $activeMenu = 'users';
        return view('users.index', compact('activeMenu','pageHead','pageTitle',));


    }

    public function create()
    {

        $pageHead = 'Create User';
        $pageTitle = 'Create User';
        $activeMenu = 'create_user';

        return view('users.create', compact('activeMenu','pageHead','pageTitle'));

    }

    public function store(UserRequest $request)
    {

        $user = [

            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'password_txt' => $request->password,
            'contact_no' => $request->contact_no,
            'designation' => $request->designation,
            'type' => 'user'
        ];

        User::create($user);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    
    public function edit(User $user)
    {

        $pageHead = 'Edit User';
        $pageTitle = 'Edit User';
        $activeMenu = 'users';

        return view('users.edit', compact('activeMenu','pageHead','pageTitle','user'));

    }

    public function update(UserRequest $request, User $user)
    {
        
        $user_update_arr = [

            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'password_txt' => $request->password,
            'contact_no' => $request->contact_no,
            'designation' => $request->designation,
        ];

        $user->update($user_update_arr);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function show(User $user)
    {

        abort(404);

    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }


}

