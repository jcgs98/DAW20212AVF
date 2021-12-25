CREATE TABLE `3dawnoite`.`fiscais` (
  `id` VARCHAR(13)  NOT NULL, 
  `cpf` VARCHAR(13) NOT NULL, 
  `nome` VARCHAR(50) NOT NULL,   
  `sala` INT (2) NOT NULL,
  PRIMARY KEY (`id`, `cpf`)
) ENGINE = InnoDB;