<?php
namespace SimpleQuiz\Utils;

class Location {

    protected $_suburb;
    protected $_district;
    protected $_region;
    protected $_state;

    public function __construct($suburb) {
        $this->loadBySuburb($suburb);
    }

    public function loadBySuburb($suburb) {
        $this->_suburb = $suburb;

        $location = \ORM::for_table('location')->where('suburb', $suburb)->find_one();

        $this->_district = $location["district"];
        $this->_region = $location["region"];
        $this->_state = $location["state"];
    }

    public function getDistrict() {
        return $this->_district;
    }
    public function getRegion() {
        return $this->_region;
    }
    public function getState() {
        return $this->_state;
    }
}
