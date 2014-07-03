<?php
	// let's have access to the session variables
	session_start();
	
	// bring in our constants which we've defined in another file
	require("constants.php");
	
	// bring in our functions which we've defined in another file
	require("functions.php");
?>
<!DOCTYPE html>
<html>
<head>
		<title>CS15 - Summer 2014 - Week 2 exercise</title>
</head>    
<body>
		<form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
			Number of students: <input type="text" name="no_of_students"><br />
			<input type="submit" />
		</form><br /><br />
		<?php
			// create a placeholder for students' grades
			$grades = array();
								
			if(METHOD == CSV) {
				// get average from csv file grades
				$average = getCSVGradesAverage(CSV_LOCATION);
			} elseif (METHOD == RANDOM) {
				// get average from random grades generator
				$average = getRandomGradesAverage($grades,NO_OF_STUDENTS,MIN_GRADE,GRADE_SCALE);
			}
			
			echo "The number of students is " . NO_OF_STUDENTS . "<br />";
			
			// apply conditional styling. in an actual app, you would have anything html 
			// stored in the view. mixing the logic and the view in one page is generally
			// not a good practice but we are doing this here for demonstrative purposes. 
			$style_pass= "<span style='color:blue'>" . $average . "</span>";
			$style_fail= "<span style='color:red'>" . $average . "</span>";
			
			// if the class average is higher than the passing grade threshold
			if($average >PASS_THRESHOLD) {
				echo "The class average is " . $style_pass;
			} else {
				echo "The class average is " . $style_fail;
			}

			// store the average in the session variable
			$_SESSION["class_average"] = $average;

		?>
		<br /><br />
		<a href="session.php">Go to page that shows how session variables are accessible from another page</a><br />
		<a href="get.php?class_average=<?php echo $average; ?>">Go to page that shows how variables are passed by query string</a>
</body>
</html>