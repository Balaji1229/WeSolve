<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $aboutContent = [
            'title' => Setting::get('about_title', 'About WeSolve Technologies'),
            'description' => Setting::get('about_description', 'We are a team of passionate developers...'),
            'mission' => Setting::get('about_mission', 'To provide affordable digital solutions...'),
            'vision' => Setting::get('about_vision', 'To become the most trusted partner...'),
            'team_intro' => Setting::get('about_team', 'Our team consists of experienced developers...'),
            'why_affordable' => Setting::get('about_why_affordable', 'We keep our costs low by being efficient...'),
        ];

        return view('about', compact('aboutContent'));
    }
}
