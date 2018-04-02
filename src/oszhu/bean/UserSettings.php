<?php

/**
 * NAV teszt rendszer hozzáférések:
  technikai felhasználó jelszó: QaTH5nKpFpR8
  technikai felhasználónév: 2lbvtyvgxizjedx
  XML aláírókulcs: fe-9bc3-b960434cb6dc239OTVLE5V2V
  XML cserekulcs: 795c239OTVLFKV2W
 */

namespace oszhu\bean;

class UserSettings {

    private $name;
    private $password;
    private $xmlKeySign;
    private $xmlChangeKey;

    public function __construct($name, $password, $xmlKeySign, $xmlChangeKey) {
        $this->name = $name;
        $this->password = $password;
        $this->xmlKeySign = $xmlKeySign;
        $this->xmlChangeKey = $xmlChangeKey;
    }

    public function getName() {
        return $this->name;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getXmlKeySign() {
        return $this->xmlKeySign;
    }

    public function getXmlChangeKey() {
        return $this->xmlChangeKey;
    }

}
