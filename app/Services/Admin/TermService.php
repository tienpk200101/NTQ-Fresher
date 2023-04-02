<?php

namespace App\Services\Admin;

use App\Models\Term;
use App\Repositories\Admin\TermRepository;
use Illuminate\Support\Str;

class TermService
{
    protected $termRepository;
    public function __construct(TermRepository $termRepository)
    {
        $this->termRepository = $termRepository;
    }

    public function showListTerm(){
        $terms = $this->termRepository->getAll();

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
            $this->termRepository->createTerm(['title' => $title, 'slug' => $slug]);
        } catch(\Exception $e) {
            return back()->with('error', 'Add term failed');
        }

        return redirect(route('admin.list_term.show'))->with('success', 'Add Term Successfully');
    }

    public function showEditTerm($id) {
        $term = $this->termRepository->findTermById($id);
        if(!empty($term)) {
            return view('admin.terms.edit', ['term' => $term]);
        }

        return back()->with('error', 'Doesn\'t find record');
    }

    public function handleEditTerm($id, $request) {
        $request->validate(['title' => 'required|min:3|max:255']);

        try {
            $this->termRepository->updateTerm($id, ['title' => $request->title]);
        } catch(\Exception $e) {
            return back()->with('error', 'Update failed!');
        }

        return redirect(route('admin.list_term.show'))->with('success', 'Update successfully');
    }

    public function deleteTerm($id){
        try{
            $this->termRepository->deleteTerm($id);
        } catch (\Exception $e) {
            return response()->json(['code' => 0]);
        }

        return response()->json(['code' => 1]);
    }
}
