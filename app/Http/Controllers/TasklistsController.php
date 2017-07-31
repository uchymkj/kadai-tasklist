<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Task;

class TasklistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $tasklists = $user->tasklists()->paginate(50);

            $data = [
                'tasklists' => $tasklists,
            ];
            
        }
        return view('tasklists.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tasklist = new Task;
        
        return view('tasklists.create', [
            'tasklist' => $tasklist,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'status' => 'required',
            ]);
        
        $this->validate($request,[
            'content' => 'required',
            ]);
        /*
        $request->user()->tasklists()->create([
            'status' => $request->status,
        ]);
        
        $request->user()->tasklists()->create([
            'content' => $request->content,
        ]);
        */
        
        $tasklist = new Task;
        $tasklist->status = $request->status;
        $tasklist->content = $request->content;
        $user = \Auth::user();
        $tasklist->user_id = $user->id;
        $tasklist->save();
        
        return redirect('/tasklists');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tasklist = Task::find($id);
        
        return view('tasklists.show', [
            'tasklist' => $tasklist,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tasklist = Task::find($id);
        
        return view('tasklists.edit', [
            'tasklist' => $tasklist,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request,[
            'status' => 'required',
            ]);
        
        $this->validate($request,[
            'content' => 'required',
            ]);
        
            
        $tasklist = Task::find($id);
        $tasklist->status = $request->status;
        $tasklist->content = $request->content;
        $tasklist->save();
        
        return redirect('/tasklists');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tasklist = Task::find($id);
        
        if (\Auth::user()->id === $tasklist->user_id) {
            $tasklist->delete();
        }
        
        return redirect('/tasklists');
        
    }
}
