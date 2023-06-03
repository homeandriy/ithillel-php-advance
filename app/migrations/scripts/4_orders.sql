CREATE TABLE orders
(
    id         INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    session_id varchar(255) not null,
    user_id    int unsigned null,
    sum        double(8, 2) NOT NULL,
    address    TEXT,
    create_at  DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    update_at  DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    status     varchar(255)          DEFAULT 'created',
    FOREIGN KEY (`user_id`) REFERENCES users (id) ON UPDATE RESTRICT ON DELETE CASCADE
)
