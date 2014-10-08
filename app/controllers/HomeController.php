<?php


class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	public function showWelcome()
	{
        //En realidad se va a llamar al método render en vex del nombre
		$categories = Category::all();
		echo $this->viewModel->testViewModel();
       // echo $this->viewModel->clientViewModel();

	}
}
