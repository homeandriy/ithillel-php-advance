CREATE TABLE category
(
    id          INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name        VARCHAR(255) NOT NULL,
    description TEXT         NOT NULL,
    create_at   DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    update_at   DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    slug        varchar(255) NOT NULL UNIQUE,
    image       varchar(255)  NULL
)
