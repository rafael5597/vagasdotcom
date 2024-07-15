<?php

    class Empresa{

        private int $id;
        private string $nome;
        private string $logo;

        public function __construct(){
        }

        public function getId(): int
        {
            return $this->id;
        }

        public function setId(int $id): void
        {
            $this->id = $id;
        }

        public function getNome(): string
        {
            return $this->nome;
        }

        public function setNome(string $nome): void
        {
            $this->nome = $nome;
        }

        public function getLogo(): string
        {
            return $this->logo;
        }

        public function setLogo(string $logo): void
        {
            $this->logo = $logo;
        }

    }