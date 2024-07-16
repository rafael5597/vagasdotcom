CREATE TABLE `usuario` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `senha` VARCHAR(255) NOT NULL,
    `admin` BOOLEAN NOT NULL DEFAULT 0,
    `data_criacao` DATETIME NOT NULL,
    `ativo` BOOLEAN NOT NULL DEFAULT 1,
    `foto` VARCHAR(255),
    `link_linkedin` VARCHAR(255),
    PRIMARY KEY (`id`),
    UNIQUE KEY `email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `categoria` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `empresa` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `vaga` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `titulo` VARCHAR(255) NOT NULL,
    `descricao` TEXT NOT NULL,
    `cargo` VARCHAR(255),
    `modalidade` VARCHAR(255) NOT NULL,
    `localizacao` VARCHAR(255) NOT NULL,
    `empresa_id` INT NOT NULL,
    `categoria_id` INT NOT NULL,
    `data_publicacao` DATETIME NOT NULL,
    `ativo` BOOLEAN NOT NULL DEFAULT 1,
    `imagem` VARCHAR(255),
    PRIMARY KEY (`id`),
    FOREIGN KEY (`categoria_id`) REFERENCES `categoria`(`id`),
    FOREIGN KEY (`empresa_id`) REFERENCES `empresa`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `candidatura` (
    `id_candidato` INT NOT NULL,
    `id_vaga` INT NOT NULL,
    `data_candidatura` DATETIME NOT NULL,
    PRIMARY KEY (`id_candidato`, `id_vaga`),
    FOREIGN KEY (`id_candidato`) REFERENCES `usuario`(`id`),
    FOREIGN KEY (`id_vaga`) REFERENCES `vaga`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;