<?php

class Conta
{
  public string $cpfTitular;
  public string $nomeTitular;
  public float $saldo;

  public function __construct(string $nomeTitular, string $cpfTitular, float $saldo)
  {
    $this->nomeTitular = $nomeTitular;
    $this->cpfTitular = $cpfTitular;
    $this->saldo = $saldo;
  }

  public function sacar(float $valorASacar): void
  {
    if ($valorASacar > $this->saldo) {
      echo "Saldo indisponível";
      return;
    }

    $this->saldo -= $valorASacar;
  }

  public function depositar(float $valorADepositar): void
  {
    if ($valorADepositar <= 0) {
      echo "Você não adicionou nada seu bocó!";
      return;
    }

    $this->saldo += $valorADepositar;
  }

  public function transferir(float $valorATransferir, Conta $contaDestino): void
  {
    if ($valorATransferir > $this->saldo) {
      echo "Você não tem todo esse dinheiro bixo!";
      return;
    }

    $this->sacar($valorATransferir);
    $contaDestino->depositar($valorATransferir);
  }
}

$conta1 = new Conta('Edmarques', '123.456.789-10', 99999999);

$conta2 = new Conta('Fulano da Sila', '101.234.567-89', 2000);

$conta1->sacar(17);
$conta1->transferir(200, $conta2);

var_dump($conta1);
var_dump($conta2);
