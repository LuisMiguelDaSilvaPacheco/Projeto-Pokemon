<?php

class Pokemon{

    public $nome;
    public $tipo1;
    public $tipo2;
    public $experiencia;
    public $nivel;
    public $hp;
    public $vida;
    public $ataqueF;
    public $ataqueE;
    public $defesaF;
    public $defesaE;
    public $velocidade;
    public $statusTotal;

    function batalhar($pokemons){
        if ($pokemons[0]->statusTotal > $pokemons[1]->statusTotal) {
            $chanceDeVencer = 75;
            if (rand(1,100) <= $chanceDeVencer) {
                $pokemons[0]->experiencia += rand(10, 30);
                print "Parabéns! você venceu!\n\n";
            } else {
                $pokemons[1]->experiencia += rand(8, 15);
                print "Que pena! você perdeu!\n\n";
            }
        } elseif ($pokemons[0]->statusTotal < $pokemons[1]->statusTotal) {
            $chanceDeVencer = 25;
            if (rand(1,100) <= $chanceDeVencer) {
                $pokemons[0]->experiencia += rand(10, 30);
                print "Parabéns! você venceu!\n\n";
            } else {
                $pokemons[1]->experiencia += rand(8, 15);
                print "Que pena! você perdeu!\n\n";
            }
        }
        elseif ($pokemons[0]->statusTotal > $pokemons[1]->statusTotal) {
            $chanceDeVencer = 50;
            if (rand(1,100) <= $chanceDeVencer) {
                $pokemons[0]->experiencia += rand(10, 30);
                print "Parabéns! você venceu!\n\n";
            } else {
                $pokemons[1]->experiencia += rand(8, 15);
                print "Que pena! você perdeu!\n\n";
            }
        }
        return $pokemons;
    }

    function ganharNivel($pokemons){
        if ($pokemons[0] -> experiencia >= 100) {
            $pokemons[0] -> nivel++;
            $pokemons[0] -> experiencia = 0;

            $pokemons[0] -> vida += rand(1,4);
            $pokemons[0] -> ataqueF += rand(1,2);
            $pokemons[0] -> ataqueE += rand(1,2);
            $pokemons[0] -> defesaF += rand(1,3);
            $pokemons[0] -> defesaE += rand(1,3);
            $pokemons[0] -> velocidade += rand(1,3);
            print "Seu pokémon ganhou 1 nível! Seus status aumentaram!\n\n";
        }
        if ($pokemons[1] -> experiencia >= 100) {
            $pokemons[1] -> nivel++;
            $pokemons[1] -> experiencia = 0;

            $pokemons[1] -> vida += rand(1,4);
            $pokemons[1] -> ataqueF += rand(1,2);
            $pokemons[1] -> ataqueE += rand(1,2);
            $pokemons[1] -> defesaF += rand(1,3);
            $pokemons[1] -> defesaE += rand(1,3);
            $pokemons[1] -> velocidade += rand(1,3);
            print "O pokémon adversário ganhou 1 nível! Os status dele aumentaram!\n\n";
        }
        return $pokemons;
    }
}

$pokemons = array();

for ($i=0; $i < 2; $i++) { 
    $pokemon = new Pokemon();
    $pokemon -> nome = readline('Diga o nome do seu pokémon: ');
    $pokemon -> tipo1 = readline('Diga o tipo primário do seu pokémon: ');
    $pokemon -> tipo2 = readline('Diga o tipo secundário do seu pokémon: ');
    $pokemon -> nivel = rand(1, 5);
    $pokemon -> experiencia = 0;
    $pokemon -> vida = rand(1,4) * $pokemon->nivel;
    $pokemon -> ataqueF = rand(1,2) * $pokemon->nivel;
    $pokemon -> ataqueE = rand(1,2) * $pokemon->nivel;
    $pokemon -> defesaF = rand(1,3) * $pokemon->nivel;
    $pokemon -> defesaE = rand(1,3) * $pokemon->nivel;
    $pokemon -> velocidade = rand(1,3) * $pokemon->nivel;
    $pokemon -> statusTotal = $pokemon->nivel + $pokemon->ataqueF + $pokemon->ataqueE + $pokemon->defesaF + $pokemon->defesaE + $pokemon->velocidade;
    print "\n";

    array_push($pokemons, $pokemon);
}

$continuar = true;

do {
    print "*****************************
*          ESCOLHA          *
*****************************
* 1- Batalhar               *
* 2- Ver seus status        *
* 3- Ver status inimigo     *
* 4- Sair                   *
***************************** \n\n";

    $opcao = readline();
    print "\n";

    switch ($opcao) {
        case '1':
            $pokemons = $pokemons[0] -> batalhar($pokemons);
            $pokemons = $pokemons[0] -> ganharNivel($pokemons);
            sleep(2);
            break;

        case '2':
            print "\nNome: ". $pokemons[0] -> nome. "\n".
                   "Tipo primário: ". $pokemons[0] -> tipo1. "\n".
                   "Tipo secundário: ". $pokemons[0] -> tipo2. "\n".
                   "Nível: ". $pokemons[0] -> nivel. "\n".
                   "Experiência: ". $pokemons[0] -> experiencia. "\n".
                   "Vida: ". $pokemons[0] -> vida. "\n".
                   "Ataque físico: ". $pokemons[0] -> ataqueF. "\n".
                   "Ataque especial: ". $pokemons[0] -> ataqueE. "\n".
                   "defesa física: ". $pokemons[0] -> defesaF. "\n".
                   "defesa especial: ". $pokemons[0] -> defesaE. "\n".
                   "velocidade: ". $pokemons[0] -> velocidade. "\n".
                   "status totais: ". $pokemons[0] -> statusTotal. "\n";
                   sleep(5);
            break;

        case '3':
            print "\nNome: ". $pokemons[1] -> nome. "\n".
                   "Tipo primário: ". $pokemons[1] -> tipo1. "\n".
                   "Tipo secundário: ". $pokemons[1] -> tipo2. "\n".
                   "Nível: ". $pokemons[1] -> nivel. "\n".
                   "Experiência: ". $pokemons[1] -> experiencia. "\n".
                   "Vida: ". $pokemons[1] -> vida. "\n".
                   "Ataque físico: ". $pokemons[1] -> ataqueF. "\n".
                   "Ataque especial: ". $pokemons[1] -> ataqueE. "\n".
                   "defesa física: ". $pokemons[1] -> defesaF. "\n".
                   "defesa especial: ". $pokemons[1] -> defesaE. "\n".
                   "velocidade: ". $pokemons[1] -> velocidade. "\n".
                   "status totais: ". $pokemons[1] -> statusTotal. "\n\n";
                   sleep(5);
            break;

        case '4':
            print "Saindo...\n\n";
            $continuar = false;
            break;
        
        default:
            print "Opção inváĩda, tente novamente!\n\n";
            sleep(3);
            break;
    }

} while ($continuar == true);

print "Para sua segurança, as informações serão apagadas!";
sleep(5);
system('clear');