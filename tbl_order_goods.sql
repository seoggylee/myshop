drop table tbl_order_goods;

CREATE TABLE `tbl_order_goods` (
	`idx` INT(11) NOT NULL AUTO_INCREMENT,
	`goods_idx` INT(11) NOT NULL DEFAULT '0',
	`order_idx` INT(11) NOT NULL DEFAULT '0',
	`amount` INT(11) NOT NULL DEFAULT '0',
	`order_price` INT(11) NOT NULL DEFAULT '0',
	INDEX `tbl_order_goods_idx_001` (`idx`) USING BTREE
)
COLLATE='utf8mb3_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=40000000
;
