<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lector;
use App\Models\User;
use App\Http\Requests\Lector\CreateLectorRequest;
use App\Http\Requests\Lector\UpdateLectorRequest;
use App\Http\Resources\Lector\MinifiedLectorResource;
use App\Models\Theme;

class LectorsController extends Controller
{
    public function index()
    {
        $lectors = MinifiedLectorResource::collection(Lector::all());
        return view('lector.lectors', ['lectors' => $lectors]);
    }

    public function show(Lector $lector)
    {
        return view('lector.lector_info', ['lector' => $lector]);
    }

    public function create(CreateLectorRequest $request)
    {
        Lector::query()->create($request->validated());
        return responseOk();
    }

    public function change(Lector $lector)
    {
        $themes = Theme::all();
        return view('lector.lector_update', [
            'lector' => $lector,
            'themes' => $themes
        ]);
    }

    public function update(UpdateLectorRequest $request, Lector $lector)
    {
        // dd($request->validated());
        if (!empty($request->email)) {
            if ($lector->email !== $request->email) {
                $user = User::query()->where('email', $lector->email)->first();
                $user->update(['email' =>  $request->email]);
            }
        }
        $lector->update($request->validated());
        return redirect()->route('lector.index');
    }

    public function destroy(Lector $lector)
    {
        $lector->delete();
        return redirect()->route('lector.index');
    }
}
