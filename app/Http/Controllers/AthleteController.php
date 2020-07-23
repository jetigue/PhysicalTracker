<?php

namespace App\Http\Controllers;

use App\Models\Athlete;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AthleteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('athletes.index');
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
        $athlete = request()->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'sex' => 'required|in:m,f',
            'dob' => 'required|date_format:Y-m-d',
            'grad_year' => 'required|integer|min:2020'
        ]);

        $athlete = Athlete::create($athlete);

        return response()->json($athlete, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Athlete $athlete
     * @return Application|Factory|View
     */
    public function show(Athlete $athlete)
    {
        return view('athletes.show', compact('athlete'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Athlete $athlete
     * @return \Illuminate\Http\Response
     */
    public function edit(Athlete $athlete)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Athlete $athlete
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Athlete $athlete)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Athlete $athlete
     * @return \Illuminate\Http\Response
     */
    public function destroy(Athlete $athlete)
    {
        //
    }
}
