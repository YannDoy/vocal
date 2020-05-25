CREATE TABLE category (
	category_id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	label VARCHAR(80) NOT NULL,
	CONSTRAINT uk_category_label UNIQUE (label)
);

CREATE TABLE word (
	word_id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	fr VARCHAR(80) NOT NULL,
	de VARCHAR(80) NOT NULL,
	description TEXT,

	CONSTRAINT uk_word UNIQUE (fr, de)
);

CREATE TABLE text (
	text_id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	description TEXT
);

CREATE TABLE context (
	text_id INTEGER NOT NULL,
	position INTEGER NOT NULL,
	word_id INTEGER NOT NULL,
	category_id INTEGER,
	explain TEXT,

	PRIMARY KEY (text_id, position),

	CONSTRAINT fk_context_text
	    FOREIGN KEY (text_id)
        REFERENCES text(text_id),

	CONSTRAINT fk_context_word
		FOREIGN KEY (word_id)
		REFERENCES word(word_id),

	CONSTRAINT fk_context_category
		FOREIGN KEY (category_id)
		REFERENCES category(category_id)
);