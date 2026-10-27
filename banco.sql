CREATE DATABASE IF NOT EXISTS site_jogos
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE site_jogos;

CREATE TABLE IF NOT EXISTS usuarios (
  id        INT UNSIGNED NOT NULL AUTO_INCREMENT,
  nome      VARCHAR(100) NOT NULL,
  email     VARCHAR(150) NOT NULL,
  curso     ENUM('dds','enf','agro','adm') NOT NULL,
  ano       TINYINT UNSIGNED NOT NULL,
  senha     VARCHAR(255) NOT NULL, 
  criado_em TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE KEY uq_usuarios_email (email),
  CONSTRAINT ck_usuarios_ano CHECK (ano BETWEEN 1 AND 3)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
