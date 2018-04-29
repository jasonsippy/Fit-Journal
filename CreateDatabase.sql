#FIT JOURNAL

DROP TABLE if EXISTS 'Persons';
CREATE TABLE 'Persons'(
    'Name' varchar (50) NOT NULL,
    'Age' int(3) NOT NULL,
    'Bodyweight' int(3) NOT NULL,
    'Date' date() NOT NULL,
    'Body Group' varchar(50) NOT NULL
);
