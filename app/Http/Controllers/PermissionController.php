<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::all();

        return view('admin.permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function permissionUserIndex(User $user)
    {
        $permissions = Permission::all();

        $userPermissions = DB::table('user_permission')->where('user_permission.user_id',$user->id)
        ->pluck('permission_id')->toArray();

        // return $userPermissions;
        $userPermissions = $permissions->map(function ($permission) use ($userPermissions) {
          
            $in_array = in_array($permission->id,$userPermissions);

            $perObj['id'] = $permission->id;

            $perObj['slug'] = $permission->slug;

            $perObj['cate'] = $permission->cate;

            $perObj['description'] = $permission->description;

            $perObj['allow'] = $in_array;

            return (object) $perObj;
        });

        return view('admin.permission.user.index', compact('userPermissions', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['title' => 'required', 'cate' => 'required']);

        Permission::create([
            'title' => $request->title,
            'cate' => $request->cate,
            'description' => $request->description,
        ]);

        return back();
    }

    /**
     * permissionIds
     */
    public function permissionUserUpdate(Request $request, User $user)
    {

        DB::table('user_permission')->where('user_id', $user->id)->delete();

        if ( $request->permissionIds ) {

            foreach ($request->permissionIds as $permissionId) {

                DB::table('user_permission')->insert([
                    'user_id' => $user->id,
                    'permission_id' => $permissionId,
                ]);
            }
        }

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        //
    }
}
