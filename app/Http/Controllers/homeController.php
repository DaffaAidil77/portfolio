<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\Experience;
use App\Models\Profile;

class homeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $works = Work::all();
        $experiences = Experience::all();
        $profile = Profile::firstOrCreate(['id' => 1], [
            'name'          => 'Dapa',
            'intro'         => 'Perkenalan singkat tentang saya.',
            'headline'      => 'Photographer, Student & Organizer.',
            'bio'           => 'Mahasiswa Teknik Informatika yang juga fotografer dan kepala departemen di HIMA.',
            'campus'        => 'Politeknik Caltex Riau',
            'study_program' => 'Teknik Informatika',
            'organization'  => 'HIMA',
            'email'         => 'email@example.com',
        ]);
        return view('home', compact('works', 'experiences', 'profile'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
