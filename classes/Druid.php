<?php

namespace classes;

class Druid extends Character {

    function __construct(string $name) {
        parent::__construct($name);
    }

    public function attack(Character $target) {
        $rand = rand(1, 10);
        if ($rand <= 8) {
            return $this->stick($target);
        } else if ($rand > 8) {
            return $this->boost();
        }
    }

    private function stick(Character $target) {
        $attack = rand(5, 15);
        if ($this->boost) {
            $rand = rand(17, 30);
            $rand /= 10;
            $attack *= $rand;
            $this->boost = False;
        }
        $target->setlifePoints($attack);
        $status = "{$this->name} attaque {$target->name}! Il reste {$target->getLifePoints()} points de vie à {$target->name} !";
        return $status;
    }

    private function boost() {
        $this->boost = True;
        $status = "{$this->name} se concentre pour taper plus fort!";
        return $status;
    }
}