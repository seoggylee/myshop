drop table tbl_order;

CREATE TABLE `tbl_order` (
	`idx` INT(11) NOT NULL AUTO_INCREMENT,
	`user_idx` INT(11) NOT NULL,
	`addr` VARCHAR(100) NOT NULL DEFAULT '0' COLLATE 'utf8mb3_general_ci',
	`total_price` INT(11) NOT NULL DEFAULT '0',
	`order_date` DATETIME NOT NULL DEFAULT current_timestamp(),
	INDEX `tbl_order_idx001` (`idx`) USING BTREE
)
COLLATE='utf8mb3_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=30000000
;
