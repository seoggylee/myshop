drop table tbl_company;

CREATE TABLE `tbl_company` (
	`idx` INT(11) NOT NULL AUTO_INCREMENT,
	`company_name` VARCHAR(100) NOT NULL COLLATE 'utf8mb3_general_ci',
	`tel` VARCHAR(100) NULL DEFAULT NULL COLLATE 'utf8mb3_general_ci',
	`addr` VARCHAR(100) NULL DEFAULT NULL COLLATE 'utf8mb3_general_ci',
	`damdang` VARCHAR(100) NULL DEFAULT NULL COLLATE 'utf8mb3_general_ci',
	INDEX `tbl_company_idx_001` (`IDX`) USING BTREE
)
COLLATE='utf8mb3_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=50000000
;

INSERT INTO tbl_company (company_name, tel, addr, damdang) values ('공급사01', '031-333-3333', '경기도 수원시 영통구', '홍길동1');
INSERT INTO tbl_company (company_name, tel, addr, damdang) values ('공급사02', '031-444-3333', '경기도 수원시 영통구', '홍길동2');
INSERT INTO tbl_company (company_name, tel, addr, damdang) values ('공급사03', '031-555-3333', '경기도 수원시 영통구', '홍길동3');
INSERT INTO tbl_company (company_name, tel, addr, damdang) values ('공급사04', '031-666-3333', '경기도 수원시 영통구', '홍길동4');
INSERT INTO tbl_company (company_name, tel, addr, damdang) values ('공급사05', '031-777-3333', '경기도 수원시 영통구', '홍길동5');
INSERT INTO tbl_company (company_name, tel, addr, damdang) values ('공급사06', '031-888-3333', '경기도 수원시 영통구', '홍길동6');


SELECT * FROM tbl_company;