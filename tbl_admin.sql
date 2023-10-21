drop table tbl_admin;


CREATE TABLE `tbl_admin` (
	`idx` INT(11) NOT NULL AUTO_INCREMENT,
	`user_id` VARCHAR(50) NOT NULL COLLATE 'utf8mb3_general_ci',
	`passwd` VARCHAR(100) NOT NULL COLLATE 'utf8mb3_general_ci',
	`name` VARCHAR(50) NOT NULL COLLATE 'utf8mb3_general_ci',
	INDEX `tbl_admin_idx_001` (`idx`) USING BTREE
)
COLLATE='utf8mb3_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=90000000
;

insert into tbl_admin (user_id, passwd, name) values ('admin@gmail.com', 'aaaa', '관리자');