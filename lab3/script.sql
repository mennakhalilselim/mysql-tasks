CREATE DATABASE company;
USE company;

CREATE TABLE employees (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	fname VARCHAR(100) NOT NULL,
	lname VARCHAR(100) NOT NULL,
	address VARCHAR(255),
	country VARCHAR(100),
	gender enum('male', 'female'),
	username VARCHAR(100) UNIQUE NOT NULL,
	password VARCHAR(20) NOT NULL,
	department VARCHAR(100)
);

DROP table employees;

CREATE TABLE skills (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	emp_id INT UNSIGNED,
	skill1 VARCHAR(50),
	skill2 VARCHAR(50),
	skill3 VARCHAR(50),
	skill4 VARCHAR(50),
	FOREIGN KEY (emp_id) REFERENCES employees(id) ON DELETE CASCADE ON UPDATE CASCADE 
);