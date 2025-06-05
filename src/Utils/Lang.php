<?php

namespace Tempora\Utils;

class Lang {

	/**
	 * Lang function
	 *
	 * @param string $key Language's key out of language's file
	 * @param array $options Line replace text
	 *
	 * @return string
	 */
	public static function translate(string $key, ?array $options = null): string {
		$file = file_get_contents(filename: APP_DIR . "/public/langs/" . $_COOKIE["LANG"] . ".json");
		$json = json_decode(json: $file);

		if (DEBUG == 1)
			$GLOBALS["chronos"]["lang_count"]++;

		if (isset($json->$key)) {
			$result = $json->$key;
		} else {
			if (DEBUG == 1)
				$GLOBALS["chronos"]["lang_error_count"]++;

			$result = $key;
		}

		if (isset($options)) {
			foreach ($options as $index => $option) {
				$result = str_replace(search: "$[" . $index . "]", replace: $option, subject: $result);
			}
		}

		if (DEBUG == 1)
			$GLOBALS["chronos"]["langs"][$key] = $result;

		return $result;
	}

	/**
	 * Format language name
	 *
	 * @param string $name Language identifiant
	 *
	 * @return string
	 */
	public static function nameFormat(string $name): string {
		switch ($name) {
			case "fr_FR":
				return "Français";
			case "en_GB":
				return "English";
			default:
				return "";
		}
	}
}
