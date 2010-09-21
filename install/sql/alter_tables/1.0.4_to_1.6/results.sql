/* Migration from 1.0.4 to 1.6 POST RC1 - 20050925 - fm*/
ALTER TABLE `results` MODIFY `build` int(10) NOT NULL default '0';
ALTER TABLE `results` MODIFY `bugs` varchar(100) default NULL;
ALTER TABLE `results` ADD INDEX `status` (`status`);


ALTER TABLE `results` ADD COLUMN `build_id` int(10) NOT NULL default '0';

ALTER TABLE `results` COMMENT = 'Updated to TL 1.6 POST RC1';