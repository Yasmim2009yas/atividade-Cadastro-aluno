<?php

class Aluno{
	private string $nome;
	private int $idade;
	private string $curso;
	private bool $matriculado;
	private float $nota1;
	private float $nota2;
	
	public function __construct(string $nome, int $idade, string $curso){
		$this->nome = $nome;
		$this->idade = $idade;
		$this->curso = $curso;
		$this->matriculado = false;
		$this->nota1 = 0.0;
		$this->nota2 = 0.0;
	}
	
	public function getNome(): string{
		return $this->nome;
	}
	
	public function setNome(string $nome): void{
		$this->nome = $nome;
	}
	
	public function getIdade(): int{
		return $this->idade;
	}
	
	public function setIdade(int $idade): void{
		$this->idade = $idade;
	}
	
	public function getCurso(): string{
		return $this->curso;
	}
	
	public function setCurso(string $curso): void{
		$this->curso = $curso;
	}
	
	public function isMatriculado(): bool{
		return $this->matriculado;
	}
	
	public function setMatriculado(bool $matriculado): void{
		$this->matriculado = $matriculado;
	}
	
	public function getNota1(): float{
		return $this->nota1;
	}
	
	public function setNota1(float $nota1): void{
		$this->nota1 = $nota1;
	}
	
	public function getNota2(): float{
		return $this->nota2;
	}
	
	public function setNota2(float $nota2): void{
		$this->nota2 = $nota2;
	}
	
	
	public function matricular(): void{
		if (!$this->matriculado) {
            $this->matriculado = true;
            echo "Aluno matriculado com sucesso!\n";
        } else {
            echo "Aluno já está matriculado.\n";
        }
	}
	
	public function cancelarMatricula(): void{
		if ($this->matriculado) {
            $this->matriculado = false;
            echo "Matrícula cancelada.\n";
        } else {
            echo "Aluno já está com matrícula inativa.\n";
        }
	}
	
	public function verificarMaioridade(): string{
		if ($this->idade >= 18) {
            return "Aluno é maior de idade e pode participar de cursos noturnos.";
        } else {
            return "Aluno é menor de idade.";
        }
	}
	
	public function cadastrarNotas(float $n1, float $n2): void{
		$this->nota1 = $n1;
        $this->nota2 = $n2;
        echo "Notas cadastradas com sucesso!\n";
	}
	
	public function calcularMedia(): float{
		if ($this->nota1 == 0.0 && $this->nota2 == 0.0) {
            echo "Notas ainda não cadastradas.\n";
            return 0.0;
        }
        return ($this->nota1 + $this->nota2) / 2.0;
	}
	
	public function verificarAprovacao(): void{
		if ($this->nota1 == 0.0 && $this->nota2 == 0.0) {
            echo "Status: Notas não cadastradas.\n";
            return;
        }

        $media = ($this->nota1 + $this->nota2) / 2.0;
        if ($media >= 7.0) {
            echo "Status: Aprovado\n";
        } else {
            echo "Status: Reprovado\n";
        }
	}
	
	public function exibirInformações(): void{
		echo "\n========== INFORMAÇÕES DO ALUNO ==========\n";
        echo "Nome: " . $this->nome . "\n";
        echo "Idade: " . $this->idade . " anos (" . $this->verificarMaioridade() . ")\n";
        echo "Curso: " . $this->curso . "\n";
        echo "Situação da Matrícula: " . ($this->matriculado ? "Ativa" : "Inativa") . "\n";

        if ($this->nota1 == 0.0 && $this->nota2 == 0.0) {
            echo "Notas: Notas ainda não cadastradas.\n";
        } else {
            echo "Nota 1: " . $this->nota1 . "\n";
            echo "Nota 2: " . $this->nota2 . "\n";
            echo "Média: " . $this->calcularMedia() . "\n";
        }
        echo "==========================================\n\n";
	}
}
?>