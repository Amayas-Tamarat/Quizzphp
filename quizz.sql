CREATE TABLE Question(
   id_question INT,
   question VARCHAR(50) NOT NULL,
   PRIMARY KEY(id_question)
);

CREATE TABLE answer(
   id_answers INT,
   answer VARCHAR(50) NOT NULL,
   type_reponse VARCHAR(50),
   id_question INT NOT NULL,
   PRIMARY KEY(id_answers),
   FOREIGN KEY(id_question) REFERENCES Question(id_question)
);

CREATE TABLE score(
   id_score VARCHAR(50),
   score INT,
   PRIMARY KEY(id_score)
);

CREATE TABLE users(
   id_users INT,
   username VARCHAR(50) NOT NULL,
   id_score VARCHAR(50) NOT NULL,
   PRIMARY KEY(id_users),
   UNIQUE(username),
   FOREIGN KEY(id_score) REFERENCES score(id_score)
);

CREATE TABLE answer_given(
   id_users INT,
   id_answers INT,
   PRIMARY KEY(id_users, id_answers),
   FOREIGN KEY(id_users) REFERENCES users(id_users),
   FOREIGN KEY(id_answers) REFERENCES answer(id_answers)
);
