CREATE TABLE Users(
   id SERIAL PRIMARY KEY, -- SERIAL tyyppinen pääavain pitää huolen, että tauluun lisätyllä rivillä on aina uniikki pääavain. Kätevää!
   user_id bigint NOT NULL,
   name varchar(140) NOT NULL, -- Muista erottaa sarakkeiden määrittelyt pilkulla!
   screen_name varchar(140) NOT NULL
);
 
CREATE TABLE Hashtags(
   id SERIAL PRIMARY KEY,
   ht_text varchar(140) NOT NULL,
   indices integer NOT NULL 
);

CREATE TABLE Tweets(
   id SERIAL PRIMARY KEY,
   user_id BIGINT REFERENCES Users(id),
   hashtag_id INTEGER REFERENCES Hashtags(id),
   tweet_id bigint NOT NULL,
   tweet_text varchar(140) NOT NULL,
   name varchar(50) NOT NULL,
   coordinates text,
   place_attribute varchar(400),
   place_country text,
   place_fullname text,
   place_id text,
   place_type text,
   created_at text,
   hashtags varchar(140)
);
 

