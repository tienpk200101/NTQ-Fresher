<?php

namespace App\Services;

use App\Constants\UserConst;
use App\Models\User;

class DemoService
{
	protected $demoRepo;

	public function __construct(User $user) {

	}
	/**
	 * The function show() returns the view Main.php with the data 
	 * 
	 * @return A view called Main with the data array.
	 */
	public function show()
	{
		$data = [
			'msg' => 'Hello world',
			'demo_account' => UserConst::DEMO_ACCOUNT
		];

		return view('demo', $data);
	}
}
