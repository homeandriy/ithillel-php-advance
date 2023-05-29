CREATE TABLE `mvc_db`.`tasks`
(
    `id`          INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name`        VARCHAR(255) NOT NULL,
    `description` TEXT         NOT NULL,
    `create_at`   DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `update_at`   DATETIME     NOT NULL,
    `is_complete` TINYINT      NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;