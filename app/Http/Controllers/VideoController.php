<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;

class VideoController extends Controller
{
    public function index(Request $request): Response
    {
        $videos = $request->user()->videos()->paginate(12);
        return Inertia::render('Video/Index', compact('videos'));
    }

    public function create(): Response
    {
        return Inertia::render('Video/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'url' => 'required',
            'title' => 'required|min:3|max:100',
            'subtitles' => 'required|array',
            'subtitles.*.from' => 'required|numeric|min:0',
            'subtitles.*.to' => 'required|numeric|min:0',
            'subtitles.*.description' => 'required'
        ]);

        DB::transaction(function () use ($validated) {
            $video = new Video($validated);
            $video->user()->associate(auth()->user());
            $video->save();
            $video->subtitles()->createMany($validated['subtitles']);
        });

        return redirect()->route('videos.index');
    }

    public function edit(Video $video): Response
    {
        $video->loadMissing('subtitles');
        return Inertia::render('Video/Edit', compact('video'));
    }

    public function update(Video $video, Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|min:3|max:100',
            'subtitles' => 'required|array',
            'subtitles.*.from' => 'required|numeric|min:0',
            'subtitles.*.to' => 'required|numeric|min:0',
            'subtitles.*.description' => 'required'
        ]);
        $video->fill($validated);
        $video->subtitles()->delete();
        $video->subtitles()->createMany($validated['subtitles']);
        $video->save();
        return redirect()->route('videos.index');
    }

    public function show(Video $video): Response
    {
        $video->loadMissing('subtitles');
        return Inertia::render('Video/Show', compact('video'));
    }

    public function destroy(Video $video): RedirectResponse
    {
        $video->delete();
        return redirect()->back();
    }
}
