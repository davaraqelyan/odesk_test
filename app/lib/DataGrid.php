<?php

class DataGrid {

    /**
     * Table columns
     * @var arrays 
     */
    private $_columns = array();

    /**
     * Table rows
     * @var array
     */
    private $_rows;

    /**
     * Symbol for corner of cell
     * @var string 
     */
    private $_cornerSymbol = '+';

    /**
     * Table horizontal border symbol
     * @var string
     */
    private $_theadBorderSymbol = '-';

    /**
     *
     * @var type 
     */
    private $_cellBorder = '|';

    /**
     * Table data
     * @var array
     */
    private $_data;

    /**
     * Custom order of table columns 
     * e.g array('color', 'likes', 'name')
     * @var Array
     */
    private $_customOrder;

    /**
     * Keeps max lengths of columns for adjusting cells
     * Associative array 
     * @var array 
     */
    private $_colsMaxLengths = array();

    /**
     * Main border of table
     * @var string
     */
    private $_theadBorder = '';

    /**
     * Line separator
     * @var string 
     */
    private $_lineSeparator = '<br>';

    /**
     * Space character or string
     * @var string
     */
    private $_space = ' ';

    /**
     * Align of table
     * @var string 
     */
    private $_align;
    
    /**
     * Color of columns will be generated randomly
     * @var array
     */
    private $_columnColors = array();

    /**
     * Init data grid
     * @param Array $data | associative arrays of rows
     * @param Array $order | columns order of table
     * @param string $align | align of table possible values 'center', 'left', 'right'
     */
    public function __construct($data, $order = array(), $align = 'center') {
        $this->_data = $data;
        $this->_align = $align;
        $this->initCols();
        $this->initOrder($order);
        $this->initColMaxLengths();
        $this->initColors();
        $this->_theadBorder = $this->getTheadBorder();
    }

    /**
     * Init columns 
     * Each row can has different columns
     * if row hasn't that coulmn in table will be empty cell
     */
    public function initCols() {

        foreach ($this->_data as $data) {
            $this->_columns = array_merge($this->_columns, array_keys($data));
        }
        $this->_columns = array_unique($this->_columns);
    }

    public function prep($expresion) {
        echo "<pre>";
        var_dump($expresion);
        echo "</pre>";
    }

    /**
     * Init orders of columns based on given array
     * @param Array $order
     */
    private function initOrder($order) {
        if (empty($order)) {
            $this->_columns = ksort($this->_columns);
        } else {
            $this->_customOrder = $order;
            $this->customOrder();
        }
    }
    private function initColors(){
        foreach($this->_columns as $col){
            $this->_columnColors[$col] = $this->randomColor();
        }
    }

    /**
     * Custom order 
     */
    private function customOrder() {
        uasort($this->_columns, array($this, 'compareStringsByOrder'));
        $this->_customOrder = array_values($this->_columns);
    }

    /**
     * Compare strings for order
     * @param type $input1
     * @param type $input2
     * @return int
     */
    private function compareStringsByOrder($input1, $input2) {
        //position of first string ($input1) in order array
        $position1 = array_search($input1, $this->_customOrder);
        //position of second string ($input2) in order array
        $position2 = array_search($input2, $this->_customOrder);
        // if key not exist in order then push that string to the end
        if (empty($position1) && $position1 !== 0) {
            return 1;
        }
        if (empty($position2) && $position2 !== 0) {
            return -1;
        }
        // if postions equal leave as is
        if ($position1 === $position2) {
            return 0;
        }
        if ($position1 > $position2) {
            return 1;
        }
        if ($position1 < $position2) {
            return -1;
        }
    }

    /**
     * Returns columns of table
     * @return Array
     */
    public function getColumns() {
        return $this->_columns;
    }

    /**
     * Returns output of table
     * @return string
     */
    public function output() {
        $output = '<pre>';
        $output .= $this->_theadBorder . $this->_lineSeparator;
        $output .= $this->getThead() . $this->_lineSeparator;
        $output .= $this->_theadBorder . $this->_lineSeparator;
        $output .= $this->getTbody() . $this->_lineSeparator;
        $output .= $this->_theadBorder . $this->_lineSeparator;
        $output .= '</pre>';
        return $output;
    }

    /**
     * Returns table head
     * @return string
     */
    private function getThead() {
        $output = $this->_cellBorder;

        foreach ($this->_columns as $col) {
            $spaceCount = $this->_colsMaxLengths[$col] - strlen($col);
            $alignFunction = 'align' . ucfirst($this->_align);
            $output .= '<span style="color:' . $this->_columnColors[$col] . '">';
            if (method_exists($this, $alignFunction)) {
                $output .= $this->$alignFunction($col, $spaceCount) . $this->_cellBorder;
            } else {
                $output .= $col . str_repeat($this->_space, $spaceCount) . $this->_cellBorder;
            }
            $output .= '</span>';
        }
        return $output;
    }

    /**
     * Return table body
     * @return string
     */
    private function getTbody() {
        $rows = array();
        foreach ($this->_data as $data) {
            uksort($data, array($this, 'compareStringsByOrder'));
            $rows[] = $this->getRow($data);
        }
        $this->_rows = $rows;
        return implode($this->_lineSeparator, $rows);
    }

    /**
     * Return row of table
     * @param Array $data
     * @return string
     */
    private function getRow($data) {
        $output = '';

        //$output = (array_key_exists('Color', $data) ? '<span style="color:' . $data['Color'] . '">' : '');
        $output .= $this->_cellBorder;
        foreach ($data as $col => $value) {
            $spaceCount = $this->_colsMaxLengths[$col] - strlen($value);
            $alignFunction = 'align' . ucfirst($this->_align);
            $output .= '<span style="color:' . $this->_columnColors[$col] . '">';
            if (method_exists($this, $alignFunction)) {
                $output .= $this->$alignFunction($value, $spaceCount) . $this->_cellBorder;
            } else {
                $output .= $value . str_repeat($this->_space, $spaceCount) . $this->_cellBorder;
            }
            $output .= '</span>';
        }


        //$output .= (array_key_exists('Color', $data) ? '</span>' : '');
        return $output;
    }

    /**
     * Returns main border of table 
     * e.g +----------+------+
     * @return string
     */
    private function getTheadBorder() {
        $border = $this->_cornerSymbol;
        foreach ($this->_colsMaxLengths as $length) {
            $border .= str_repeat($this->_theadBorderSymbol, $length) . $this->_cornerSymbol;
        }
        return $border;
    }

    /**
     * Init max lengths of columns 
     * if column not exist then cell have to be empty
     */
    private function initColMaxLengths() {


        foreach ($this->_columns as $col) {
            $this->_colsMaxLengths[$col] = strlen($col);
            foreach ($this->_data as &$data) {
                if (array_key_exists($col, $data)) {
                    if (strlen($data[$col]) > $this->_colsMaxLengths[$col]) {
                        $this->_colsMaxLengths[$col] = strlen($data[$col]);
                    }
                } else {
                    $data[$col] = '';
                }
            }
        }
    }

    /**
     * Align center table cell 
     * @param string $string | string that need to be aligned
     * @param int $spaceCount | space count in that cell
     * @return string
     */
    private function alignCenter($string, $spaceCount) {
        return str_repeat($this->_space, ceil($spaceCount / 2)) . $string . str_repeat($this->_space, floor($spaceCount / 2));
    }

    /**
     * Align left table cell
     * @param string $string | string that need to be aligned
     * @param int $spaceCount | space count in that cell
     * @return string
     */
    private function alignLeft($string, $spaceCount) {
        return $string . str_repeat($this->_space, $spaceCount);
    }

    /**
     * Align right table cell
     * @param string $string
     * @param int $spaceCount
     * @return string
     */
    private function alignRight($string, $spaceCount) {
        return str_repeat($this->_space, $spaceCount) . $string;
    }
    /**
     * Return random color 
     * @return string
     */
    public function randomColor() {
        $possibilities = array(1, 2, 3, 4, 5, 6, 7, 8, 9, "A", "B", "C", "D", "E", "F");
        shuffle($possibilities);
        $color = "#";
        for ($i = 1; $i <= 6; $i++) {
            $color .= $possibilities[rand(0, 14)];
        }
        return $color;
    }
    /**
     * Return order 
     * @return array
     */
    public function getCustomOrder(){
        return $this->_customOrder;
    } 
    public function getStringMaxLengths(){
        return $this->_colsMaxLengths;
    }

}