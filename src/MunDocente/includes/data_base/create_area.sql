CREATE OR REPLACE TABLE AREA(
	ID			INT NOT NULL AUTO_INCREMENT,
	NAME		VARCHAR(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
	DESCRIPTION	VARCHAR(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
	PARENT		INT,
	PRIMARY KEY(ID),
	FOREIGN KEY(PARENT) REFERENCES AREA(ID)
) ENGINE = INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;