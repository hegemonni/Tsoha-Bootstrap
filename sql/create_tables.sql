CREATE TABLE Users(
   id SERIAL PRIMARY KEY, -- SERIAL tyyppinen pääavain pitää huolen, että tauluun lisätyllä rivillä on aina uniikki pääavain. Kätevää!
   name varchar(140) NOT NULL, -- Muista erottaa sarakkeiden määrittelyt pilkulla!
   screen_name varchar(140) NOT NULL
 );
 
 CREATE TABLE Tweets(
   id SERIAL PRIMARY KEY,
   user_id bigint REFERENCES Users(id),
   tweet_text varchar(140) NOT NULL,
   name varchar(50) NOT NULL,
   coordinates text,
   place_attribute varchar(400),
   place_country text,
   place_fullname text,
   place_id text,
   place_type text,
   created_at text,
   hashtags bigint REFERENCES Hashtags(ht_text)
 );
 
   CREATE TABLE Hashtags(
   ht_text SERIAL PRIMARY KEY, -- SERIAL tyyppinen pääavain pitää huolen, että tauluun lisätyllä rivillä on aina uniikki pääavain. Kätevää!
   indices integer[] NOT NULL -- Muista erottaa sarakkeiden määrittelyt pilkulla!
);

