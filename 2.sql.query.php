<?php

mysql_query('SELECT d.name FROM department as d WHERE (SELECT COUNT(w.id) FROM worker as w WHERE w.department_id = d.id) >= 5');
mysql_query('SELECT d.name GROUP_CONCAT(w.id SEPARATOR ',') FROM worker as w LEFT JOIN department as d ON w.department_id = d.id GROUP BY w.department_id');