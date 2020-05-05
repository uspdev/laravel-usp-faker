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

    public function graduacao()
    {
        return RandomReplicado::graduacao();
    }
}
