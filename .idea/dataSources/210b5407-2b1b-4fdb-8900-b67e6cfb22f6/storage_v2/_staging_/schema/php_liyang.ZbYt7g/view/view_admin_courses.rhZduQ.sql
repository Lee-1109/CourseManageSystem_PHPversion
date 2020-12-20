create view view_admin_courses as
select `c`.`Cid`    AS `Cid`,
       `t`.`Tname`  AS `Tname`,
       `r`.`Rname`  AS `Rname`,
       `c`.`Cname`  AS `Cname`,
       `c`.`Credit` AS `Credit`,
       `c`.`Ctime`  AS `Ctime`
from `php_liyang`.`courses` `c`
         join `php_liyang`.`teachers` `t`
         join `php_liyang`.`rooms` `r`
where (`c`.`Tid` = `t`.`Tid`and ``);

