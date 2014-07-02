## PHP basics exercise

The objective of this exercise is to get you acclimated to the basics of PHP and to touch on a sample implementation. 

### Calculating a class's quiz average

Assume that you are the head instructor of a class, namely CS15 :) For a sample size of X students in your class, you would like to calculate the average of the last quiz taken by your students. 

Create a miniature web application that does the following:
- Calculates the class average provided a csv file, where the csv file just has 2 values per line: Name of student and grade (out of 100). The CSV file need not have the column names included. Also, take care to remove any leading and trailing white space from your CSV file. You are welcome to use the **grades.csv** (included in code/) file uploaded to this Github repository
- Calculates the class average provided a sample size of students given by the user, and a random grade value for each conceptual student that lies between 45 and 100
(hint: Create a constant that determines whether the app will generate the average from a CSV file or randomly)
- Outputs the number of students to page
- Outputs the class average to page. If the average is below 70, the average should be colored in red - else, it is colored in blue
- Passes the class average to another page using the GET method
- Passes the class average to another page using the $_SESSION variable

Requirements:
- Use constants where applicable
- Use functions where applicable
- Separate constants and functions into own files, then have them included in index.php
- Ensure that your main page validates with [w3c's validator](http://validator.w3.org/)


