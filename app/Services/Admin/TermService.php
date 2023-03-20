<?php

namespace App\Services\Admin;

use App\Models\TermModel;
use Illuminate\Support\Str;

class TermService
{
    public function showListTerm(){
        $terms = TermModel::all();

        return view('admin.terms.index', [
            'title_head' => 'Term',
            'terms' => $terms
        ]);
    }

    public function showAddTerm(){
        return view('admin.terms.add', [
            'title_head' => 'Add term'
        ]);
    }

    public function handleAddTerm($request) {
        $request->validate([
            'title' => 'required|min:3|max:255'
        ]);

        $title = $request->title;
        $slug = Str::slug($title);

        try {
            TermModel::create(['title' => $title, 'slug' => $slug]);
        } catch(\Exception $e) {
            return back()->with('error', 'Add term failed');
        }

        return redirect(route('admin.list_term.show'))->with('success', 'Add Term Successfully');
    }

    public function showEditTerm($id) {
        $term = TermModel::find($id);
        if(!empty($term)) {
            return view('admin.terms.edit', ['term' => $term]);
        }

        return back()->with('error', 'Doesn\'t find record');
    }

    public function handleEditTerm($id, $request) {
        $request->validate(['title' => 'required|min:3|max:255']);

        try {
            TermModel::where('id', $id)->update(['title' => $request->title]);
        } catch(\Exception $e) {
            return back()->with('error', 'Update failed!');
        }

        return redirect(route('admin.list_term.show'))->with('success', 'Update successfully');
    }

    public function deleteTerm($id){
        try{
            TermModel::find($id)->delete();
        } catch (\Exception $e) {
            return response()->json(['code' => 0]);
        }

        return response()->json(['code' => 1]);
    }
}
