<?php

namespace App\Http\Controllers\Publik;

use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use Auth;

class InboxPubController extends Controller
{
    public function index() {
        
        
        if (Auth::user()->role_id == 3) {
            $a=Message::all();
            $uniques=NULL;
            foreach ($a as $c) {
                if($c->receiver == Auth()->id()){
                    $uniques[$c->user_id] = $c; // Get unique country by code.
                }
            }
            if ($uniques!=NULL) {
                sort($uniques);
                //$users = User::findMany($uniques);
                $users = User::whereIn('id', array_column($uniques, 'user_id'))->orderBy('id', 'DESC')->get();
            }
            
            
        } if(Auth::user()->role_id == 4) {
            $a=Message::all();
            $uniques=NULL;
            foreach ($a as $c) {
                if ($c->user_id == Auth()->id()) {
                    $uniques[$c->receiver] = $c; // Get unique country by code.
                }
            }
            if ($uniques!=NULL) {
                sort($uniques);
                $users = User::whereIn('id', array_column($uniques, 'user_id'))->orderBy('id', 'DESC')->get();
                
            }
        }
        
        

        if (auth()->user()->role_id == 2) {
            $messages = Message::where('user_id', auth()->id())->orWhere('receiver', auth()->id())->orderBy('id', 'DESC')->get();
        }

        return view('chat', [
            
            'users' => $users ?? null,
            'messages' => $messages ?? null
        ]);
    }

    public function show($id) {
        
        // if (auth()->user()->role_id == false) {
        //     abort(404);
        // }

        $sender = User::findOrFail($id);
        if (Auth::user()->role_id == 3) {
            $a=Message::all();
            $uniques=NULL;
            foreach ($a as $c) {
                if($c->receiver == Auth()->id()){
                    $uniques[$c->user_id] = $c; // Get unique country by code.
                }
            }
            if ($uniques!=NULL) {
                sort($uniques);
                //$users = User::findMany($uniques);
                $users = User::whereIn('id', array_column($uniques, 'user_id'))->orderBy('id', 'DESC')->get();
            }
            
        } else {
            
            $users = User::where('role_id',2)->with(['message' => function($query) {
            return $query->orderBy('created_at', 'DESC');
            }])->orderBy('id', 'DESC')->get();
        }
        
        
        

        

        if (auth()->user()->role_id == 2) {
            $messages = Message::where('user_id', auth()->id())->orWhere('receiver', auth()->id())->orderBy('id', 'DESC')->get();
        } else {
            $messages = Message::where('user_id', $sender)->orWhere('receiver', $sender)->orderBy('id', 'DESC')->get();
        }
        

        return view('show', [
            'users' => $users,
            'messages' => $messages,
            'sender' => $sender,
        ]);
    }
}
