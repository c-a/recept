DROP TABLE IF EXISTS tbl_user;
CREATE TABLE tbl_user
(
  id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(128) NOT NULL,
  password_hash VARCHAR(160) NOT NULL,
  salt VARCHAR(128) NOT NULL,
  email VARCHAR(128) NOT NULL,
  profile TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS tbl_recipe;
CREATE TABLE tbl_recipe
(
  id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  instructions TEXT,
  prep_time SMALLINT UNSIGNED,
  cook_time SMALLINT UNSIGNED,
  owner_id INTEGER,
  create_time TIMESTAMP DEFAULT 0,
  modified_time TIMESTAMP DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS tbl_ingredient;
CREATE TABLE tbl_ingredient
(
  id INTEGER NOT NULL PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  kcal SMALLINT UNSIGNED,
  protein TINYINT UNSIGNED,
  fat TINYINT UNSIGNED,
  carbs TINYINT UNSIGNED,
  fiber TINYINT UNSIGNED,
  description TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS tbl_recipe_ingredient;
CREATE TABLE tbl_recipe_ingredient
(
  recipe_id INTEGER NOT NULL,
  ingredient_id INTEGER NOT NULL,
  amount INTEGER NOT NULL,
  unit CHAR(20) NOT NULL
);