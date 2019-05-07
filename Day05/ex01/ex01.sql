	CREATE TABLE IF NOT EXISTS ft_table (
	id INT NOT NULL AUTO_INCREMENT NOT NULL,
	login varchar(8) NOT NULL DEFAULT 'toto',
	`group` ENUM('staff','student','other') NOT NULL,
	creation_date DATE NOT NULL,
	PRIMARY KEY (id)
	);
	/* describe ft_table; */