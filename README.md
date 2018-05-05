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

## C.R.U.D. Locations & Explanations
**CREATE -**  The three tables were created by sql code in the file **CreateDatabase.sql**. They were then uploaded to infinity free so data  entries could be made from the website that was created (fitjournal.epizy.com/FJ/...). Inserts were made in the **add_persons.php and add_logbook.php specifically line 31** where the sql statement was used.
**READ -**  Unfortunately the only reading that could be done each individual table where **persons.php, exercises.php, and logbook.php** would display the data that was preloaded and inserted from **the sql statement at line 16.** The plan for reading from multiple tables was to add another view in the **persons url as well as the logbook url** where columns could be selected and viewed together with the sql inner join statement. 
**UPDATE -** The update function was making the website crash when trying to update or insert so this was taken out. The plan was to click an update button from the corresponding row and update any data points that needed to be updated. It was intended to go into the **add_persons.php and add_logbook.php files at line 31** with the following code:
$id = $_POST['id'] ? $_POST['id'] : redirect("persons.php");
$result = mysql_query($sql);
if(if ($result == $url_id){
  $sql = "UPDATE persons SET name='$name', age='$age', weight='$weight' WHERE id=$id;"
  $result = $mysqli->query($sql);
  ...
}
else{
  $sql = "INSERT INTO logbook (id, code, duration, distance, effort, notes) VALUES ('$id', '$code', '$duration', '$distance', '$effort', '$notes')";
  $result = $mysqli->query($sql);
  ...
 }_ 
**DELETE -** Delete was created in the **edit_person.php and edit_logbook.php files at line 17**. The purpose of this was to delete any entries that no longer needed to be in the database.

## Video Demonstration
