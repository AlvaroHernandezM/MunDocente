CREATE OR REPLACE TABLE PUBLICATION(
	ID							INT NOT NULL AUTO_INCREMENT,
	NAME						VARCHAR(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
	DATE_PUBLICATION			DATE NOT NULL,
	TYPE						INT NOT NULL,
	PLACE						INT,
	URL							VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
	START_DATE					DATE NOT NULL,
	END_DATE 					DATE,
	CATEGORY					INT,
	POSITION					VARCHAR(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
	DESCRIPTION					VARCHAR(330) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
	CONTACT						VARCHAR(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
	USERNAME					VARCHAR(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
	PRIMARY KEY(ID),
	FOREIGN KEY(TYPE) REFERENCES TYPE_OF_PUBLICATION(ID),
	FOREIGN KEY(USERNAME) REFERENCES USER(USERNAME),
	FOREIGN KEY(CATEGORY) REFERENCES TYPE_OF_SCIENTIFIC_MAGAZINE(ID),
	FOREIGN KEY(PLACE) REFERENCES PLACE(ID)
) ENGINE = INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;