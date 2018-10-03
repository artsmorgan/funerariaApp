ALTER TABLE `funerariadb_remote`.`bk_transaccion` 
ADD COLUMN `mes_cobro` VARCHAR(45) NULL AFTER `saldo_anterior`,
ADD COLUMN `anno_corbo` VARCHAR(45) NULL AFTER `mes_cobro`;
