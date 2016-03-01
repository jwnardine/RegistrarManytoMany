<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Student.php";
    require_once "src/Course.php";

    $server = 'mysql:host=localhost;dbname=registrar_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StudentTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
            Student::deleteAll();
            Course::deleteAll();
        }

				function test_getId()
        {
            //Arrange
            $course_name = "Economics";
            $id = null;
						$course_num = 101;
            $test_course = new Course($id, $course_name, $course_num);
            $test_course->save();

            $name = "Mike Brivel";
            $add_date = "2016-03-29";
            $test_student = new Student($id, $name, $add_date);
            $test_student->save();

            //Act
            $result = $test_student->getId();

            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

				function test_getAll()
        {
            //Arrange
						$course_name = "Economics";
            $id = null;
						$course_num = 101;
            $test_course = new Course($id, $course_name, $course_num);
            $test_course->save();

						$name = "Bill";
						$id2 = null;
            $add_date = "2016-04-29";
            $test_student = new Student($id2, $name, $add_date);
            $test_student->save();

						$name2 = "Mike Brivel";
						$id3 = null;
            $add_date2 = "2016-03-29";
            $test_student2 = new Student($id3, $name2, $add_date2);
            $test_student2->save();
            //Act
            $result = Student::getAll();

            //Assert
            $this->assertEquals([$test_student, $test_student2], $result);
        }

				function test_save()
        {
            //Arrange
						$course_name = "Economics";
            $id = null;
						$course_num = 101;
            $test_course = new Course($id, $course_name, $course_num);
            $test_course->save();

						$name = "Mike Brivel";
						$id2 = null;
            $add_date = "2016-03-29";
            $test_student = new Student($id2, $name, $add_date);
            $test_student->save();

            //Act
            $test_student->save();

            //Assert
            $result = Student::getAll();
            $this->assertEquals($test_student, $result[0]);
        }

				function test_deleteAll()
        {
            //Arrange
						$course_name = "Economics";
            $id = null;
						$course_num = 101;
            $test_course = new Course($id, $course_name, $course_num);
            $test_course->save();

						$name = "Bill";
						$id2 = null;
            $add_date = "2016-04-29";
            $test_student = new Student($id2, $name, $add_date);
            $test_student->save();

						$name2 = "Mike Brivel";
						$id3 = null;
            $add_date2 = "2016-03-29";
            $test_student2 = new Student($id3, $name2, $add_date2);
            $test_student2->save();

            //Act
            Student::deleteAll();
						$result = Student::getAll();

						//Assert
						$this->assertEquals([], $result);
        }

				function test_find()
        {
            //Arrange
						$course_name = "Economics";
            $id = null;
						$course_num = 101;
            $test_course = new Course($id, $course_name, $course_num);
            $test_course->save();

						$name = "Bill";
						$id2 = null;
            $add_date = "2016-04-29";
            $test_student = new Student($id2, $name, $add_date);
            $test_student->save();

						$name2 = "Mike Brivel";
						$id3 = null;
            $add_date2 = "2016-03-29";
            $test_student2 = new Student($id3, $name2, $add_date2);
            $test_student2->save();

            //Act
            $result = Student::find($test_task->getId());

            //Assert
            $this->assertEquals($test_task, $result);
        }


    }
?>
