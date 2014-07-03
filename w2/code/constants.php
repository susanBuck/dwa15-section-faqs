<?php
	// define our constants.
	// override number of students if supplied by user
	if($_POST["no_of_students"]) {
		define(NO_OF_STUDENTS,$_POST["no_of_students"]);		
	} else {
		define(NO_OF_STUDENTS,20);
	}
	// the max grade out of which the grade is calculated
	define(GRADE_SCALE,100);
	// the minimum grade that we should use for our abstract students with random grades
	// this value is arbitrary
	define(MIN_GRADE,45);
	// the path of the csv file
	define(CSV_LOCATION, "grades.csv");
	// by creating these names we make our code more readable
	define(RANDOM,0);
	define(CSV,1);
	// this determines whether our file will use the random method of generating grades
	// or, that of the csv file 
	define(METHOD,0);
	// determines the limit which determines whether the average will appear in blue or red
	define(PASS_THRESHOLD,70);
?>