<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Section;
use App\Models\Nation;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Section $section=null)
    {
        $projects=Project::when($section!=null,function ($query)use($section){
            $query->where('section_id',$section->id);
        })->latest()->paginate(16);
        return view('projects',compact('projects'));
    }
    
    public function area($area){
        
        $projects=Project::whereHas('areas',function($query)use($area){
           
                $query->where('areas.id',$area);
           
        })->paginate(16);
          return view('projects',compact('projects'));
    }
    
    public function archives(Nation $nation=null){
         $projects=Project::when($nation!=null,function($query)use($nation){
             $query->whereHas('section',function($query)use($nation){
             $query->where('nation_id',$nation->id);
         });
         })
         ->where('is_archive',1)->latest()->paginate(16);
        return view('archive',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('project',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
