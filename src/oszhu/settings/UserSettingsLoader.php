<?php

namespace oszhu\settings;

use oszhu\bean\UserSettings;
use oszhu\exception\OSZHUException;

class UserSettingsLoader {

    private static $user;

    private function __construct($id, $filePath) {
        if ($id == null) {
            throw new OSZHUException("Invalid argument");
        }

        if (!file_exists($filePath)) {
            throw new OSZHUException("File not found");
        }

        $fileContent = file_get_contents($filePath);

        if ($fileContent === false) {
            throw new OSZHUException("File is empty");
        }

        $array = json_decode($fileContent);

        if ($array === null) {
            throw new OSZHUException("JSON decoding failed");
        }

        if (empty($array[$id]) || !self::validate($array[$id])) {
            throw new OSZHUException("Empty settings");
        }

        $user = new UserSettings($array[$id]["name"], $array[$id]["password"], $array[$id]["xmlKeySign"], $array[$id]["xmlChangeKey"]);
        self::$user = $user;
    }

    public static function load($id, $filePath) {
        if (!isset(self::$user)) {
            $instance = new self($id, $filePath);
            self::$user = $instance::$user;
        }

        return self::$user;
    }

    private static function validate($data) {
        return (!empty($data["name"]) &&
            !empty($data["password"]) &&
            !empty($data["xmlKeySign"]) &&
            !empty($data["xmlChangeKey"]));
    }

}
