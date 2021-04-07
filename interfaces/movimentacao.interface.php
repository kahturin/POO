<?php

interface iMovimentacao{
    public function setDados(array $dados):bool;
    public function getDados(string $tipo, string $datahora, $id_usuario):array;
} 