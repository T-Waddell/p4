<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;

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
    public function create(Request $request) {
        #return 'Here you can track the foods you eat today and how many nickel points you have remaining...';
        return view('track')->with([
            'category' => $request->session()->get('category', ''),
            'food' => $request->session()->get('food', ''),
            'servings' => $request->session()->get('servings', 1),
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
        return redirect('/foods/create')->with([
            'category' => $category,
            'food' => $food,
            'servings' => $servings,
            'meal' => $meal,
            'mealForPrint' => $mealForPrint,
            'date' => $date
        ]);
    }

    /**
     * POST /foods
     * Process the form for adding a new food entry
     */
    public function store(Request $request)
    {
        # Validate the request data
        $request->validate([
            'category' => 'required|alpha',
            'food' => 'required|alpha',
            'servings' => 'required|numeric',
            'meal' => 'required',
            'date' => 'required',
        ]);

        $food = new Food();
        $food->category = $request->category;
        $food->food = $request->food;
        $food->servings = $request->servings;
        $food->meal = $request->meal;
        $food->date = $request->date;

        $food->save();

        return redirect('/foods/create')->with([
            'alert' => 'Your food entry was added.'
        ]);
    }


    public function diary() {
        #return 'Here you can see your entire food log...';

        #get the data to display on the page:
        $foods = Food::orderBy('date')->get();

        #approach 1: query database again
        #$newBooks = Book::latest()->limit(3)->get();

        #appraoch 2: query the collection from our first query.
        #$newBooks = $books->sortByDesc('created_at')->take(3);

        return view('diary')->with([
            'foods' => $foods,
        ]);
    }
    #GET /foods/{id}/edit
    public function edit($id)
    {
        #return 'Here you can edit your food log...';
        $food = Food::find($id);

        if (!$food) {
            return redirect('/foods')->with([
                'alert' => 'Food entry not found.'
            ]);
        }
        return view('foods.edit')->with([
            'food' => $food
        ]);
    }

    # PUT /foods/{id}
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category' => 'required|alpha',
            'food' => 'required|alpha',
            'servings' => 'required|numeric',
            'meal' => 'required',
            'date' => 'required',
        ]);

        $food = Food::find($id);
        $food->category = $request->input('category');
        $food->food = $request->input('food');
        $food->servings = $request->input('servings');
        $food->meal = $request->input('meal');
        $food->date = $request->input('date');
        $food->save();

        return redirect('/foods/'.$id.'/edit')->with([
            'alert' => 'Your changes were saved.'
        ]);
    }

    # GET /foods/{id}/delete
    public function delete($id)
    {
        $food = Food::find($id);

        if (!$food) {
            return redirect('/foods')->with([
                'alert' => 'Food entry not found.'
            ]);
        }

        return view('foods.delete')->with([
            'food' => $food
        ]);
    }

    #delete
    public function destroy(Request $request, $id)
    {
        $food = Food::find($id);
        $food->delete();

        return redirect('/foods')->with([
            'alert' => 'The following entry was deleted: '.$food->date.' - '.$food->food.' - '.$food->meal
        ]);
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
