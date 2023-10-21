drop table tbl_goods;

CREATE TABLE `tbl_goods` (
	`IDX` INT(11) NOT NULL AUTO_INCREMENT,
	`NAME` VARCHAR(100) NOT NULL,
    `THUMBNAIL` VARCHAR(100) NOT NULL,
	`quantity` INT(11) NOT NULL DEFAULT '0',
	`PRICE` INT(11) NOT NULL DEFAULT '0',
	`company_idx` INT(11) NOT NULL DEFAULT '0',
	INDEX `tbl_goods_idx1` (`IDX`) USING BTREE
)
ENGINE=InnoDB
AUTO_INCREMENT=10000000
;


INSERT INTO tbl_goods (NAME, THUMBNAIL, quantity, price, company_idx) VALUES ('[16brix이상] 중화농협 샤인머스켓 포도 1.5kg(2~3송이)', 'prod_003.jpg', 100, 29000, 50000000);
INSERT INTO tbl_goods (NAME, THUMBNAIL, quantity, price, company_idx) VALUES ('농협양곡 무안 칠산바다 간척지쌀 20kg, 2022년산', 'prod_001.jpg', 100, 54500, 50000001);
INSERT INTO tbl_goods (NAME, THUMBNAIL, quantity, price, company_idx) VALUES ('(23년 햅쌀) 영광군농협 사랑담은 상사화(조명1호) 10kg, 2023년산', 'prod_002.jpg', 100, 34800, 50000002);
INSERT INTO tbl_goods (NAME, THUMBNAIL, quantity, price, company_idx) VALUES ('동송농협 직송 23년 햅쌀 철원오대쌀10kg 당일도정', 'prod_004.jpg', 100, 42900, 50000003);
INSERT INTO tbl_goods (NAME, THUMBNAIL, quantity, price, company_idx) VALUES ('[강원 철원] [햅쌀] 두루웰 철원오대쌀 4kg, 2023년산', 'prod_005.jpg', 100, 19900, 50000004);
INSERT INTO tbl_goods (NAME, THUMBNAIL, quantity, price, company_idx) VALUES ('(23년 햅쌀) 서안성농협 한토래 경기미 고시히카리 10kg, 2023년산', 'prod_006.jpg', 100, 37500, 50000005);
INSERT INTO tbl_goods (NAME, THUMBNAIL, quantity, price, company_idx) VALUES ('[강원 철원] [햅쌀] 두루웰 철원오대쌀 20kg, 2023년산', 'prod_007.jpg', 100, 77900, 50000000);
INSERT INTO tbl_goods (NAME, THUMBNAIL, quantity, price, company_idx) VALUES ('[햅쌀] 흥양농협 고흥 해맞이쌀(조명) 10kg,2023년산', 'prod_008.jpg', 100, 34000, 50000001);
INSERT INTO tbl_goods (NAME, THUMBNAIL, quantity, price, company_idx) VALUES ('[익산원예농협] 샤인품은 과일 혼합세트 4.5kg 내외 (샤인2수+사과3과+배3과)', 'prod_009.jpg', 100, 54900, 50000002);
INSERT INTO tbl_goods (NAME, THUMBNAIL, quantity, price, company_idx) VALUES ('제주농협 황금향 선물세트 4.5kg로얄과(18-23입)', 'prod_010.jpg', 100, 46500, 50000003);
INSERT INTO tbl_goods (NAME, THUMBNAIL, quantity, price, company_idx) VALUES ('[농할20%][신북농협] GAP인증 23년 햇신고배 가정용 5kg', 'prod_011.jpg', 100, 15900, 50000004);
INSERT INTO tbl_goods (NAME, THUMBNAIL, quantity, price, company_idx) VALUES ('[익산원예농협] 한아름드린 사과·배 혼합 선물세트 4kg/6kg 내외', 'prod_012.jpg', 100, 42900, 50000005);
INSERT INTO tbl_goods (NAME, THUMBNAIL, quantity, price, company_idx) VALUES ('[당도13brix이상] 부여 굿뜨래 멜론 8kg (3,4,5,6수)', 'prod_013.jpg', 100, 34100, 50000000);
select * from tbl_goods;

