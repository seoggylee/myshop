drop table tbl_jjim;

CREATE TABLE `tbl_jjim` (
	`idx` INT(11) NOT NULL AUTO_INCREMENT,
	`user_idx` INT(11) NOT NULL DEFAULT '0',
	`goods_idx` INT(11) NOT NULL DEFAULT '0',
	`jjim_date` DATETIME NOT NULL DEFAULT current_timestamp(),
	PRIMARY KEY (`user_idx`, `goods_idx`) USING BTREE,
	INDEX `tbl_jjim_idx_001` (`idx`) USING BTREE
)
COLLATE='utf8mb3_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=60000000