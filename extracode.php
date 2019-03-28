<?php
/* Select particular name */

$q = $this->db->query('SELECT age FROM my_users_table WHERE id = ?',array(3));
$data = array_shift($q->result_array());
echo($data['age']);

Or

$this->db->select('age');
$this->db->where('id', '3');
$q = $this->db->get('my_users_table');
// if id is unique, we want to return just one row
$data = array_shift($q->result_array());

echo($data['age']);

Or

// here we select just the age column
$this->db->select('age');
$this->db->where('id', '3');
$q = $this->db->get('my_users_table');
$data = $q->result_array();

echo($data[0]['age']);

Or

$this->db->where('id', '3');
// here we select every column of the table
$q = $this->db->get('my_users_table');
$data = $q->result_array();

echo($data[0]['age']);


/* Last to second record show */

SELECT countryname FROM `country` GROUP BY countryname DESC LIMIT 1 OFFSET 1
  
/* Display only india record */
select name from tablename where name in ('india');

/* 1 to 10 id show */
select * from tablename where id between 1 and 10;
