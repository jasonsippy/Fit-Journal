CREATE TABLE persons (
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name varchar(50) NOT NULL,
    age int,
    weight int,
    entryDate date
);

CREATE TABLE exercises (
    code char(3) NOT NULL,
    exerciseType varchar(50)
);

CREATE TABLE logbook (
    id int NOT NULL,
    code enum('BKE', 'RUN', 'SWM', 'UNCATEGORIZED') NOT NULL,
    duration int,
    distance int,
    notes varchar(250) 
);
