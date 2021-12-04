<?php

class Conta
{
  private Titular $titular;
  private float $saldo;
  private static $numeroDeContas = 0;

  public function __construct(Titular $titular, float $saldo = 0)
  {
    $this->titular = $titular;
    $this->saldo = $saldo;

    self::$numeroDeContas++;
  }

  public function __destruct()
  {
    if (self::$numeroDeContas) {
      $numberAccounts = self::$numeroDeContas;
      echo "Existem $numberAccounts contas ativas!" . PHP_EOL;
    }

    self::$numeroDeContas--;
  }

  public function sacar(float $valorASacar): void
  {
    if ($valorASacar > $this->getSaldo()) {
      echo "Saldo indisponível";
      return;
    }

    $this->saldo -= $valorASacar;
    echo "$valorASacar sacado!";
  }

  public function depositar(float $valorADepositar): void
  {
    if ($valorADepositar <= 0) {
      echo "Você não adicionou nada seu bocó!";
      return;
    }

    $this->saldo += $valorADepositar;
    echo "$valorADepositar adicionado!";
  }

  public function transferir(float $valorATransferir, Conta $contaDestino): void
  {
    if ($valorATransferir > $this->getSaldo()) {
      echo "Você não tem todo esse dinheiro bixo!";
      return;
    }

    $this->sacar($valorATransferir);
    $contaDestino->depositar($valorATransferir);
    echo "$valorATransferir transferido!";
  }

  public function getSaldo(): float
  {
    return $this->saldo;
  }

  public static function getNumeroDeContas(): int
  {
    return self::$numeroDeContas;
  }

  public function getTitular(): Titular
  {
    return $this->titular;
  }
}
