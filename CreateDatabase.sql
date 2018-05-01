CREATE TABLE Persons(
    ID int NOT NULL,
    Name varchar(50) NOT NULL,
    Age int NOT NULL,
    BodyWeight int NOT NULL,
    EntryDate date NOT NULL
);

CREATE TABLE Exercises(
    Code char(3) NOT NULL,
    ExerciseType varchar(50) NOT NULL
);

CREATE TABLE Logbook(
    ID int NOT NULL,
    Code char(3) NOT NULL,
    Duration_(min) int NOT NULL,
    Effort_(%) int NOT NULL,
    Location varchar(100) NOT NULL DEFAULT ' '
);
