![fitjournal](https://user-images.githubusercontent.com/38664109/39455394-c3a494cc-4ca5-11e8-853c-3d716d69ad46.png)

## Team Members
Jason Sippy & Chris King (not in class)

## Fit Journal Description
Fit Journal is a database application that allows the user to log their workouts so they can track their progress. The user can CREATE, READ, UPDATE, and DELETE entries to keep an accurate representation of their workouts. As the workouts are logged into the database, they can be compared to previous workouts for future workout plannning. Here a person will be able to track their progress among the following exercises: Biking, Running, Swimming and Uncategorized (Uncategorized obviously is anything outside the other three and can be specified in the notes column of the Logbook).   

Fit Journal serves as a commitment to better yourself. By going through the motions without a plan or a place to document your work, a person can run into a plateau because they haven't payed attention to their journey and their progress slows down. However, if you monitor your progress, you can make the necessary adjustments to stay ahead of your pervious self and keep moving forward. Not only does progress tracking benefit you as you move toward your goal, but also when you look back at it; you can see how far you've come.

After all, who is your biggest competitor if not yourself?

## Fit Journal Schema
Creating a database in Boyce-Codd Normal Form (BCNF) deals with eliminates anomalies that may be dependent on other columns of a table. By creating multiple tables, updating and deleting can occur without having to affect the other tables/portions of the database.
#### Persons
|ID|NAME|Age|Weight (lb)|Entry Date|
|--|----|---|-----------|----------|
|1 |John|29 |230        |2018-05-04|
|2 |Jane|27 |129        |2018-05-04|
#### Exercises
|Code|Exercise Type|
|----|-------------|
|BKE |Bike         |
|RUN |Run          |
|SWM |Swim         |
|UNCATEGORIZED|Uncategorized|
#### Logbook
|ID|Code|Duration (min)|Distance (mi)|Effort (%)|Notes|
|--|----|--------------|-------------|----------|-----|
|1 |BKE |62            |8            |80        |MKT Trail, Hot|
|2 |UNCATEGORIZED |45            |-            |75        |Mizzou Rec, Yoga|

## Entity Relationship Diagram
![entity relationship diagram](https://user-images.githubusercontent.com/38664109/39652457-3c1c6b04-4fb3-11e8-92c4-3f5935fdd5ee.PNG)
With a relationship between the three tables, a persons ID can be linked to the exercise code and the exercise the code is attached to.

## C.R.U.D. Locations
CREATE -  
READ -  
UPDATE -  
DELETE -

## Video Demonstration
