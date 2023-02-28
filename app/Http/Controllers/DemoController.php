<?php

namespace App\Http\Controllers;

use App\Services\DemoService;

class DemoController extends Controller implements 
{
	protected $demoService;

	function __construct(
		DemoService $demoService
	) {
		$this->demoService = $demoService;
	}


	/**
	 * It returns the result of calling the show() method on the demoService object
	 * 
	 * @return The show method of the DemoService class.
	 */
	public function show()
	{
		return $this->demoService->show();
	}
}
