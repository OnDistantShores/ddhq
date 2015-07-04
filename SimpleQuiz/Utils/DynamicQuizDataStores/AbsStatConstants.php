<?php
namespace SimpleQuiz\Utils\DynamicQuizDataStores;

class AbsStatConstants {

    public static $MEASURE = array(
        "1" => "Estimated resident population",
        "2" => "Change over previous year",
        "3" => "Percentage change over previous year"
    );

    public static $STATE = array(
        "1" => "New South Wales",
        "2" => "Victoria",
        "3" => "Queensland",
        "4" => "South Australia",
        "5" => "Western Australia",
        "6" => "Tasmania",
        "7" => "Northern Territory",
        "8" => "Australian Capital Territory",
        "0" => "Australia"
    );

    public static $SEX = array(
        "1" => "Male",
        "2" => "Female",
        "3" => "Person",
    );

    public static $AGE = array(
        "A04" => "0-4",
        "A59" => "5-9",
        "A10" => "10-14",
        "A15" => "15-19",
        "A20" => "20-24",
        "A25" => "25-29",
        "A30" => "30-34",
        "A35" => "35-39",
        "A40" => "40-44",
        "A45" => "45-49",
        "A50" => "50-54",
        "A55" => "55-59",
        "A60" => "60-64",
        "A65" => "65-69",
        "A70" => "70-74",
        "A75" => "75-79",
        "A80" => "80-84",
        "A85" => "85-89",
        "8599" => "85-99",
        "A90" => "90-94",
        "A95" => "95-99"
    );

    public static function getGenderId($gender) {
      foreach(self::$SEX as $key=>$value){
        if($value == $gender){
          return $key;
        }
      }
      return null;
    }

    public static function getAgeGroupId($age) {
      switch($age){
        case ($age>=0 && $age<=4)   : return "A04";
        case ($age>=5 && $age<=9)   : return "A59";
        case ($age>=10 && $age<=14) : return "A10";
        case ($age>=15 && $age<=19) : return "A15";
        case ($age>=20 && $age<=24) : return "A20";
        case ($age>=30 && $age<=34) : return "A30";
        case ($age>=40 && $age<=44) : return "A40";
        case ($age>=45 && $age<=49) : return "A45";
        case ($age>=50 && $age<=54) : return "A50";
        case ($age>=55 && $age<=59) : return "A55";
        case ($age>=60 && $age<=64) : return "A60";
        case ($age>=65 && $age<=69) : return "A65";
        case ($age>=70 && $age<=74) : return "A70";
        case ($age>=75 && $age<=79) : return "A75";
        case ($age>=80 && $age<=84) : return "A80";
        case ($age>=85 && $age<=89) : return "A85";
        case ($age>=90 && $age<=94) : return "A90";
        case ($age>=95 && $age<=99) : return "A95";
      }
      return null;
    }

    public static function getStateId($state) {
      foreach(self::$STATE as $key=>$value){
        if($value == $state){
          return $key;
        }
      }
      return null;
    }
}
