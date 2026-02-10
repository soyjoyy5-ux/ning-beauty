<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TermsCondition;
use Illuminate\Http\Request;

class TermsConditionController extends Controller
{
    public function index()
    {
        $terms = TermsCondition::first();

        return view('admin.terms.index', compact('terms'));
    }

    public function create()
    {
        return view('admin.terms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required',
        ]);

        TermsCondition::create($request->only('title', 'content'));

        return redirect()
            ->route('admin.terms.index')
            ->with('success', 'Terms & Conditions created successfully');
    }

    public function edit(TermsCondition $terms)
    {
        return view('admin.terms.edit', compact('terms'));
    }

    public function update(Request $request, TermsCondition $terms)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required',
        ]);

        $terms->update($request->only('title', 'content'));

        return redirect()
            ->route('admin.terms.index')
            ->with('success', 'Terms & Conditions updated successfully');
    }
}
