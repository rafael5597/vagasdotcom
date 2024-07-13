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
	`nome` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`empresa_id`) REFERENCES `empresas`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `vaga` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `titulo` VARCHAR(255) NOT NULL,
    `descricao` TEXT NOT NULL,
    `cargo` VARCHAR(255) NOT NULL,
    `modalidade` VARCHAR(255) NOT NULL,
    `localizacao` VARCHAR(255) NOT NULL,
    `empresa_id` INT NOT NULL,
    `data_pulicacao` DATETIME NOT NULL,
    `ativo` BOOLEAN NOT NULL DEFAULT 1,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`empresa_id`) REFERENCES `empresas`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
