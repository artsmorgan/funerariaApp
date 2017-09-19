CREATE TABLE `funerariadb`.`bk_vendedores` (
  `id_vendedor` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `apellido1` VARCHAR(45) NULL,
  `apellido2` VARCHAR(45) NULL,
  `fecha_inicio` DATE NULL,
  `created_on` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` INT NULL,
  PRIMARY KEY (`id_vendedor`),
  UNIQUE INDEX `id_vendedor_UNIQUE` (`id_vendedor` ASC));
