<?php

namespace App\Http\Controllers;

use App\Models\Physical;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PhysicalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $physicals = Physical::all();

        return view('physicals.index', compact('physicals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $physical = request()->validate ([
            'athlete_id' => 'integer|required',
            'consent_form' => 'boolean',
            'concussion_form' => 'boolean',
            'evaluation_form' =>'boolean',
            'cardiac_form' =>'boolean',
            'exam_date' => 'date|required',
            'restrictions' => 'string|nullable',
            'notes' => 'string|nullable'
        ]);

        $physical = Physical::create($physical)->load('athlete');

        return response()->json($physical, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Physical $physical
     * @return Application|Factory|View
     */
    public function show(Physical $physical)
    {
        return view('physicals.show', compact('physical'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Physical $physical
     * @return \Illuminate\Http\Response
     */
    public function edit(Physical $physical)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Physical $physical
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Physical $physical)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Physical $physical
     * @return \Illuminate\Http\Response
     */
    public function destroy(Physical $physical)
    {
        //
    }
}
