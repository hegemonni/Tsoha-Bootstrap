INSERT INTO Requests (name, description, start_date, end_date, hashtags) VALUES ('EK-vaalit', 'Eduskuntavaalit 2015', '1.1.2015', '31.5.2015', '#vaalit2015');
INSERT INTO Tweets (tweet_id, tweet_text, name) VALUES (4567, 'testing', 'Mikael Brunila'); -- Koska id-sarakkeen tietotyyppi on SERIAL, se asetetaan automaattisesti
INSERT INTO Users (user_id, name, screen_name) VALUES (123, 'mikaelbrunila', 'Mikael Brunila');
INSERT INTO Hashtags (ht_text, indices) VALUES ('#vaalit2015', 1);

