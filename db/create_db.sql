/*
Please remember that before adding this db and data you must login into MySQL:
mysql -u root -p
(If you haven't modified the root password leave the password field empty).
Or if you have your own user replace "root" for your user name.
*/

CREATE DATABASE employees2;
USE employees2;

CREATE TABLE users(
   userId   INTEGER  NOT NULL PRIMARY KEY 
  ,`name`     TEXT(50) NOT NULL
  ,`password` TEXT(60) NOT NULL
  ,email    TEXT(40) NOT NULL
  ,auth     TEXT(15) NOT NULL
);

INSERT INTO users (userId,`name`,`password`,email,auth) VALUES (1,'admin','$2y$10$nuh1LEwFt7Q2/wz9/CmTJO91stTBS4cRjiJYBY3sVCARnllI.wzBC','admin@assemblerschool.com','admin'),
(2,'Erick Noiztbander','$2y$10$0CrU8swERZ.RcIPF5x4QAOtXk6W2W/a9S.z1c6gYZDpk.xpQbvxAi','no email bitx','user'),
(3,'alberto','$2y$10$HZvQaRNn6yv4tl9OnBray.i2vriDus7Ydzw8TNFF.tHZM8MNCamwC','no email bitx','user'),
(4,'rodrigo','$2y$10$f/v1W7UcA4R1JoiNfIOSOu1vsv1ZcFlAN.jo5Bv8ptYeRw9zDIOay','no email bitx','user'),
(5,'Jordi','$2y$10$DwsiaenAF4i6IbhSEIuq5Op2qvHf9eXqCR.o0GsCVw.T5ddCWvLVK','aejordi@gmail.com','admin'),
(6,'Miguel','$2y$10$CLkmRu2OD9HJ1Dn8GLaJbeAjSRyTBoUYV9gy8tc5uqNk1koXHXoxa','miguel@gmaiguel.com','user');


CREATE TABLE employees(
   id            INTEGER  NOT NULL PRIMARY KEY 
  ,`name`          TEXT(50) NOT NULL
  ,lastName      TEXT(50)
  ,email         TEXT(40)
  ,gender        TEXT(30)
  ,city          TEXT(30)
  ,streetAddress TEXT(80)
  ,`state`         TEXT(30)
  ,age           INTEGER 
  ,postalCode    INTEGER 
  ,phoneNumber   BIGINT
);

INSERT INTO employees(id,`name`,lastName,email,gender,city,streetAddress,`state`,age,postalCode,phoneNumber) VALUES (1,'Rack','Lei','jackon@network.com','man','San Jone','126','CA',24,394221,7383627627),
(2,'John','Doe','jhondoe@foo.com','man','New York','89','WA',34,09889,1283645645),
(3,'Leila','Mills','mills@leila.com','woman','San Diego','55','CA',29,098765,9983632461),
(4,'Richard','Desmond','dismond@foo.com','man','Salt lake city','90','UT',30,457320,90876987654),
(5,'Susan','Smith','susanmith@baz.com','woman','Louisville','43','KNT',28,445321,224355488976),
(6,'Brad','Simpson','brad@foo.com','man','Atlanta','128','GEO',40,394221,6854634522),
(7,'Neil','Walker','walkerneil@baz.com','man','Nashville','1','TN',42,90143,45372788192),
(8,'Robert','Thomson','jackon@network.com','man','New Orleans','126','LU',24,63281,91232876454);


CREATE TABLE images_mock(
   `name`   TEXT(30) NOT NULL
  ,email    TEXT(40) NOT NULL
  ,position TEXT(80) NOT NULL
  ,photo    TEXT(200) NOT NULL
);

INSERT INTO images_mock(`name`,email,position,photo) VALUES ('Yvonne Strahovski','yvonne.strahovski@gmail.com','Software Engineer','https://m.media-amazon.com/images/M/MV5BMzI5NDIzNTQ1Nl5BMl5BanBnXkFtZTgwMjQ0Mzc1MTE@._V1_UY256_CR4,0,172,256_AL_.jpg'),
('Mario Palmer','mario.palmer@gmail.com','Senior Developer','https://randomuser.me/api/portraits/men/33.jpg'),
('Ali Anari','ali.anari@gmail.com','Customer Service','https://pbs.twimg.com/profile_images/647526574120529920/T5rm0m7W.jpg'),
('Ariyanna Hicks','ariyanna.hicks@gmail.com','Product Designer','https://i.imgur.com/Qz5CrD0.jpg'),
('Jonathan Hung','jonathan.hung@gmail.com','Call Center Representative','https://pbs.twimg.com/profile_images/869994638110736385/CVYUarcq.jpg'),
('Jennifer Aniston','jennifer.aniston@gmail.com','Customer Service','https://images-na.ssl-images-amazon.com/images/M/MV5BNjk1MjIxNjUxNF5BMl5BanBnXkFtZTcwODk2NzM4Mg@@._V1_UY256_CR3,0,172,256_AL_.jpg'),
('Temperance Norwood','temperance.norwood@gmail.com','Software Engineer','https://images.generated.photos/eL-OqIIteJK_ORyTXpJ96fDVgV_vY5PCvb0CfFGXMxs/rs:fit:512:512/Z3M6Ly9nZW5lcmF0/ZWQtcGhvdG9zLzAx/Njk3NTcuanBn.jpg'),
('Jessica Barden','jessica.barden@gmail.com','Software Engineer','https://images-na.ssl-images-amazon.com/images/M/MV5BNzUwMjgxNTMyOF5BMl5BanBnXkFtZTcwMTIwNzU0NA@@._V1_UX172_CR0,0,172,256_AL_.jpg');
