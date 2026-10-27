<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WorkController extends Controller
{
    private function saveImage($file)
    {
        $name = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . strtolower($file->getClientOriginalExtension());
        $file->move(public_path('assets-portfolio/img/portfolio'), $name);
        return $name;
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required',
            'category'    => 'required',
            'image'       => 'required|image|max:2048',
            'description' => 'nullable',
            'year'        => 'nullable|integer',
        ]);

        $data['image'] = $this->saveImage($request->file('image'));
        Work::create($data);
        return redirect('/#portfolio');
    }

    public function update(Request $request, Work $work)
    {
        $data = $request->validate([
            'title'       => 'required',
            'category'    => 'required',
            'image'       => 'nullable|image|max:2048',
            'description' => 'nullable',
            'year'        => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $this->saveImage($request->file('image'));
        } else {
            unset($data['image']); // pakai foto lama
        }

        $work->update($data);
        return redirect('/#portfolio');
    }

    public function destroy(Work $work)
    {
        $work->delete();
        return redirect('/#portfolio');
    }
}