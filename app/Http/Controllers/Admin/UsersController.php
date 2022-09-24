<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Imports\UsersImport;
use App\Projects;
use App\Role;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\UploadedFile;

class UsersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

       $users = DB::table('users')
                    ->leftJoin('projects','users.projectid', "=",'projects.id')
                    ->join('role_user','users.id','=','role_user.user_id')
                    ->join('roles', 'role_user.role_id', '=', 'roles.id')
                    ->where('role_user.role_id', '!=', 1)
                    ->get(['users.*', 'projects.name as projectName', 'projects.code as projectCode','projects.status as projectStatus', 'roles.title as roleTitle','roles.id as roleId' ]);
        $roles = Role::all()->pluck('title', 'id');

        return view('admin.users.index', compact('users', 'roles'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');

        $projects = Projects::all();

        return view('admin.users.create', compact('roles', 'projects'));
    }

    public function store(StoreUserRequest $request)
    {

        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');
        $projects = Projects::all();

        $user->load('roles');

        return view('admin.users.edit', compact('roles', 'user', 'projects'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {

        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles');

        return view('admin.users.show', compact('user'));
    }

    public function destroy($id)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        DB::table('users')->where('id', "=", $id)->delete();
        return redirect()->route('admin.users.index');
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function excel(Request $request)
    {

        $document = $request->file('import_file');
        $excel =  Excel::import(new UsersImport, $document);

        return redirect()->route('admin.users.index');
    }
}
