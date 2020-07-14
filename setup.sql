-- create the databases
CREATE DATABASE IF NOT EXISTS imagesapp;

-- create the users for each database
CREATE USER 'root'@'%' IDENTIFIED BY 'root';
GRANT CREATE, ALTER, INDEX, LOCK TABLES, REFERENCES, UPDATE, DELETE, DROP, SELECT, INSERT ON `imagesapp`.* TO 'root'@'%';

FLUSH PRIVILEGES;
