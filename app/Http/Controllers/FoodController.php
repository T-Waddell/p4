<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index() {
        return 'This is the Low-Nickel Diet Tracker...';
    }
    public function track() {
        return 'Here you can track the foods you eat today and how many nickel points you have remaining...';
    }
    public function log() {
        return 'Here you can see your entire food log...';
    }

    public function edit() {
        return 'Here you can edit your food log...';
    }
}
