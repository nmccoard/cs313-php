
-- A few helpful commands you might want during the process:
-- \dt - Lists the tables
-- \d+ public.user - Shows the details of the user table
-- DROP TABLE public.user - Removes the user table completely so we can re-create it
-- \q - Quit the application and go back to the regular command prompt

-- clean up

DROP TABLE  IF EXISTS course_record;
DROP TABLE IF EXISTS equipment;​
DROP TABLE IF EXISTS student;
DROP TABLE IF EXISTS course;
DROP TABLE IF EXISTS location;
​
-- setup tables
CREATE TABLE location(
    id SERIAL PRIMARY KEY,
    state VARCHAR(4) NOT NULL
);

CREATE TABLE course (
    id SERIAL PRIMARY KEY,
    description VARCHAR(128) NOT NULL,
    delivery_type VARCHAR(32) NOT NULL,
    equipment_type VARCHAR(64) NOT NULL
);

CREATE TABLE student (
    id SERIAL PRIMARY KEY,
    employee_number INT NOT NULL UNIQUE,
    first_name VARCHAR(64) NOT NULL,
    last_name VARCHAR(64) NOT NULL,
    student_location int NOT NULL REFERENCES location(id)
);

CREATE TABLE course_record (
    id SERIAL PRIMARY KEY,
    course_code VARCHAR(32) NOT NULL UNIQUE,
    course_id int NOT NULL REFERENCES course(id),
    student_id int NOT NULL REFERENCES student(id),
    course_end_date DATE NOT NULL
);

CREATE TABLE equipment(
    id SERIAL PRIMARY KEY,
    sn VARCHAR(32) NOT NULL UNIQUE,
    type int NOT NULL REFERENCES course(id),
    model VARCHAR(64) NOT NULL,
    location int NOT NULL REFERENCES location(id)
);


-- initial values

