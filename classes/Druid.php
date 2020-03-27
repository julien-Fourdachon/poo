<?php

namespace classes;


class Druid extends Character
{
    private $countBoost = 0;

    function __construct(string $name) {
        parent::__construct($name);
    }

    public function attack(Character $target) {
        $rand = rand(1, 10);
        if ($rand === 1 && $this->countBoost === 0 && $this->lifePoints < 40) {
            return $this->cure();
        } else if ($rand > 1 && $rand < 5 && $this->countBoost === 0) {
            return $this->wildBoost();
        } else {
            return $this->stick($target);
        }
    }

    private function stick(Character $target) {
        $attack = rand(5, 15);
        if ($this->countBoost > 0 && $this->countBoost <= 3) {
            $attack *= 1.5;
            if($this->countBoost < 3) {
                $this->countBoost ++;
            } else {
                $this->countBoost = 0;
            }
        }
        $target->setlifePoints($attack);
        $status = "{$this->name} attaque {$target->name}! Il reste {$target->getLifePoints()} points de vie à {$target->name} !";
        return $status;
    }

    private function wildBoost() {
        $this->countBoost ++;
        $status = "{$this->name} invoque la force de la forêt et va frapper plus for sut 3 tours!";
        return $status;
    }

    public function cure() {
        $this->lifePoints = 100;
        return "{$this->name} a récupérer tous ses points de vie!";
    }
}