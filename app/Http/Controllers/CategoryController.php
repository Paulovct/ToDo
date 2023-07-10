<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{
    
    public function create(){
        $loggedUser = Auth::user();
        
        return view("createcategory" , ["user_id"=> $loggedUser->id]);
    }

    public function store(Request $req){
        $data = $req->only(["title" , "user_id"]);
        $data["color"] = "#FFFFFF";

        $category = Category::create($data);

        return redirect("/");
    }
}
