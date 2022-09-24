<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Commune;
use App\Http\Controllers\Controller;
use App\Projects;
use App\Province;
use App\Region;
use Illuminate\Http\Request;
use Gate;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        abort_if(Gate::denies('projects_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $projects = DB::table('projects')
            ->join('regions','projects.region_id', "=",'regions.id' )
            ->join('provinces', 'projects.province_id',"=",'provinces.id')
            ->join('communes','projects.commune_id',"=",'communes.id')->get(['projects.*', 'regions.region', 'provinces.province', 'communes.commune']);


        return view('admin.projects.index', compact( 'projects'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('projects_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $regions = Region::all()->pluck('region', 'id')->prepend(trans('global.pleaseSelect'), '');
        $provinces = Province::all()->pluck('province', 'id')->prepend(trans('global.pleaseSelect'), '');
        $communes = Commune::all()->pluck('commune', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.projects.create', compact( 'regions', 'provinces','communes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ticket = Projects::create($request->all());

        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Gate::denies('ticket_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

       $projects = DB::table('projects')
            ->join('regions','projects.region_id', "=",'regions.id' )
            ->join('provinces', 'projects.province_id',"=",'provinces.id')
            ->join('communes','projects.commune_id',"=",'communes.id')
             ->where('projects.id', '=', $id)->get()->first();


        return view('admin.projects.show', compact('projects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        abort_if(Gate::denies('ticket_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $regions = Region::all()->pluck('region', 'id')->prepend(trans('global.pleaseSelect'), '');
        $provinces = Province::all()->pluck('province', 'id')->prepend(trans('global.pleaseSelect'), '');
        $communes = Commune::all()->pluck('commune', 'id')->prepend(trans('global.pleaseSelect'), '');

        $projects = DB::table('projects')->where('projects.id', '=', $id)->get()->first();

        return view('admin.projects.edit', compact('projects','regions','provinces','communes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataProject = request()->except(['_token', '_method']);
        DB::table('projects')->where('id', "=", $id)->update($dataProject);

        return redirect()->route('admin.projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('projects')->where('id', "=", $id)->delete();
        return redirect()->route('admin.projects.index');
    }
}
