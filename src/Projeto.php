<?php

class Projeto implements ActiveRecord
{

    private int $id;

    public function __construct(
        private string $descricao,
        private string $data,
        private int $status
    ) {
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setData(string $data): void
    {
        $this->data = $data;
    }

    public function getData(): string
    {
        return $this->data;
    }
    
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getStatus(): string
    {
        return $this->status;
    }
    public function save(): bool
    {
        $conexao = new MySQL();
        if (isset($this->id)) {
            $sql = "UPDATE atividades SET descricao = '{$this->descricao}',status = '{$this->status}',data = '{$this->data}' WHERE id = {$this->id}";
        } else {
            $sql = "INSERT INTO atividades (descricao,status,data) VALUES ('{$this->descricao}','{$this->status}','{$this->data}')";
        }
        return $conexao->executa($sql);
    }
    public function delete(): bool
    {
        $conexao = new MySQL();
        $sql = "DELETE FROM atividades WHERE id = {$this->id}";
        return $conexao->executa($sql);
    }

    public static function find($id):Projeto{
        $conexao = new MySQL();
        $sql = "SELECT * FROM atividades WHERE id = {$id}";
        $resultado = $conexao->consulta($sql);
        $p = new projeto($resultado[0]['descricao'],$resultado[0]['data'],$resultado[0]['status']);
        $p->setId($resultado[0]['id']);
        return $p;
    }
    public static function findall():array{
        $conexao = new MySQL();
        $sql = "SELECT * FROM atividades";
        $resultados = $conexao->consulta($sql);
        $projetos = array();
        foreach($resultados as $resultado){
            $p = new Projeto($resultado['descricao'],$resultado['data'],$resultado['status']);
            $p->setId($resultado['id']);
            $projetos[] = $p;
        }
        return $projetos;
    }

    public static function realizadas(): array
    {
        $conexao = new MySQL();
        $sql = "SELECT Festa.data, Festa.Descricao, Festa.status,Festas.endereco
        FROM Festa
        WHERE Festa.data < CURRENT_DATE
        ORDER BY Festa.data ASC    
        ";
        $resultados = $conexao->consulta($sql);
        $sRealizadas = array();
        foreach ($resultados as $resultado) {
            $p = new Projeto($resultado['Descricao'], $resultado['data'], $resultado['status'], $resultado['data']);
            $sRealizadas[] = $p;
        }
        return $sRealizadas;
    }

    public static function proximas(): array
    {
        $conexao = new MySQL();
        $sql = "SELECT s.data, s.Descricao, s.status, s.endereco
        FROM s
        WHERE s.data > CURRENT_DATE
        ORDER BY s.data ASC    
        ";
        $resultados = $conexao->consulta($sql);
        $s = array();
        foreach ($resultados as $resultado) {
            $p = new Projeto($resultado['Descricao'], $resultado['data'], $resultado['status'], $resultado['data']);
            $s[] = $p;
        }
        return $s;
    }
}
?>