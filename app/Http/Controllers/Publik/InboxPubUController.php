<?php

namespace App\Http\Controllers\Publik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use App\Models\Message;
use App\Models\Store;
use Auth;

class InboxPubUController extends Controller
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
            $uniques2=NULL;
            foreach ($a as $c) {
                if ($c->user_id == Auth()->id()) {
                    $uniques2[$c->receiver] = $c; // Get unique country by code.
                }
            }
            if ($uniques2!=NULL) {
                sort($uniques2);
                $users = User::whereIn('id', array_column($uniques2, 'receiver'))->orderBy('id', 'DESC')->get();
                
            }
            foreach($users as $x)
            {
                $store=Store::find($x->id)->get();
            }
        }
        
        

        if (auth()->user()->role_id == 4) {
            $messages = Message::orwhere('user_id', auth()->id())-> orderBy('id', 'DESC')->get();
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
        if (auth()->user()->role_id == 3) {
            $messages = Message::where('user_id', auth()->id())->orWhere('receiver', auth()->id())->orderBy('id', 'ASC')->get();
        } else {
            $messages = Message::where('user_id', auth()->id())->orderBy('id', 'ASC')->get();
            $store=Store::where('user_id',$sender->id)->first();
        }
        
        
        return view('show', [
            'users' => $users,
            'messages' => $messages,
            'sender' => $sender,
            'store' => $store ?? null,
            ]);
            
    }
}
