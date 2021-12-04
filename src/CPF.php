<?php

class CPF
{
  private string $cpf;

  public function __construct(string $cpf)
  {
    $this->validateCPF($cpf);
  }

  public function getCpf(): string
  {
    return $this->cpf;
  }

  private function validateCPF(string $cpf): void
  {
    if (strlen($cpf) < 14) {
      echo "CPF inválido" . PHP_EOL;
      exit();
    }

    $this->cpf = $cpf;
  }
}