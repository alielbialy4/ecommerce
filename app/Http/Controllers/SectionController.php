<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Section::all();
        return view('admin.sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sections.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);
        Section::create([
            'name' => $request->name,
        ]);
        Alert::success('تم الإضافة', '  تم إضافة قسم جديد بنجاح');
        return redirect()->route('section.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $section = Section::find($id);
        if ($section) {
            return view('admin.sections.edit', compact('section'));
        }
        return redirect()->route('section.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function changeStatus(Request $request)
    {
        $section = Section::findOrFail($request->id);
        switch ($section->status) {
            case 1:
                $section->update(['status' => '0']);
                break;
            case 0:
                $section->update(['status' => '1']);
                break;
        }
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $section = Section::find($request->id);
        if ($section) {
            $section->update([
                'name' => $request->name,
            ]);
            return redirect()->route('section.index');
        }
        return redirect()->route('section.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $section = Section::find($request->id);
        if ($section) {

            Section::destroy($request->id);
            Alert::success('تم الحذف', '  تم حذف قسم جديد بنجاح');
            return redirect()->route('section.index');
        } else {
            return redirect()->route('section.index');
        }
    }
}
