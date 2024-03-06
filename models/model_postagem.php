<?php

class Model_Postagem
{
    public int $id;
    public string $titulo;
    public string $data;
    public string $data_atualizacao;
    public string $resumo;
    public string $descricao;
    public string $img_capa;
    public int $views;
    public string $texto_enfase;

    public function __construct(int $id, string $titulo, string $data, string $data_actualizada, string $resumo, string $descricao, string $img_capa, int $views, string $texto_enfase)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->data = $data;
        $this->data_atualizacao = $data_actualizada;
        $this->resumo = $resumo;
        $this->descricao = $descricao;
        $this->img_capa = $img_capa;
        $this->views = $views;
        $this->texto_enfase = $texto_enfase;

    }
    public function setData($data)
    {
        $this->data = date('Y-m-d H:i:s', strtotime($data));
    }

    public function setDataAtualizacao()
    {
        $this->data_atualizacao = date('Y-m-d H:i:s');
    }

    public function uploadImagem($file)
    {
    }
}
