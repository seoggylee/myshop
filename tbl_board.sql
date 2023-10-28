drop table tbl_board;
;

CREATE TABLE `tbl_board` (
	`idx` INT(11) NOT NULL AUTO_INCREMENT,
	`board_title` VARCHAR(100) NOT NULL COLLATE 'utf8mb3_general_ci',
	`board_contents` TEXT NOT NULL COLLATE 'utf8mb3_general_ci',
	`admin_idx` INT(11) NOT NULL,
	INDEX `tbl_board_idx001` (`idx`) USING BTREE
)
COLLATE='utf8mb3_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=90000000
;