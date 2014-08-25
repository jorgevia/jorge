<?php

class BaseController extends Controller {

	protected $viewModel;

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public function __construct(Bazzoloviale\viewModels\ViewModelContainer $viewModel) {
		$this->viewModel = $viewModel;
	}
	/**
	 * Setup the layout used by the controller.
	 *
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
