<?php
require_once 'CPF.php';

class Titular
{
  private string $nome;
  private CPF $cpf;

  public function __construct(string $nome, string $cpf)
  {
    $this->cpf = new CPF($cpf);
    $this->nome = $nome;
  }

  public function getCpf(): CPF
  {
    return $this->cpf;
  }

  public function getNome(): string
  {
    return $this->nome;
  }
}