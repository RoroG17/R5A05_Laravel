<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->role == 2 ){
            return redirect()->route('eleves.index');
        }
        $modules = Module::all();
        return view('modules/index', compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('modules/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|unique:modules,code',
            'nom' => 'required|string|max:255',
            'coefficient' => 'required|numeric|min:0',
        ]);

        DB::table('modules')->insert([
            'code' => $request->input('code'),
            'nom' => $request->input('nom'),
            'coefficient' => $request->input('coefficient'),
            'created_at' => now(), // Ajoute une date de création
            'updated_at' => now(), // Ajoute une date de mise à jour
        ]);
        return redirect()->route('modules.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $module = Module::where('code', $id)->first();
        return view('modules/show', compact('module'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $module = Module::where('code', $id)->first();
        return view('modules/edit', compact('module'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'nom' => 'required|string|max:255',
            'coefficient' => 'required|numeric|min:0',
        ]);

        $module = Module::where('code', $id)->first();

        if ($module) {
            DB::table('modules')
                ->where('code', $id)
                ->update(['nom' => $request->input('nom'), 'coefficient' => $request->input('coefficient')]);
        }
        return redirect()->route('modules.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('modules')
            ->where('code', $id)
            ->delete();

        return redirect()->route('modules.index');
    }
}
