<?php

use oszhu\exception\OSZHUException;
use oszhu\settings\UserSettingsLoader;
use PHPUnit\Framework\TestCase;

final class UserSettingsLoaderTest extends TestCase {

    public function testInvalidIdArgument() {
        $this->expectException(OSZHUException::class);
        UserSettingsLoader::load(null, "");
    }

}
