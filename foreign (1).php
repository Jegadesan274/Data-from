<?php
// CREATE TABLE Orders(
//     us_ID int NOT NULL PRIMARY KEY,
//     slills varchar NOT NULL,
//     Experience varchar NOT NULL,
//     user_id int FOEIGN KEY PREFERENCES
//     users(user_id)
// );


 ALTER TABLE user_skills
 ADD FOREIGN KEY (user_id) 
 REFERENCES user_tbl(user_id)



?>