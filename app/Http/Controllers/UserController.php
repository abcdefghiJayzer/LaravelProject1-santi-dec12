<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Catch_;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
        {
            $validatedData = $this->validate($request, rules: [
                'name' => 'required',
                'email' => 'required|email|unique:users',
            ]);

            DB::beginTransaction();

            try {

                User::create([
                    'name' => $request->name,
                    'role' => "admin",
                    'email' => $request->email,
                    'password' => Hash::make('12345'),
                ]);

                DB::commit();
                $msg = ['success', "Student Data is Added"];
                return redirect()->route('pages.pages1')->with(['msg' => $msg]);
            } catch (\Exception $e) {
                $msg = ['danger', 'Error in Student Data' . $e->errorInfo[2]];
                DB::rollBack();
                return redirect()->back()->with(['msm' => $msg]);
            }
        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = user::find($id);
        return view('users.delete', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $user = DB::table('user')->get();
        $user = user::find($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     $validatedData = $this->validate($request, rules: [
    //         'name' => 'required',
    //         'email' => 'required|email|unique:users, email',
    //     ]);

    //     DB::beginTransaction();

    //     try {

    //         user::find($id)->update([
    //             'name' => $request->name,
    //             'email' => $request->email,
    //         ]);


    //         DB::commit();
    //         $msg = ['success', "Student Data is Updated"];
    //         return redirect()->route('pages.pages1')->with(['msg' => $msg]);
    //     } catch (\Exception $e) {
    //         $msg = ['danger', 'Error in Student Data' . $e->errorInfo[2]];
    //         DB::rollBack();
    //         return redirect()->back()->with(['msm' => $msg]);
    //     }
    // }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,  // Corrected line
        ]);

        DB::beginTransaction();

        try {
            $user = User::findOrFail($id);
            $user->update([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
            ]);

            DB::commit();
            $msg = ['success', "User data has been updated successfully"];
            return redirect()->route('pages.pages1')->with(['msg' => $msg]);
        } catch (\Exception $e) {
            DB::rollBack();
            $msg = ['danger', 'Error updating user data: ' . $e->getMessage()];
            return redirect()->back()->with(['msg' => $msg]);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = user::find($id)->delete();
        $msg = ['success', "User data has been removed successfully"];
        return redirect()->route('pages.pages1')->with(['msg' => $msg]);
    }
}
