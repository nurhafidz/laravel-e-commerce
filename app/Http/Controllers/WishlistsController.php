<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Exception;

class WishlistsController extends Controller
{

    /**
     * Display a listing of the wishlists.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $wishlists = Wishlist::with('user','product')->paginate(15);

        return view('wishlists.index', compact('wishlists'));
    }

    /**
     * Show the form for creating a new wishlist.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $users = User::pluck('first_name','id')->all();
        $products = Product::pluck('name','id')->all();
        
        return view('wishlists.create', compact('users','products'));
    }

    /**
     * Store a new wishlist in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Wishlist::create($data);

            return redirect()->route('wishlists.wishlist.index')
                ->with('success_message', 'Wishlist was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified wishlist.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $wishlist = Wishlist::with('user','product')->findOrFail($id);

        return view('wishlists.show', compact('wishlist'));
    }

    /**
     * Show the form for editing the specified wishlist.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        $users = User::pluck('first_name','id')->all();
$products = Product::pluck('name','id')->all();

        return view('wishlists.edit', compact('wishlist','users','products'));
    }

    /**
     * Update the specified wishlist in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $wishlist = Wishlist::findOrFail($id);
            $wishlist->update($data);

            return redirect()->route('wishlists.wishlist.index')
                ->with('success_message', 'Wishlist was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified wishlist from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $wishlist = Wishlist::findOrFail($id);
            $wishlist->delete();

            return redirect()->route('wishlists.wishlist.index')
                ->with('success_message', 'Wishlist was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'user_id' => 'nullable',
            'product_id' => 'nullable', 
        ];
        $data = $request->validate($rules);
        return $data;
    }

}
