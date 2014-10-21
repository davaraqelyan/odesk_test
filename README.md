Convert associative array to ACSII table 


Test1<pre>+----------+-----+-------+--------+<br>|<span style="color:#5FD48D">   Name   |</span><span style="color:#8AD869">Color|</span><span style="color:#6FEA9C">Element|</span><span style="color:#4A3B25">  Likes |</span><br>+----------+-----+-------+--------+<br>|<span style="color:#5FD48D">  Trixie  |</span><span style="color:#8AD869">Green|</span><span style="color:#6FEA9C"> Earth |</span><span style="color:#4A3B25"> Flowers|</span><br>|<span style="color:#5FD48D">Tinkerbell|</span><span style="color:#8AD869"> Blue|</span><span style="color:#6FEA9C">  Air  |</span><span style="color:#4A3B25">Singning|</span><br>|<span style="color:#5FD48D">   Blum   |</span><span style="color:#8AD869"> Pink|</span><span style="color:#6FEA9C"> Water |</span><span style="color:#4A3B25"> Dancing|</span><br>+----------+-----+-------+--------+<br></pre><pre>string(30) "Order:Name,Color,Element,Likes"
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
</pre>Changing align of cells left,right by default it is centered<pre>+----------+-----+-------+--------+<br>|<span style="color:#9CC782">Name      |</span><span style="color:#6E6D31">Color|</span><span style="color:#2C2283">Element|</span><span style="color:#DB4C28">Likes   |</span><br>+----------+-----+-------+--------+<br>|<span style="color:#9CC782">Trixie    |</span><span style="color:#6E6D31">Green|</span><span style="color:#2C2283">Earth  |</span><span style="color:#DB4C28">Flowers |</span><br>|<span style="color:#9CC782">Tinkerbell|</span><span style="color:#6E6D31">Blue |</span><span style="color:#2C2283">Air    |</span><span style="color:#DB4C28">Singning|</span><br>|<span style="color:#9CC782">Blum      |</span><span style="color:#6E6D31">Pink |</span><span style="color:#2C2283">Water  |</span><span style="color:#DB4C28">Dancing |</span><br>+----------+-----+-------+--------+<br></pre><pre>+----------+-----+-------+--------+<br>|<span style="color:#181828">      Name|</span><span style="color:#B1564B">Color|</span><span style="color:#DEEEEF">Element|</span><span style="color:#73B73F">   Likes|</span><br>+----------+-----+-------+--------+<br>|<span style="color:#181828">    Trixie|</span><span style="color:#B1564B">Green|</span><span style="color:#DEEEEF">  Earth|</span><span style="color:#73B73F"> Flowers|</span><br>|<span style="color:#181828">Tinkerbell|</span><span style="color:#B1564B"> Blue|</span><span style="color:#DEEEEF">    Air|</span><span style="color:#73B73F">Singning|</span><br>|<span style="color:#181828">      Blum|</span><span style="color:#B1564B"> Pink|</span><span style="color:#DEEEEF">  Water|</span><span style="color:#73B73F"> Dancing|</span><br>+----------+-----+-------+--------+<br></pre>Complex data, if you add new cols, which not exist in oder rows the cells will be empty<pre>+----+----------+-----+-------+--------+-----+--------+------+-----+<br>|<span style="color:#5957E7">blah|</span><span style="color:#B83639">   Name   |</span><span style="color:#B73A4F">Color|</span><span style="color:#48E92C">Element|</span><span style="color:#7CD19B">  Likes |</span><span style="color:#98AD16">test3|</span><span style="color:#7DA2BC"> asdasd |</span><span style="color:#ACBE33"> asdas|</span><span style="color:#CFF421"> test|</span><br>+----+----------+-----+-------+--------+-----+--------+------+-----+<br>|<span style="color:#5957E7">    |</span><span style="color:#B83639">  Trixie  |</span><span style="color:#B73A4F">Green|</span><span style="color:#48E92C"> Earth |</span><span style="color:#7CD19B"> Flowers|</span><span style="color:#98AD16">     |</span><span style="color:#7DA2BC">        |</span><span style="color:#ACBE33">      |</span><span style="color:#CFF421">     |</span><br>|<span style="color:#5957E7">    |</span><span style="color:#B83639">Tinkerbell|</span><span style="color:#B73A4F"> Blue|</span><span style="color:#48E92C">  Air  |</span><span style="color:#7CD19B">Singning|</span><span style="color:#98AD16">test3|</span><span style="color:#7DA2BC">        |</span><span style="color:#ACBE33">asdasd|</span><span style="color:#CFF421">     |</span><br>|<span style="color:#5957E7">blah|</span><span style="color:#B83639">   Blum   |</span><span style="color:#B73A4F"> Pink|</span><span style="color:#48E92C"> Water |</span><span style="color:#7CD19B"> Dancing|</span><span style="color:#98AD16">     |</span><span style="color:#7DA2BC">adasdasd|</span><span style="color:#ACBE33">      |</span><span style="color:#CFF421">test2|</span><br>+----+----------+-----+-------+--------+-----+--------+------+-----+<br></pre><pre>string(35) "Order:blah,Name,Color,Element,Likes"
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
</pre>