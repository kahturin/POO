<?php

class Retangulo {
  
    public $largura;
    public $altura;
    
    public function __construct($largura, $altura) {
        $this->largura = $largura;
        $this->altura = $altura;
    }
}

class Quandrado {
  
    public $comprimento;
    
    public function __construct($comprimento) {
        $this->comprimento = $comprimento;
    }
}


class AreaCalculada {
  
    protected $formas;
    
    public function __construct($formas = array()) {
        $this->formas = $formas;
    }
    
    public function soma() {
        $area = [];
        
        foreach($this->formas as $forma) {
            if($forma instanceof Quadrado) {
                $area[] = pow($forma->comprimento, 2);
            } else if($forma instanceof Retangulo) {
                $area[] = $forma->largura * $forma->altura;
            }
        }
    
        return array_sum($area);
    }

    interface Forma {
        public function area();
    }
    //Se adicionar outra forma como círculo, precisará alterar a areaCalculada para calcular a nova área da 
    //forma e isso não é viável. A solução que encontrei foi criar uma interface Forma simples que tenha o método
    // area e será implementada por todas as outras formas. Desta forma, será usado apenas um método para calcular
    // a soma e se precisar adicionar uma nova forma, ele apenas implementará a interface Forma.
    
    class Retangulo implements Forma {
      
        private $largura;
        private $altura;
        
        public function __construct($largura, $altura) {
            $this->largura = $largura;
            $this->altura = $altura;
        }
        
        public function area() {
            return $this->altura * $this->altura;
        }
    }
    
    class Quadrado implements Forma {
      
        private $comprimento;
        
        public function __construct($comprimento) {
            $this->comprimento = $comprimento;
        }
        
        public function area() {
            return pow($this->comprimento, 2);
        }
    }
    
    
    class AreaCalculada {
      
        protected $formas;
        
        public function __construct($formas = array()) {
            $this->formas = $formas;
        }
        
        public function soma() {
            $area = [];
            
            foreach($this->formas as $forma) {
                $area[] = $forma->area();
            }
        
            return array_sum($area);
        }
}
