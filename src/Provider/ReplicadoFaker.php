<?php

namespace Uspdev\Provider;

use Faker\Provider\Base;
use Uspdev\Utils\RandomReplicado;

class ReplicadoFaker extends Base
{
    public function docente()
    {
        return RandomReplicado::docente();
    }

    public function servidor()
    {
        return RandomReplicado::servidor();
    }

    public function estagiario()
    {
        return RandomReplicado::estagiario();
    }

    public function graduacao()
    {
        return RandomReplicado::graduacao();
    }

    public function posgraduacao()
    {
        return RandomReplicado::posgraduacao();
    }
}
