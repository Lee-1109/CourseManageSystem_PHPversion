create view view_coursegrade as
select `c`.`courseID`    AS `courseID`,
       `c`.`courseName`  AS `courseName`,
       `s`.`studentID`   AS `studentID`,
       `s`.`studentName` AS `studentName`,
       `g`.`grade`       AS `grade`
from `php_liyang`.`courses` `c`
         join `php_liyang`.`grades` `g`
         join `php_liyang`.`students` `s`
where ((`c`.`courseID` = `g`.`courseID`) and (`g`.`studentID` = `s`.`studentID`));

