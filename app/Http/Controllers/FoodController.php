<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index() {
        #return 'This is the Low-Nickel Diet Tracker...';
        return view('welcome');
    }
    /*
     * route: /track
     * Show form to input food information
     */
    public function track(Request $request) {
        #return 'Here you can track the foods you eat today and how many nickel points you have remaining...';
        return view('track')->with([
            'category' => $request->session()->get('category', ''),
            'food' => $request->session()->get('food', ''),
            'meal' => $request->session()->get('meal', ''),
            'mealForPrint' => $request->session()->get('mealForPrint', ''),
            'date' => $request->session()->get('date', ''),
        ]);
    }

    /*
     * route: /results
     * Calculate the results and redirect user back to form with results displayed below
     */
    public function trackProcess(Request $request)
    {
        # Validate the request data
        $request->validate([
            'category' => 'required',
            'food' => 'required',
            'meal' => 'required',
            'date' => 'required',
        ]);

        #Get our variables from the form:
        $category = $request->input('category', '');
        $food = $request->input('food', '');
        $meal = $request->input('meal', '');
        $date = $request->input('date');

        #Adjust the meal verbiage:
        If ($meal == 'snack') {
            $mealForPrint = 'a snack';
        } else {
            $mealForPrint = $meal;
        }

        #Calculate the length of time needed to reach the savings goal:
        #$calculated = ceil($savingsGoal / $savings);

        #Convert the length of time to days:
        /*
        if ($cadence == 'weekly') {
            $daysToAdd = $calculated * 7;
        } else if ($cadence == 'monthly') {
            $daysToAdd = $calculated * 30;
        }

        #Add days to the start date:
        $carbonStartDate = new Carbon($startDate);
        $stringStartDate = $carbonStartDate->toFormattedDateString();
        $completeDate = $carbonStartDate->addDays($daysToAdd);
        $completeDate = $completeDate->toFormattedDateString();
        */

        # Redirect back to the search page w/ the data (if any) stored in the session
        # Ref: https://laravel.com/docs/redirects#redirecting-with-flashed-session-data
        return redirect('/track')->with([
            'category' => $category,
            'food' => $food,
            'meal' => $meal,
            'mealForPrint' => $mealForPrint,
            'date' => $date
        ]);
    }


    public function log() {
        return 'Here you can see your entire food log...';
    }

    public function edit() {
        return 'Here you can edit your food log...';
    }

/*
 * Not sure if I need this one:
 */
    public function show($food)
    {
        return view('log.show')->with(['food' => $food]);
        /*pass data to the view using the with chained on method*/
    }
}
