<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    private function rules()
    {
        return [
            'type'        => 'required|in:Education,Organization',
            'title'       => 'required',
            'period'      => 'nullable',
            'place'       => 'nullable',
            'description' => 'nullable',
        ];
    }

    public function store(Request $request)
    {
        Experience::create($request->validate($this->rules()));
        return redirect('/#resume');
    }

    public function update(Request $request, Experience $experience)
    {
        $experience->update($request->validate($this->rules()));
        return redirect('/#resume');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect('/#resume');
    }
}