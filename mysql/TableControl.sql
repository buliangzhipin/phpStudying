  -- Create table [mydatabase].
  CREATE TABLE my_sampletable (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(10) NOT NULL
  )ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Create table using like
CREATE TABLE my_sampleLikeTable LIKE my_sampletable;

--Show tables of a database
SHOW TABLES like 'my\_%';

--Show the structure of table
DESCRIBE my_sampletable;
DESC my_sampletable;
SHOW COLUMNS FROM my_sampletable;

-- Change the optional setting of a table
ALTER TABLE my_sampletable CHARSET gbk;

-- Change the name of a table
RENAME TABLE my_sampletable TO my_newSampleTable;

-- Add field into a table
ALTER TABLE my_sampleLikeTable add address VARCHAR(50) FIRST;

-- Delete a field
ALTER TABLE my_sampleLikeTable DROP address;
