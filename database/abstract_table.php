<?php
/**
 * Check for PVPLUGINABBR environment
 */
if ( ! defined( 'PVPLUGINABBR_INC' ) ) {
    exit;
}

abstract class pvtable {
    abstract protected $fields;
    abstract protected $data;
    abstract protected $table_name;

    abstract public function __construct();
    abstract public function getData($index);

    /**
     * Sets the value of table_name.
     *
     * @param mixed $table_name the table name
     *
     * @return self
     */
    protected function setTableName($table_name)
    {
        $this->table_name = $table_name;

        return $this;
    }
}