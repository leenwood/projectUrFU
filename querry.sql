CREATE TABLE  IF NOT EXISTS users (
    id INT (7) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    surname varchar (255) not null,
    username varchar (255) not null,
    secondname varchar (255) not null,
    curRank int (6) not null,
    root int (6) not null,
    password varchar (255) not null,
    salt varchar (255) not null,
    joinDate date not null,
    dateBirth date not null,
    club varchar (255) not null,
    avatars varchar (255) not null,
    rank varchar (255) not null
    ) ENGINE=InnoDB;

CREATE TABLE  IF NOT EXISTS ranks (
    rankId INT (27) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id int (7),
    dateTake date not null,
    urlImg varchar(255) not null,
    nameRank int(6) not null
    ) ENGINE=InnoDB;

CREATE TABLE  IF NOT EXISTS payments (
    payId INT (27) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id int (7),
    yearPay date not null,
    datePay date not null,
    sumPay varchar(255) not null
    ) ENGINE=InnoDB;

CREATE TABLE  IF NOT EXISTS seminars (
    semId INT (27) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id int (7),
    dateSem date not null,
    region int(6) not null,
    examiner varchar(255) not null,
    examDate date not null,
    trainer varchar(255) not null
    ) ENGINE=InnoDB;

ALTER TABLE ranks add CONSTRAINT FK_ranks_users
    FOREIGN KEY ranks(id)
    REFERENCES users(id);

ALTER TABLE payments add CONSTRAINT FK_payments_users
    FOREIGN KEY payments(id)
    REFERENCES users(id);

ALTER TABLE seminars add CONSTRAINT FK_seminars_users
    FOREIGN KEY seminars(id)
    REFERENCES users(id);


INSERT INTO `users` (`id`, `surname`, `username`, `secondname`, `curRank`, `root`, `password`, `salt`, `joinDate`, `dateBirth`, `club`, `avatars`, `rank`) VALUES (NULL, 'George', 'Ershov', 'Dmitrievich', '1', '2', '123', 'salt',  '1970-01-01', '2001-05-05', 'cyberpunk', 'none', 'Мастер');
INSERT INTO `ranks` (`rankId`, `id`, `dateTake`, `urlImg`, `nameRank`) VALUES (NULL, '1', '2021-12-25', 'none', '1');
INSERT INTO `payments` (`payId`, `id`, `yearPay`, `datePay`, `sumPay`) VALUES (NULL, '1', '2017-01-01', '2021-12-27', '1000');
