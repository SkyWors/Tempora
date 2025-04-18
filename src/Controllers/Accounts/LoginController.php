<?php

namespace App\Controllers\Accounts;

use App\Enums\Path;
use App\Factories\NavbarFactory;

class LoginController {
	public function render(array $pageData): void {
		if (isset($pageData["form_email"])) {
			$_SESSION["page_data"] = [
				"form_email" => $pageData["form_email"]
			];
		}

		$scripts = [
			"/scripts/engine.js",
			"/scripts/theme.js"
		];

		require Path::LAYOUT->value . "/header.php";

		(new NavbarFactory())->render();

		require Path::LAYOUT->value . "/login/index.php";

		include Path::LAYOUT->value . "/footer.php";
	}
}
