ALTER TABLE `users` ADD `admin` TINYINT(1) NOT NULL DEFAULT '0' AFTER `created_at`;
