-- Insert 20 students into the 'student' table
INSERT INTO student (USN, first_name, middle_name, last_name, phone_number, dept_id)
SELECT
    CONCAT('USN', LPAD(id, 3, '0')),
    CONCAT('Student', id),
    'Middle',
    'Last',
    123456 + id,
    1 -- Assuming a single department for simplicity
FROM
    (SELECT (ROW_NUMBER() OVER ()) AS id FROM information_schema.tables LIMIT 40) AS student_ids;

-- Insert 5 classrooms with a capacity of 5 seats each into the 'classroom' table
INSERT INTO classroom (class_num, capacity) VALUES
    (101, 5),
    (102, 5),
    (103, 5),
    (104, 5),
    (105, 5);

-- Insert 5 courses into the 'course' table
INSERT INTO course (course_id, course_title) VALUES
    ('CSE101', 'Computer Science'),
    ('MAT101', 'Mathematics'),
    ('PHY101', 'Physics'),
    ('CHEM101', 'Chemistry'),
    ('ENG101', 'English');

-- Insert 1 elective course into the 'elective_course' table
INSERT INTO elective_course (ecourse_id, ecourse_title) VALUES
    ('ELEC1', 'Elective 1');

-- Insert 6 exams into the 'exam' table
INSERT INTO exam (course_id, course_title, date, start_time, end_time)
SELECT
    course_id,
    course_title,
    NOW() + INTERVAL FLOOR(RAND() * 30) DAY,
    '10:00:00',
    '11:00:00'
FROM
    course
LIMIT 5; -- Assuming one exam for each subject and one for the elective

-- Insert 5 instructors into the 'instructor' table, assigning them to classrooms
INSERT INTO instructor (empid, first_name, middle_name, last_name, phone_number, course_id, dept_id, class_num)
SELECT
    CONCAT('EMP', LPAD(id, 3, '0')),
    CONCAT('Instructor', id),
    'Middle',
    'Last',
    98765 + id,
    CASE
        WHEN id % 2 = 0 THEN 'CSE101'
        ELSE 'MAT101'
    END,
    1, -- Assuming a single department for simplicity
    FLOOR(RAND() * 5) + 101
FROM
    (SELECT (ROW_NUMBER() OVER ()) AS id FROM information_schema.tables LIMIT 5) AS instructor_ids;

-- Insert enrollment information into the 'stu_enroll' table for each student
INSERT INTO stu_enroll (USN, course_id)
SELECT
    s.USN,
    c.course_id
FROM
    student s
CROSS JOIN
    course c;
