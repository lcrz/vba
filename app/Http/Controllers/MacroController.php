<?php

namespace App\Http\Controllers;

use App\Models\Macro;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMacroRequest;
use App\Http\Requests\UpdateMacroRequest;
use Illuminate\Support\Facades\DB;

/**
 * Class MacroController
 * @package App\Http\Controllers
 */
class MacroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $macros = Macro::paginate();

        return view('macro.index', compact('macros'))
            ->with('i', (request()->input('page', 1) - 1) * $macros->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $macro = new Macro();
        return view('macro.create', compact('macro'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMacroRequest $request)
    {
        // los valores bool no son automaticos
        $request->merge([
            'activa' => ($request->has('activa')) ? 1 : 0,
        ]);
        
        $request->validate( $request->rules() );
        
        Macro::create($request->all());
        return redirect()->route('macros.index')
            ->with('success', 'Macro created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $macro = Macro::find($id);

        return view('macro.show', compact('macro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $macro = Macro::find($id);

        return view('macro.edit', compact('macro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Macro $macro
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMacroRequest $request, Macro $macro)
    {
        $request->validate( $request->rules() );

        // los valores bool no son automaticos
        $request->merge([
            'activa' => ($request->has('activa')) ? 1 : 0,
        ]);
        //dd($request->all());
        $macro->update($request->all());        

        return redirect()->route('macros.index')
            ->with('success', 'Macro ' . __('updated successfully'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $macro = Macro::find($id)->delete();

        return redirect()->route('macros.index')
            ->with('success', 'Macro deleted successfully');
    }

    public function categoria($id)
    {
        $macros = Macro::where('categoria_id', $id)->paginate();

        return view('macro.categoria', compact('macros'))
            ->with('i', (request()->input('page', 1) - 1) * $macros->perPage());
       
    }

    public function busqueda(Request $request)
    {
        $macros = Macro::search($request->texto)->paginate();

        return view('macro.resultado', compact('macros'))
            ->with('i', (request()->input('page', 1) - 1) * $macros->perPage());
       
    }

    public function macros()
    {
        $macros = Macro::paginate();

        return view('macro.macros', compact('macros'))
            ->with('i', (request()->input('page', 1) - 1) * $macros->perPage());
       
    }
}
