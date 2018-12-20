# Project 4
+ By: *Tara Waddell*
+ Production URL: <http://p4.tarawaddell.me>

## Database

Primary tables:
  + `foods`
  + `tags`
  + `scores`
  
Pivot table(s):
  + `food_tag`


## CRUD
__Create__
  + Visit <http://p4.tarawaddell.me/foods/create>
  + Fill out form
  + Click *Add food to tracker*
  + Observe confirmation message
  
__Read__
  + Visit <http://p4.tarawaddell.me/foods> to see a list of all food entries
  
__Update__
  + Visit <http://p4.tarawaddell.me/foods>; choose the Edit button below to one of the entries
  + Make some edit to form
  + Click *Update Food Entry*
  + Observe confirmation message
  
__Delete__
  + Visit <http://p4.tarawaddell.me/books>; choose the Delete button below to one of the entries
  + Confirm deletion
  + Observe confirmation message

## Outside resources
* Mislanker, M., Zirwas, M.J. (2013, July/August). Low-Nickel Diet Scoring System for Systemic Nickel Allergy. *Dermatitis*, 24(4), 190-195.
* Styling via [Bootstrap CDN](https://www.bootstrapcdn.com)
* [https://stackoverflow.com/a/51192546](Stack Overflow post) for code for using the old() helper function for retaining the value of radio buttons after the form is submitted
* Sticky footer code from the DWA15 course example application.
* [Raleway font](https://fonts.google.com/specimen/Raleway) via Google Fonts
* [Source Sans Pro font](https://fonts.google.com/specimen/Source+Sans+Pro) via Google Fonts

## Code style divergences
N/A

## Notes for instructor
The project requirements mentioned using this project to build a smaller portion of a larger idea. I have wanted to create the Nickel Tracker I began here for my own personal use. I focused on the requirements for the project (CRUD operations, two primary tables, and a pivot table), and you'll see that I began laying the groundwork for the rest of the application. I created a nickel scores migration, model, and seeder. I plan to continue to build out the scores data, create a relationship between my scores and foods tables, and create the calculation to let the user know how many "nickel points" they have consumed and how many they have remaining for the day. 
