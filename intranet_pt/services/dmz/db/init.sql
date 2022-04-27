USE usersdb;

DROP TABLE IF EXISTS Users;

CREATE TABLE Users(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(50) NOT NULL,
	password VARCHAR(50) NOT NULL
);

INSERT INTO Users (username, password) VALUES ('guest', 'guest');
INSERT INTO Users (username, password) VALUES ('admin', '8k13@1laOHga');
INSERT INTO Users (username, password) VALUES ('macaca', 'mhub');


DROP TABLE IF EXISTS Flag;

CREATE TABLE Flag(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    flag VARCHAR(100) NOT NULL
);

INSERT INTO Flag (flag) VALUES ('MacacaHub{db-secret-2553a38af63eb376ba770668e81045dc}');
