<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class updateAdminController extends Controller
{
    public function update(Request $request)
       {
          
            $userId = Auth::id();
          
            User::where('id',$userId)->update(['access_level' => 'admin']);

            return redirect()->back()->with('access', 'agora você é um admistrador Parabéns');

       }
}
