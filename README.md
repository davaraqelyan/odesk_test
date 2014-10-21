Convert associative array to ACSII table 

Test1
+----------+-----+-------+--------+
|   Name   |Color|Element|  Likes |
+----------+-----+-------+--------+
|  Trixie  |Green| Earth | Flowers|
|Tinkerbell| Blue|  Air  |Singning|
|   Blum   | Pink| Water | Dancing|
+----------+-----+-------+--------+
string(30) "Order:Name,Color,Element,Likes"
string(5) "Data:"
array(3) {
  [0]=>
  array(4) {
    ["Name"]=>
    string(6) "Trixie"
    ["Color"]=>
    string(5) "Green"
    ["Element"]=>
    string(5) "Earth"
    ["Likes"]=>
    string(7) "Flowers"
  }
  [1]=>
  array(4) {
    ["Name"]=>
    string(10) "Tinkerbell"
    ["Element"]=>
    string(3) "Air"
    ["Likes"]=>
    string(8) "Singning"
    ["Color"]=>
    string(4) "Blue"
  }
  [2]=>
  array(4) {
    ["Element"]=>
    string(5) "Water"
    ["Likes"]=>
    string(7) "Dancing"
    ["Name"]=>
    string(4) "Blum"
    ["Color"]=>
    string(4) "Pink"
  }
}
Changing align of cells left,right by default it is centered
+----------+-----+-------+--------+
|Name      |Color|Element|Likes   |
+----------+-----+-------+--------+
|Trixie    |Green|Earth  |Flowers |
|Tinkerbell|Blue |Air    |Singning|
|Blum      |Pink |Water  |Dancing |
+----------+-----+-------+--------+
+----------+-----+-------+--------+
|      Name|Color|Element|   Likes|
+----------+-----+-------+--------+
|    Trixie|Green|  Earth| Flowers|
|Tinkerbell| Blue|    Air|Singning|
|      Blum| Pink|  Water| Dancing|
+----------+-----+-------+--------+
Complex data, if you add new cols, which not exist in oder rows the cells will be empty
+----+----------+-----+-------+--------+-----+--------+------+-----+
|blah|   Name   |Color|Element|  Likes |test3| asdasd | asdas| test|
+----+----------+-----+-------+--------+-----+--------+------+-----+
|    |  Trixie  |Green| Earth | Flowers|     |        |      |     |
|    |Tinkerbell| Blue|  Air  |Singning|test3|        |asdasd|     |
|blah|   Blum   | Pink| Water | Dancing|     |adasdasd|      |test2|
+----+----------+-----+-------+--------+-----+--------+------+-----+
string(35) "Order:blah,Name,Color,Element,Likes"
string(5) "Data:"
array(3) {
  [0]=>
  array(4) {
    ["Name"]=>
    string(6) "Trixie"
    ["Color"]=>
    string(5) "Green"
    ["Element"]=>
    string(5) "Earth"
    ["Likes"]=>
    string(7) "Flowers"
  }
  [1]=>
  array(6) {
    ["Name"]=>
    string(10) "Tinkerbell"
    ["Element"]=>
    string(3) "Air"
    ["Likes"]=>
    string(8) "Singning"
    ["Color"]=>
    string(4) "Blue"
    ["asdas"]=>
    string(6) "asdasd"
    ["test3"]=>
    string(5) "test3"
  }
  [2]=>
  array(7) {
    ["Element"]=>
    string(5) "Water"
    ["Likes"]=>
    string(7) "Dancing"
    ["Name"]=>
    string(4) "Blum"
    ["Color"]=>
    string(4) "Pink"
    ["blah"]=>
    string(4) "blah"
    ["asdasd"]=>
    string(8) "adasdasd"
    ["test"]=>
    string(5) "test2"
  }
}