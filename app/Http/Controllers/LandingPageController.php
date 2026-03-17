<?php
namespace App\Http\Controllers;

use App\Models\LandingPage;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $pages = LandingPage::latest()->paginate(10);
        return view('admin.landing-pages.index', compact('pages'));
    }
    
    public function create() 
    { 
        return view('admin.landing-pages.create'); 
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'nullable|unique:landing_pages,slug',
            'content' => 'required'
        ]);
        
        LandingPage::create($request->all());
        return redirect()->route('admin.landing-pages.index')
            ->with('success', '✅ Landing Page creada');
    }
    
    public function edit(LandingPage $landingPage)
    {
        return view('admin.landing-pages.edit', compact('landingPage'));
    }
    
    public function update(Request $request, LandingPage $landingPage)
    {
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:landing_pages,slug,'.$landingPage->id,
            'content' => 'required'
        ]);
        
        $landingPage->update($request->all());
        return redirect()->route('admin.landing-pages.index')
            ->with('success', '✅ Landing Page actualizada');
    }
    
    public function destroy(LandingPage $landingPage)
    {
        $landingPage->delete();
        return redirect()->route('admin.landing-pages.index')
            ->with('success', '✅ Landing Page eliminada');
    }
}
