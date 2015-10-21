CREATE TABLE Requests(
   id SERIAL PRIMARY KEY, 
   name varchar(140) NOT NULL,
   description varchar(1000),
   -- start_date varchar(140) NOT NULL, 
   -- end_date varchar(140) NOT NULL, 
   hashtags varchar(140) NOT NULL
);

CREATE TABLE Json(
   id SERIAL PRIMARY KEY, 
   name varchar(140) NOT NULL,
   json_file text,  
   description varchar(1000)
);

CREATE TABLE Users(
   id SERIAL PRIMARY KEY,
   name varchar(100) NOT NULL,
   password varchar(15) NOT NULL,
   requests int REFERENCES Requests
); 

CREATE TABLE TwitterUsers(
   id SERIAL PRIMARY KEY, -- SERIAL tyyppinen pääavain pitää huolen, että tauluun lisätyllä rivillä on aina uniikki pääavain. Kätevää!
   user_id int NOT NULL,
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
   user_id bigint REFERENCES TwitterUsers,
   hashtag_id bigint REFERENCES Hashtags,
   tweet_id bigint NOT NULL,
   tweet_text varchar(140) NOT NULL,
   name varchar(50) NOT NULL
   -- coordinates text,
   -- place_attribute varchar(400),
   -- place_country text,
   -- place_fullname text,
   -- place_id text,
   -- place_type text,
   -- created_at text,
   -- hashtags varchar(140)
);


 

