drop table tbl_user;

CREATE TABLE `tbl_user` (
	`idx` INT(11) NOT NULL AUTO_INCREMENT,
	`user_id` VARCHAR(50) NOT NULL COLLATE 'utf8mb3_general_ci',
	`passwd` VARCHAR(100) NOT NULL COLLATE 'utf8mb3_general_ci',
	`name` VARCHAR(50) NOT NULL COLLATE 'utf8mb3_general_ci',
	`birth` INT(11) NULL DEFAULT NULL,
	`addr` VARCHAR(100) NOT NULL COLLATE 'utf8mb3_general_ci',
	`tel` VARCHAR(50) NOT NULL COLLATE 'utf8mb3_general_ci',
	`grade` INT(11) NOT NULL DEFAULT '0',
	`point` INT(11) NULL DEFAULT '0',
	INDEX `tbl_user_idx01` (`idx`) USING BTREE
)
COLLATE='utf8mb3_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=20000000
;
CREATE UNIQUE INDEX `tbl_user_idx_001` ON `tbl_user` (`user_id`); 

insert into tbl_user (user_id, passwd, name, birth, tel) 
values ('imharoc@gmail.com', '12345678', '이윤석', '19690705', '010-4901-1790');


SELECT * FROM tbl_user;