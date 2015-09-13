INSERT INTO Tweets (user_id, tweet_id, tweet_text, name) VALUES ('123', '4567', 'testing', 'Mikael Brunila'); -- Koska id-sarakkeen tietotyyppi on SERIAL, se asetetaan automaattisesti
INSERT INTO Users (name, screen_name) VALUES ('mikaelbrunila', 'Mikael Brunila');
INSERT INTO Hashtags (ht_text, indices) VALUES ('#vaalit2015', '1');

