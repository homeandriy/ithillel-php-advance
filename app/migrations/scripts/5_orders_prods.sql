CREATE TABLE orders_prods
(
    id         INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    order_id   int unsigned not null,
    product_id int unsigned not null,
    FOREIGN KEY (order_id) REFERENCES orders (id) ON UPDATE RESTRICT ON DELETE RESTRICT,
    FOREIGN KEY (product_id) REFERENCES products (id) ON UPDATE RESTRICT ON DELETE RESTRICT
)
