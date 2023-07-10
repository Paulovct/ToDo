<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\Task;


class HomeController extends Controller
{

    public function index(Request $req){

        $loggedUser = Auth::user();
        if($req->date){
            $filteredDate = $req->date;
        } else {
            $filteredDate =  date("Y-m-d");
        }


        $tasks = Task::where("due_date" ,$filteredDate)
            ->where("user_id" , $loggedUser->id)
        ->get();
        
        $carbonDate = Carbon::createFromDate($filteredDate);
        
        $date["now"] = $carbonDate->translatedFormat("d \d\\e\ M");
        $date["prev_button"] = $carbonDate->addDay(-1)->format("Y-m-d");
        $date["next_button"] = $carbonDate->addDay(+2)->format("Y-m-d");


        $tasks->completeds = array_filter($tasks->all() ,function($v){ return $v->is_done; } );
        
        return view("home" , [
            "tasks" => $tasks ,
            "loggedUser" => $loggedUser,
            "date" => $date
        ]);
    }
}
