DATABASE USE `mydatabase`


CREATE TABLE `myList` (
id int(11) PRIMARY KEY AUTO_INCREMENT,
title varchar(55) NOT NULL,
description varchar(55) NOT NULL,
created_at timestamp DEFAULT CURRENT_DATE
);