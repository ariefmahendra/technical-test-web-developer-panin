<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;


class TasksController extends Controller
{
    public function list(Request $request){
        $userId = Auth::id();
        $page = $request->query('page');
        $size = $request->query('size');

        if($page == 0 || $size == 0 ) {
            $tasks = DB::table('tasks')->where('user_id', $userId)
                ->limit(5)
                ->offset(0)
                ->get();

            $page  = 1;
            $size  = 5;
        } else {
            $offset = ($page-1) * $size;
            $limit = $size;
            $tasks = DB::table('tasks')->where('user_id', $userId)
                ->limit($limit)
                ->offset($offset)
                ->get();
        }

        $totalRows = DB::table('tasks')->where('user_id', $userId)->count();

        $totalPage = ceil($totalRows / $size);
        $currentPage = $request->query('page') ?: 1;
        $nextPage = $currentPage + 1 ;
        $previousPage = $currentPage - 1;

        return view('tasks.list', compact('tasks', 'totalPage', 'currentPage', 'nextPage', 'previousPage', 'totalRows'));
    }

    public function getById(Request $request){
       $id = $request -> route('id');

       if(!$id){
           return abort(404);
       }

       $todo = DB::table('tasks')->where('id', $id)->first();

       return view('tasks.task', compact('todo'));
    }

    public function create(Request $request){
      return view('tasks.create');
    }

    public function store(Request $request){
        $userId = Auth::id();
        Tasks::create([
            'title' => $request -> title,
            'description' => $request -> description,
            'user_id' => $userId,
        ]);

        return redirect('/tasks');
    }

    public function updatePage(Request $request){
        $id = $request -> route('id');
        return view('tasks.update', compact('id'));
    }

    public function updateTask(Request $request){
        $userId = Auth::id();
        $taskId = $request -> route('id');
        $title = $request -> title;
        $description = $request -> description;

        DB::table('tasks')->where('id', $taskId)->where('user_id', $userId)->update([
            'title' => $title,
            'description' => $description
        ]);

        return redirect('/tasks');
    }

    public function delete(Request $request)
    {
        $id = $request -> route('id');
        $userId= Auth::id();

        $deleted = DB::table('tasks')->where('id', $id)->where('user_id', $userId)->delete();

        if(!$deleted){
            return redirect() -> back()->with('isDeleted', 'Cannot delete task');
        }

        return redirect() -> back()->with('isDeleted', 'Task deleted');
    }

    public function checkOrUncheck(Request $request)
    {
        $taskId = $request->id;
        $userId = Auth::id();
        $currentStatusTask = $request->currentStatus;

        if ($currentStatusTask == 1){
            $currentStatusTask = 0;
        } else {
            $currentStatusTask = 1;
        }

        DB::table('tasks')->where('id', $taskId)->where('user_id', $userId)->update([
            'status' => $currentStatusTask
        ]);

        return redirect() -> back();
    }
}
