<?php

namespace App\Http\Controllers;

use App\ProductEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function store(Request $request) {
        $productEntry = new ProductEntry();
        $productEntry->product_name = $request->product_name;
        $productEntry->product_type = $request->product_type;
        $productEntry->product_price = $request->product_price;
        $productEntry->user_id = Auth::id();
        $productEntry->save();
        $request->session()->flash('message', 'A new record has been successfully added.');
        return redirect('/view');
    }

    public function list() {
        $productList = ProductEntry::where('user_id', Auth::id())->get();
        return view('view')->with(['productList' => $productList]);
    }

    public function get(Request $request, $id) {
        $productEntry = ProductEntry::find($id);

        // if the ID does not exist in the database, OR is not
        // owned by the currently logged in user, then show error message
        if(  !isset($productEntry) || $productEntry->user_id != Auth::id()  ) {
            $request->session()->flash('error', 'Selected phone entry not found.');
            return redirect('/view');
        }

        // Otherwise, show the phone entry
        return view('get')->with(['productEntry' => $productEntry]);
    }

    public function edit(Request $request, $id) {
        $productEntry = ProductEntry::find($id);

        // if the ID does not exist in the database, OR is not
        // owned by the currently logged in user, then show error message
        if(  !isset($productEntry) || $productEntry->user_id != Auth::id()  ) {
            $request->session()->flash('error', 'Selected phone entry not found.');
            return redirect('/view');
        }

        // Return edit form using the selected phone entry
        return view('edit')->with(['productEntry' => $productEntry]);
    }

    public function update(Request $request, $id) {
        $productEntry = ProductEntry::find($id);

        // if the ID does not exist in the database, OR is not
        // owned by the currently logged in user, then show error message
        if(  !isset($productEntry) || $productEntry->user_id != Auth::id()  ) {
            $request->session()->flash('error', 'Selected phone entry not found.');
            return redirect('/view');
        }
        // change the phone entry record and save it
        $productEntry->product_name = $request->product_name;
        $productEntry->product_type = $request->product_type;
        $productEntry->product_price = $request->product_price;
        $productEntry->save();
        $productEntry->session()->flash('message', 'The record has been successfully updated.');
        return redirect('/view');
    }

    public function delete(Request $request, $id) {
        $productEntry = ProductEntry::find($id);

        // if the ID does not exist in the database, OR is not
        // owned by the currently logged in user, then show error message
        if(  !isset($productEntry) || $productEntry->user_id != Auth::id()  ) {
            $request->session()->flash('error', 'Selected product not found.');
            return redirect('/view');
        }

        // Return delete confirmation form using the selected phone entry
        return view('delete')->with(['productEntry' => $productEntry]);
    }

    public function remove(Request $request, $id) {
        $productEntry = ProductEntry::find($id);

        // if the ID does not exist in the database, OR is not
        // owned by the currently logged in user, then show error message
        if(  !isset($productEntry) || $productEntry->user_id != Auth::id()  ) {
            $request->session()->flash('error', 'Selected product not found.');
            return redirect('/view');
        }

        // Delete record
        $productEntry->delete();
        $request->session()->flash('message', 'The product was successfully deleted.');
        return redirect('/view');

    }

    public function shoplist() {
        $productList = ProductEntry::where('user_id', Auth::id())->get();
        return view('shop')->with(['productList' => $productList]);
    }

    public function shopget(Request $request, $id) {
        $productEntry = ProductEntry::find($id);

        // if the ID does not exist in the database, OR is not
        // owned by the currently logged in user, then show error message
        if(  !isset($productEntry) || $productEntry->user_id != Auth::id()  ) {
            $request->session()->flash('error', 'Selected product not found.');
            return redirect('/shop');
        }

        // Otherwise, show the entry
        return view('item')->with(['productEntry' => $productEntry]);
    }

}
