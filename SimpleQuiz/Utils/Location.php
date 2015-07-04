<?php
namespace SimpleQuiz\Utils;

class Location {

    protected $_suburb = null;
    protected $_district = null;
    protected $_region = null;
    protected $_state = null;

    public function __construct($suburb) {
        $this->loadBySuburb($suburb);
    }

    public function loadBySuburb($suburb) {
        $location = \ORM::for_table('location')->where('suburb', $suburb)->find_one();

        $this->_suburb = trim(strpos($suburb, " (") !== -1 ? substr($suburb, 0, strpos($suburb, " (")) : $suburb);

        $this->_district = $location["district"];
        $this->_region = $location["region"];
        $this->_state = $location["state"];
    }

    public function getSuburb() {
        return $this->_suburb;
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

    public function getLowestLevelLocation() {
        if ($this->_suburb) {
            return $this->_suburb;
        }
        else if ($this->_district) {
            return $this->_district;
        }
        else if ($this->_region) {
            return $this->_region;
        }
        else {
            return $this->_state;
        }
    }
}
