USE betterhelp;

INSERT INTO survey (name, owner) VALUES ('BetterHelp', 'Trent');

INSERT INTO questions (sid, name, order_of, answ_type ) VALUES (1, 'What is your gender?', 1, 0 );
INSERT INTO questions (sid, name, order_of, answ_type ) VALUES (1, 'What is your relationship status?', 2, 0 );
INSERT INTO questions (sid, name, order_of, answ_type ) VALUES (1, 'Which countries did you visit in?', 3, 1 );
INSERT INTO questions (sid, name, order_of, answ_type ) VALUES (1, 'What is your favorite sports?', 4, 0 );
INSERT INTO questions (sid, name, order_of, answ_type ) VALUES (1, 'Which programming languages do you know?', 5, 1 );

INSERT INTO answers (qid, name, order_of) VALUES (1, 'Male', 1 );
INSERT INTO answers (qid, name, order_of) VALUES (1, 'Female', 2);
INSERT INTO answers (qid, name, order_of) VALUES (2, 'Married', 1 );
INSERT INTO answers (qid, name, order_of) VALUES (2, 'Single', 2 );
INSERT INTO answers (qid, name, order_of) VALUES (2, 'Divorced', 3 );
INSERT INTO answers (qid, name, order_of) VALUES (2, 'Widowed', 4 );
INSERT INTO answers (qid, name, order_of) VALUES (2, 'Seperated', 5);
INSERT INTO answers (qid, name, order_of) VALUES (2, 'In a relationship', 6 );
INSERT INTO answers (qid, name, order_of) VALUES (3, 'Canada', 1 );
INSERT INTO answers (qid, name, order_of) VALUES (3, 'Italy', 2);
INSERT INTO answers (qid, name, order_of) VALUES (3, 'Australia', 3);
INSERT INTO answers (qid, name, order_of) VALUES (3, 'Hong Kong', 4);
INSERT INTO answers (qid, name, order_of) VALUES (3, 'Russia', 5);
INSERT INTO answers (qid, name, order_of) VALUES (3, 'Belgium', 6);
INSERT INTO answers (qid, name, order_of) VALUES (4, 'Football', 1);
INSERT INTO answers (qid, name, order_of) VALUES (4, 'Basketball', 2);
INSERT INTO answers (qid, name, order_of) VALUES (4, 'Baseball', 3);
INSERT INTO answers (qid, name, order_of) VALUES (4, 'Hockey', 4);
INSERT INTO answers (qid, name, order_of) VALUES (4, 'None', 5);
INSERT INTO answers (qid, name, order_of) VALUES (5, 'PHP', 1 );
INSERT INTO answers (qid, name, order_of) VALUES (5, 'Ruby', 2 );
INSERT INTO answers (qid, name, order_of) VALUES (5, 'Python', 3);
INSERT INTO answers (qid, name, order_of) VALUES (5, 'Java Script', 4);

