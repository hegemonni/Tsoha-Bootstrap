<?php

  class BaseModel{
    // "protected"-attribuutti on käytössä vain luokan ja sen perivien luokkien sisällä
    protected $validators;

    public function __construct($attributes = null){
      // Käydään assosiaatiolistan avaimet läpi
      foreach($attributes as $attribute => $value){
        // Jos avaimen niminen attribuutti on olemassa...
        if(property_exists($this, $attribute)){
          // ... lisätään avaimen nimiseen attribuuttin siihen liittyvä arvo
          $this->{$attribute} = $value;
        }
      }
    }

    public function errors(){
      // Lisätään $errors muuttujaan kaikki virheilmoitukset taulukkona
      $errors = array();

      foreach($this->validators as $validator){
        // $validator = 'method_test';
        // $this->{$validator}();
        // $errors[] = $validator;

        // $errors = array_merge($errors, $validator_errors);
        // Kutsu validointimetodia tässä ja lisää sen palauttamat virheet errors-taulukkoon
      }

      return $errors;
    }

    public function validate_string_length($string, $length){

    }

    public function validate_string_hashtag($string, $length) {
      $firstLetter = $string[0];

        if ($firstLetter =! '#') {
          $errors[] = 'The hashtag field should start with a \'#\' sign.';
        }

        return $errors;
    }

    public function validate_string_date($string, $length) {

    }

  }
