create definer = root@localhost view view_student_course as
select `s`.`Sid`    AS `Sid`,
       `s`.`Sname`  AS `Sname`,
       `c`.`Cid`    AS `Cid`,
       `c`.`Cname`  AS `Cname`,
       `c`.`Credit` AS `credit`,
       `c`.`Ctime`  AS `Ctime`,
       `dc`.`Tid`   AS `Tid`
from `php_liyang`.`student_course` `sc`
         join `php_liyang`.`depart_course` `dc`
         join `php_liyang`.`courses` `c`
         join `php_liyang`.`students` `s`
where ((`sc`.`Cid` = `c`.`Cid`) and (`dc`.`Cid` = `c`.`Cid`) and (`s`.`Did` = `dc`.`Did`) and '');

