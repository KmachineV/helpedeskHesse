<?php

namespace App\Http\Controllers\Admin;

use App\Households;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Gate;

class HouseholdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('households_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $households = DB::table('households')
                            ->leftJoin('users','households.user_id','=','users.id')
                            ->join('projects','users.projectid','=','projects.id')
                            ->join('regions','projects.region_id', "=",'regions.id' )
                            ->join('provinces', 'projects.province_id',"=",'provinces.id')
                            ->join('communes','projects.commune_id',"=",'communes.id')
                            ->join('role_user','users.id',"=", 'role_user.user_id')
                            ->where('role_user.role_id', '=', 3)
                            ->get(['households.*',
                                'users.first_name', 'users.last_name', 'users.rut', 'users.email',
                                'projects.code as codeProject','projects.name as nameProject','projects.status as statusProject', 'regions.region as nameRegion', 'provinces.province as nameProvince', 'communes.commune as nameCommune']);



        return view('admin.households.index', compact( 'households'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('households_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = DB::table('users')
                        ->join('role_user','users.id','=','role_user.user_id')
                        ->where('role_user.role_id', '=', 3)
                        ->get(['users.*']);

        return view('admin.households.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataHouse =  request()->except(['_token']);
        $house = Households::insert($dataHouse);


        return redirect()->route('admin.households.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Households  $households
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Gate::denies('households_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

      $households = DB::table('households')
            ->where('households.id', '=', $id)->get()->first();


        return view('admin.households.show', compact('households'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Households  $households
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('households_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $households = DB::table('households')
            ->where('households.id', '=', $id)
            ->get()->first();

        $users = DB::table('users')
            ->join('role_user','users.id','=','role_user.user_id')
            ->where('role_user.role_id', '=', 3)
            ->get(['users.*']);




        return view('admin.households.edit', compact('users', 'households'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Households  $households
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $dataHouseholds = request()->except(['_token', '_method']);
        DB::table('households')->where('id', "=", $id)->update($dataHouseholds);

        return redirect()->route('admin.households.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Households  $households
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('households')->where('id', "=", $id)->delete();
        return redirect()->route('admin.households.index');
    }
}
