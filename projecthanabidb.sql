CREATE DATABASE projecthanabidb;

USE projecthanabidb;

CREATE TABLE hanabiUser(
	userId INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	userName VARCHAR(35),
	userSurname VARCHAR(35),
	userUsername VARCHAR(20),
	userEmail VARCHAR(50),
	userPassword VARCHAR(20),
	userCountry VARCHAR(2),
	userGender VARCHAR(6),
	userPhone VARCHAR(11),
	userCellphone VARCHAR(11),
	userBio VARCHAR(150),
	userPhoto LONGBLOB,
	userBackground LONGBLOB,
	userUpdatetime DATETIME,
	userRegistertime DATETIME
);

CREATE TABLE hanabiSettings(
	settingsColor1 VARCHAR(7) DEFAULT '#8900B3',
	settingsColor2 VARCHAR(7) DEFAULT '#C91AFF',
	settingsColor3 VARCHAR(7) DEFAULT '#57006D',
	settingsColor4 VARCHAR(7) DEFAULT '#270033',
	settingsColor5 VARCHAR(7) DEFAULT '#C932FF',
	settingsColor6 VARCHAR(7) DEFAULT '#1E1E1E',
	settingsColor7 VARCHAR(7) DEFAULT '#8900B3',
	settingsColor8 VARCHAR(7) DEFAULT '#FFFFFF',
	settingsSrcOptions VARCHAR(255),
	settingsSeeOptions VARCHAR(255),
	settingsUpdatetime DATETIME,
	userId INT UNIQUE NOT NULL,
    FOREIGN KEY (userId) REFERENCES hanabiUser(userId)
);

CREATE TABLE hanabiComments(
	commentsId INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	commentsPage VARCHAR(15),
	commentsComment VARCHAR(200),
	commentData DATETIME,
	userId INT,
    FOREIGN KEY (userId) REFERENCES hanabiUser(userId)
);