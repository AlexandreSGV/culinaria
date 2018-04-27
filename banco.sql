CREATE TABLE ingredients (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(50) NOT NULL
);

CREATE TABLE recipes (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(50) NOT NULL
);

CREATE TABLE ingredients_recipes (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	ingredient_id INT UNSIGNED NOT NULL,
	recipe_id INT UNSIGNED NOT NULL,
	quantity VARCHAR(50) NOT NULL,
	FOREIGN KEY (recipe_id) REFERENCES recipes(id),
	FOREIGN KEY (ingredient_id) REFERENCES ingredients(id),
	CONSTRAINT unique_recipe_ingredient UNIQUE (ingredient_id,recipe_id)
);