CREATE TABLE  IF NOT EXISTS articles (
    id INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name varchar (255) not null,
    body text
) ENGINE=InnoDB;

INSERT INTO articles (name, body) VALUES ('Hello', 'Hello world long long page...');
INSERT INTO articles (name, body) VALUES ('World', 'World hello extra long long page...');