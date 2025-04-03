<?php

namespace App\Controllers\Accounts;

use App\Enums\Path;
use App\Factories\NavbarFactory;

class RegisterController {
	public function render(array $pageData): void {
		$scripts = [
			"/scripts/engine.js",
			"/scripts/theme.js"
		];

		require Path::LAYOUT->value . "/header.php";

		(new NavbarFactory())->render();

		require Path::LAYOUT->value . "/register/index.php";

		include Path::LAYOUT->value . "/footer.php";
	}
}
