CREATE OR REPLACE TABLE TYPE_OF_PUBLICATION(
	ID 			INT NOT NULL AUTO_INCREMENT,
	VALUE		VARCHAR(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
	PRIMARY KEY(ID)
) ENGINE = INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;