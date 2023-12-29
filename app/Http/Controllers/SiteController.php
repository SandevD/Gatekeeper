<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {

        $departments = Department::orderBy('name', 'asc')->get();
        return view('welcome', compact('departments'));
    }

    public function staff(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'epf_no' => 'required|min:6|max:6',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->employee_code = $request->epf_no;
        $user->email = $request->email;
        $user->department_id = $request->SBU;
        $user->password = $request->password;
        $role = (int)$request->role;

        if ($role != 6) {
            $notify[] = ['error', 'Invalid role selected, only staff member can be assigned.'];
            return back()->withNotify($notify);
        }

        try {
            $user->save();
            $user->assignRole($role);
        } catch (Exception $validated){
            $notify[] = ['error', $validated->getMessage()];
            return back()->withNotify($notify);
        } catch (Exception $e) {
            $notify[] = ['error', $e->getMessage()];
            return back()->withNotify($notify);
        }
        $notify[] = ['success', 'You can now log into your account!'];
        return back()->withNotify($notify);
    }
}
