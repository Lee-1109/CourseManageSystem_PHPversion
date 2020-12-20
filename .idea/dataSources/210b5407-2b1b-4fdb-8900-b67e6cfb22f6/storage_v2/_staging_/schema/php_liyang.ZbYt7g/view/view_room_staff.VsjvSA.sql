create view view_room_staff as
select `r`.`roomName` AS `教室名`,`r`.capacity as  `教室容量`, `s`.`staffName` AS `楼管员`
from `php_liyang`.`rooms` `r`
         join `php_liyang`.`staff` `s`
where (`r`.`staffID` = `s`.`staffID`);

