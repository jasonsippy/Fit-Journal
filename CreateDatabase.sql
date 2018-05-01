CREATE TABLE Persons(
    ID int NOT NULL,
    Name varchar(50) NOT NULL,
    Age int NOT NULL,
    BodyWeight int NOT NULL,
    `Entry Date` date NOT NULL
);

CREATE TABLE Exercises(
    Code char(3) NOT NULL,
    `Exercise Type` varchar(50) NOT NULL
);

CREATE TABLE Logbook(
    ID int NOT NULL,
    Code char(3) NOT NULL,
    `Duration (min)` int NOT NULL,
    `Effort (%)` int NOT NULL,
    Location varchar(100) NOT NULL DEFAULT ' '
);
