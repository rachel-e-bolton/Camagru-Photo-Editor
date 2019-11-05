CREATE TABLE IF NOT EXISTS users(
	id				INT 			AUTO_INCREMENT PRIMARY KEY,
	first_name		varchar(255) 	NOT NULL,
	last_name		varchar(255),
	handle			varchar(255) 	UNIQUE NOT NULL,
	email			varchar(255) 	UNIQUE NOT NULL,
	password_hash	longtext 		NOT NULL,
	verified		boolean 		DEFAULT false,
	profile_img		longtext
);

CREATE TABLE IF NOT EXISTS posts(
	id 				INT 			AUTO_INCREMENT PRIMARY KEY,
	user_id 		INT 			NOT NULL,
	date 			DATETIME 		DEFAULT CURRENT_TIMESTAMP,
	image			longtext 		NOT NULL,
	comment			varchar(500),

	CONSTRAINT fk_post_userid
    FOREIGN KEY (user_id) 
    REFERENCES users(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS comments(
	id 				INT 			AUTO_INCREMENT PRIMARY KEY,
	parent_id 		INT,
	user_id 		INT				NOT NULL,
	post_id 		INT				NOT NULL,
	comment			varchar(500),

	CONSTRAINT fk_comment_parentid
    FOREIGN KEY (parent_id) 
    REFERENCES comments(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE,

	CONSTRAINT fk_comment_userid
    FOREIGN KEY (user_id) 
    REFERENCES users(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE,

	CONSTRAINT fk_comment_postid
    FOREIGN KEY (post_id) 
    REFERENCES posts(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS likes(
	id				INT 		AUTO_INCREMENT PRIMARY KEY,
	post_id			INT 		NOT NULL,
	user_id			INT 		NOT NULL,

	CONSTRAINT fk_like_userid
    FOREIGN KEY (user_id) 
    REFERENCES users(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE,

	CONSTRAINT fk_like_postid
    FOREIGN KEY (post_id) 
    REFERENCES posts(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS overlays(
	id			INT 		AUTO_INCREMENT PRIMARY KEY,
	image		longtext 	NOT NULL
);