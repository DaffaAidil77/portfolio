<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function update(Request $request, Profile $profile)
    {
        $data = $request->validate([
            'name'          => 'required',
            'intro'         => 'nullable',
            'headline'      => 'nullable',
            'bio'           => 'nullable',
            'campus'        => 'nullable',
            'study_program' => 'nullable',
            'organization'  => 'nullable',
            'email'         => 'nullable|email',
            'photo'         => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = 'profile_' . time() . '.' . strtolower($file->getClientOriginalExtension());
            $file->move(public_path('assets-portfolio/img'), $name);
            $data['photo'] = $name;
        } else {
            unset($data['photo']); // pakai foto lama
        }

        $profile->update($data);
        return redirect('/#about');
    }
}