<?php

namespace Uspdev\Utils;

class RandomReplicado
{
    public static function docente() {
        return self::auxLocalizaPessoa('Docente');
    }

    public static function graduacao() {
        return self::auxLocalizaPessoa('Aluno de Gradua');
    }

    /**
     * Retorna o codpes  USP "aleatório" no contexto da unidade
     * A lógica para a condição de "aleatório" ainda não está muito boa
     * e pode ser melhorada
     */
    public static function auxLocalizaPessoa($tipvinext) {
        $codundclg = getenv('REPLICADO_CODUNDCLG');

        /** 1. Enquanto não tivermos dados retornados na consulta
         *  executaremos esse loop.
         */
        do {
            /* 2. Vamos filtrar baseado em nompes */
            $nompesFiltro = self::nompesFiltro();
            /* 3. Vamos selecionar 10 apenas - performance */
            $query = "SELECT TOP 5 * FROM LOCALIZAPESSOA 
                    WHERE tipvinext LIKE '%{$tipvinext}%' 
                    AND sitatl = 'A'
                    AND codundclg = {$codundclg}
                    AND nompes LIKE '%{$nompesFiltro}%'";
            $result = \Uspdev\Replicado\DB::fetchAll($query);
        } while(empty($result));

        /* Desses 10 (ou menos) vamos escolher um aleatório */
        $escolhido = $result[array_rand($result)];
        return $escolhido['codpes'];
    }

    public static function nompesFiltro() {
        $consoante = substr(str_shuffle("bcdfghjklmnpqrstvwxyz"),0,1);
        $vogal = substr(str_shuffle("aeiou"),0,1);
        return $consoante.$vogal;
    }
}

