<?php

interface iMaquinaDeCafe {
    public function preparaCafe($seletor);
}


class MaquinaDeCafePreto implements iMaquinaDeCafe {
  
    public function preparaCafe($seletor) {
        switch ($seletor) {
            case 'expresso':
                return $this->preparaExpresso();
            default:
                throw new CoffeeException('Seleceção não suportada');
        }
    }
    
    protected function preparaExpresso() {
        // prepara um expresso...
    }
}


class MaquinaDeCafeComLeite extends MaquinaDeCafePreto {
  
    public function preparaCafe($seletor) {
        switch ($seletor) {
            case 'expresso':
                return $this->preparaExpresso();
            case 'baunilha':
                return $this->preparaBaunilhaComCafe();
            default:
                throw new SemCafe('selação não suportada');
        }
    }
    
    protected function preparaBaunilhaComCafe() {
        //prepara baunilha com cafe...
    }
}


function pegaCafe(Usuario $usuario) {
    switch ($usuario->getPlan()) {
        case 'leite':
            return new MaquinaDeCafeComLeite();
        case 'cafe':
        default:
            return new MaquinaDeCafePreto();
    }
}


function preparaCafe(Usuario $usuario, $seletor) {
    $MaquinaDeCafePreto = pegaCafe($usuario);
    return $MaquinaDeCafePreto->preparaCafe($seletor);
}
