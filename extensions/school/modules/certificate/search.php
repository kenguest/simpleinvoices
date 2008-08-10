<?php
/*
* Script: manage.php
* 	Manage Invoices page
*
* Authors:
*	 Justin Kelly, Nicolas Ruflin, Ap.Muthu
*
* Last edited:
* 	 2008-01-03
*
* License:
*	 GPL v2 or above
*
* Website:
* 	http://www.simpleinvoices.org
 */

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

$pageActive = "certificate";
/*
$smarty -> assign('pageActive', $pageActive);


$sql_start = "select * from ".TB_PREFIX."customers where person_type = 1"; 
$students = sql2array($sql_start);
$smarty -> assign('students', $students);

$sql_start = "select * from ".TB_PREFIX."biller"; 
$billers = sql2array($sql_start);
$smarty -> assign('billers', $billers);
*/

$smarty -> assign('id', $_POST['id']);
$smarty -> assign('student_id', $_POST['student_id']);
$smarty -> assign('course_id', $_POST['course_id']);

$student = school_invoice::getActiveCustomers();
$smarty -> assign('student',$student);

$course = school_product::getCourses();
$smarty -> assign('course',$course);

?>
