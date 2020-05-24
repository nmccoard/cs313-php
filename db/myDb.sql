
-- A few helpful commands you might want during the process:
-- \dt - Lists the tables
-- \d+ public.user - Shows the details of the user table
-- DROP TABLE public.user - Removes the user table completely so we can re-create it
-- \q - Quit the application and go back to the regular command prompt

-- query SELECT * FROM course_record c INNER JOIN student s ON c.student_id=s.id WHERE s.first_name='Nate';

-- clean up

DROP TABLE IF EXISTS course_record;
DROP TABLE IF EXISTS equipment;​
DROP TABLE IF EXISTS student;
DROP TABLE IF EXISTS course;
DROP TABLE IF EXISTS location;
​
-- setup tables
CREATE TABLE location(
    id SERIAL PRIMARY KEY,
    zone VARCHAR(16) NOT NULL
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
    student_zone int NOT NULL REFERENCES location(id)
);

CREATE TABLE course_record (
    id SERIAL PRIMARY KEY,
    course_code VARCHAR(32) NOT NULL,
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

INSERT INTO location (zone) VALUES ('North West');
INSERT INTO location (zone) VALUES ('South West');
INSERT INTO location (zone) VALUES ('North Central');
INSERT INTO location (zone) VALUES ('South Central');
INSERT INTO location (zone) VALUES ('North East');
INSERT INTO location (zone) VALUES ('South East');

INSERT INTO course (description, delivery_type, equipment_type) VALUES ('10 day Steam Sterilizer','Instructor Lead','Steam Sterilizer');
INSERT INTO course (description, delivery_type, equipment_type) VALUES ('3 Online modules combined with 3 days of ILT','Blended Learning','VPro');
INSERT INTO course (description, delivery_type, equipment_type) VALUES ('10 days Washer Training','Instructor Lead','Washer Disinfector');
INSERT INTO course (description, delivery_type, equipment_type) VALUES ('9 Online modules','Online Only','Surgical Products');
INSERT INTO course (description, delivery_type, equipment_type) VALUES ('4 Online modules and 5 days of ILT','Blended Learning','OR Integration');

INSERT INTO student (employee_number, first_name, last_name, student_zone) VALUES ('111','Rem','Smith',1);
INSERT INTO student (employee_number, first_name, last_name, student_zone) VALUES ('222','Cam','Allen',1);
INSERT INTO student (employee_number, first_name, last_name, student_zone) VALUES ('333','Max','Allen',2);
INSERT INTO student (employee_number, first_name, last_name, student_zone) VALUES ('444','Jen','Johnson',2);
INSERT INTO student (employee_number, first_name, last_name, student_zone) VALUES ('555','Nate','McCoard',5);
INSERT INTO student (employee_number, first_name, last_name, student_zone) VALUES ('666','Brian','Earl',4);
INSERT INTO student (employee_number, first_name, last_name, student_zone) VALUES ('777','Briana','Olsen',3);
INSERT INTO student (employee_number, first_name, last_name, student_zone) VALUES ('888','James','Peterson',3);
INSERT INTO student (employee_number, first_name, last_name, student_zone) VALUES ('999','Jose','Lopez',6);

INSERT INTO equipment (sn, type, model, location) VALUES ('031251506',1,'AMSCO 400 V120',1);
INSERT INTO equipment (sn, type, model, location) VALUES ('011251001',1,'Century V120',2);
INSERT INTO equipment (sn, type, model, location) VALUES ('031051503',1,'AMSCO 400 V116',3);
INSERT INTO equipment (sn, type, model, location) VALUES ('011951002',1,'Century V248',4);
INSERT INTO equipment (sn, type, model, location) VALUES ('031351505',1,'AMSCO 400 V260',5);
INSERT INTO equipment (sn, type, model, location) VALUES ('018251007',1,'Century V120',6);
INSERT INTO equipment (sn, type, model, location) VALUES ('030051902',2,'VPro maX2',1);
INSERT INTO equipment (sn, type, model, location) VALUES ('030341602',2,'VPro maX',2);
INSERT INTO equipment (sn, type, model, location) VALUES ('030652001',2,'VPro S2',3);
INSERT INTO equipment (sn, type, model, location) VALUES ('031341603',2,'VPro maX',4);
INSERT INTO equipment (sn, type, model, location) VALUES ('032071901',2,'VPro maX2',5);
INSERT INTO equipment (sn, type, model, location) VALUES ('032341302',2,'VPro 1',6);
INSERT INTO equipment (sn, type, model, location) VALUES ('3624618001',3,'AMSCO 5052',1);
INSERT INTO equipment (sn, type, model, location) VALUES ('3621114003',3,'Vision 1327 Cart Washer',2);
INSERT INTO equipment (sn, type, model, location) VALUES ('3620607011',3,'Synergy',3);
INSERT INTO equipment (sn, type, model, location) VALUES ('3611819001',3,'Vision Washer',4);
INSERT INTO equipment (sn, type, model, location) VALUES ('3623318001',3,'AMSCO 3052',5);
INSERT INTO equipment (sn, type, model, location) VALUES ('3621198003',3,'444 Washer',6);
INSERT INTO equipment (sn, type, model, location) VALUES ('3601819005',3,'Vision 1321 Cart Washer',1);
INSERT INTO equipment (sn, type, model, location) VALUES ('3621611001',3,'Synergy',4);
INSERT INTO equipment (sn, type, model, location) VALUES ('040949904',4,'AMSCO 3085',1);
INSERT INTO equipment (sn, type, model, location) VALUES ('041981002',4,'Harmony LED 585',2);
INSERT INTO equipment (sn, type, model, location) VALUES ('040941101',4,'AMSCO 4085',3);
INSERT INTO equipment (sn, type, model, location) VALUES ('041981502',4,'Harmony LED 585',4);
INSERT INTO equipment (sn, type, model, location) VALUES ('041941904',4,'AMSCO 5085SRT',5);
INSERT INTO equipment (sn, type, model, location) VALUES ('041981802',4,'HarmonyAir M-series',6);
INSERT INTO equipment (sn, type, model, location) VALUES ('041741701',4,'AMSCO 4085',2);
INSERT INTO equipment (sn, type, model, location) VALUES ('03RF257G17C2',5,'Harmony iQ 3600',5);
INSERT INTO equipment (sn, type, model, location) VALUES ('03RF839945HD',5,'Harmony iQ 2800',4);

INSERT INTO course_record (course_code, course_id, student_id, course_end_date) VALUES ('SCTSS2019-01',1,5,'2019-02-02');
INSERT INTO course_record (course_code, course_id, student_id, course_end_date) VALUES ('ORI2020-01',5,5,'2020-02-02');
INSERT INTO course_record (course_code, course_id, student_id, course_end_date) VALUES ('SCTWD2019-02',3,5,'2019-03-03');
INSERT INTO course_record (course_code, course_id, student_id, course_end_date) VALUES ('SCTSP2019-05',4,5,'2019-04-04');
INSERT INTO course_record (course_code, course_id, student_id, course_end_date) VALUES ('VPRO2020-01',2,1,'2018-02-02');
INSERT INTO course_record (course_code, course_id, student_id, course_end_date) VALUES ('VPRO2020-01',2,2,'2018-02-02');
INSERT INTO course_record (course_code, course_id, student_id, course_end_date) VALUES ('SCTSS2019-01',1,2,'2019-02-02');
INSERT INTO course_record (course_code, course_id, student_id, course_end_date) VALUES ('ORI2020-01',5,3,'2020-02-02');
INSERT INTO course_record (course_code, course_id, student_id, course_end_date) VALUES ('SCTWD2019-02',3,4,'2019-03-03');
INSERT INTO course_record (course_code, course_id, student_id, course_end_date) VALUES ('SCTSP2019-05',4,6,'2019-04-04');
INSERT INTO course_record (course_code, course_id, student_id, course_end_date) VALUES ('SCTSS2019-01',1,7,'2019-02-02');
INSERT INTO course_record (course_code, course_id, student_id, course_end_date) VALUES ('ORI2020-01',5,8,'2020-02-02');
INSERT INTO course_record (course_code, course_id, student_id, course_end_date) VALUES ('SCTWD2019-02',3,9,'2019-03-03');
INSERT INTO course_record (course_code, course_id, student_id, course_end_date) VALUES ('SCTSP2019-05',4,3,'2019-04-04');




