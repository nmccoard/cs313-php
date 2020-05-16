
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
    equipment_type VARCHAR(64) NOT NULL,
    delivery_type VARCHAR(32) NOT NULL,
    description VARCHAR(128) NOT NULL
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

INSERT INTO location (state) VALUES ('UT');
INSERT INTO location (state) VALUES ('OH');
INSERT INTO location (state) VALUES ('CA');
INSERT INTO location (state) VALUES ('AZ');
INSERT INTO location (state) VALUES ('ID');
INSERT INTO location (state) VALUES ('TX');

INSERT INTO course (description, delivery_type, equipment_type) VALUES ('10 day Steam Sterilizer course covering Eagle 3000 to AMSCO 600','Instructor Lead','Steam Sterilizer');
INSERT INTO course (description, delivery_type, equipment_type) VALUES ('3 Online modules combined with 3 days of ILT covering the entire VPro Series of Sterilizers','Blended','VPro');
INSERT INTO course (description, delivery_type, equipment_type) VALUES ('6 days Single Chamber Washer Training covering from 444 to 7053hp','Instructor Lead','Single Chamber Washer');
INSERT INTO course (description, delivery_type, equipment_type) VALUES ('5 Online modules covering Surgical Tables from 3080 to 5085 ','Online','Surgical Tables');
INSERT INTO course (description, delivery_type, equipment_type) VALUES ('4 Online modules covering Surgical Light from LC to M-series','Online','Surgical Lights');
INSERT INTO course (description, delivery_type, equipment_type) VALUES ('4 day 130 and 1300 Series Cart Washer Training','Instructor Lead','Cart Washer');
INSERT INTO course (description, delivery_type, equipment_type) VALUES ('4 Online modules and 5 days of ILT to cover iQ and IDSS OR integration systems ','Blended','OR Integration');


