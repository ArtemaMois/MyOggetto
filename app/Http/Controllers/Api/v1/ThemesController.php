<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Theme;
use App\Http\Requests\Theme\CreateThemeRequest;
use App\Http\Requests\Theme\UpdateThemeRequest;

class ThemesController extends Controller
{
    public function create(CreateThemeRequest $request)
    {
        Theme::query()->create($request->validated());
        return responseOk();
    }

    public function update(UpdateThemeRequest $request, Theme $theme)
    {
        $theme->update($request->validated());
        return responseOk();
    }

    public function destroy(Theme $theme)
    {
        $theme->delete();
        return responseOk();
    }
}
