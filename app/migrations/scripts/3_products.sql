CREATE TABLE products
(
    id          INT UNSIGNED  NOT NULL AUTO_INCREMENT,
    name        VARCHAR(255)  NOT NULL,
    description TEXT          NOT NULL,
    create_at   DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP,
    update_at   DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP,
    price       decimal(8, 2) NOT NULL,
    price_sale  decimal(8, 2),
    slug        varchar(255)  NOT NULL UNIQUE,
    sku         varchar(255)  NOT NULL UNIQUE,
    is_active   TINYINT             DEFAULT 1,
    image       varchar(255)  NULL,
    category_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (`id`) USING BTREE,
    INDEX `FK_products_category` (`category_id`) USING BTREE,
    CONSTRAINT `FK_products_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON UPDATE restrict ON DELETE restrict
) ENGINE = InnoDB;
