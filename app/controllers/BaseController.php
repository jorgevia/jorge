<?php
use Bazzoloviale\viewModels\ViewModelsTrait;

class BaseController extends Controller {

    //Adds View Model functionality
    use ViewModelsTrait;
	/**
	 * Setup the layout used by the controller.	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
