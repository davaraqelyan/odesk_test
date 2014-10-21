<?php

define('DS', DIRECTORY_SEPARATOR);
require_once dirname(dirname(__FILE__)) . DS . 'app' . DS . 'lib' . DS . 'DataGrid.php';

class DataGridTest extends PHPUnit_Framework_TestCase {

    protected $_mockData = array(
        array(
            'Name' => 'Trixie',
            'Color' => 'Green',
            'Element' => 'Earth',
            'Likes' => 'Flowers'
        ),
        array(
            'Name' => 'Tinkerbell',
            'Element' => 'Air',
            'Likes' => 'Singning',
            'Color' => 'Blue',
            'testcol1' => 'dummy data',
            'testcol2' => 'dummy data'
        ),
        array(
            'Element' => 'Water',
            'Likes' => 'Dancing',
            'Name' => 'Blum',
            'Color' => 'Pink',
            'testcol1' => 'dummy data',
            'testcol2' => 'dummy data',
            'testcol3' => 'dummy data'
        ),
    );
    protected $_grid;
    public function __construct() {
        $this->_grid = new DataGrid($this->_mockData, array(
            'testcol1',
            'Name',
            'Color',
            'Element',
            'Likes',
        )); 
    }
    

    public function testCoulmnsCount() {
        $this->assertEquals(7 , count( $this->_grid->getColumns()));
        
    }
    public function testOrderOfColumns(){
        $this->assertEquals(array(
            'testcol1',
            'Name',
            'Color',
            'Element',
            'Likes',
            'testcol2',
            'testcol3'
        ),  $this->_grid->getCustomOrder());
    }
    public function testMaxLengths(){
        $this->assertEquals(array(
            'testcol1' => strlen('dummy data'),
            'Name' => strlen('Tinkerbell'),
            'Color'=> strlen('Green'),
            'Element' => strlen('Element'),
            'Likes' => strlen('Singning'),
            'testcol2' => strlen('dummy data'),
            'testcol3' => strlen('dummy data')
        ), $this->_grid->getStringMaxLengths());
    }

}
