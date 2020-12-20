create definer = root@localhost view view_classchairman as
select `v`.`学院` AS `学院`, `v`.`专业` AS `专业`, `v`.`班级` AS `班级`, `t`.`teacherID` AS `工号`, `t`.`teacherName` AS `教师姓名`
from `php_liyang`.`view_all_insmajorclass` `v`
         join `php_liyang`.`classes` `c`
         join `php_liyang`.`teachers` `t`
where ((`c`.`classID` = `v`.`班级`) and (`c`.classChairmanID = `t`.`teacherID`));

