-- Create database
CREATE DATABASE mydatabase CHARSET = utf8;

-- Show database
SHOW DATABASES like 'my%';
SHOW DATABASES like '_y%';

-- Select current database
USE mydatabase;

-- Change database's attribute
ALTER DATABASE mydatabase CHARSET gbk;

-- Delete a database
DROP DATABASE mydatabase;
