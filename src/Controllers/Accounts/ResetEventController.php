<?php

namespace App\Controllers\Accounts;

use App\Models\Repositories\ResetPasswordRepository;
use App\Models\Repositories\UserRepository;
use App\Utils\Lang;
use App\Utils\System;

class ResetEventController {
	public function render(array $pageData): void {
		if (
			System::checkCSRF()
			&& isset($_POST["new_password"])
			&& isset($_POST["new_password_confirm"])
		) {
			if ($_POST["new_password"] === $_POST["new_password_confirm"]) {
				$resetRepo = new ResetPasswordRepository;
				$resetRepo
					->setLink(link: $pageData["link"])
					->setUid()
				;

				$userRepo = new UserRepository;
				$userRepo
					->setUid(uid: $resetRepo->getUid())
					->setPassword(password: $_POST["new_password"])
				;

				$userRepo->savePassword();
				$resetRepo->removeResetLink();

				System::redirect(url: "/");
			} else {
				setcookie("NOTIFICATION", Lang::translate(key: "REGISTER_UNIDENTICAL_PASSWORD"), time() + 60*60*24*30);
			}
		}

		System::redirect();
	}
}
