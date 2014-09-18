<?php

class ccl2cql {

  private $replaceFrom = array(' and ', ' or ', ' not');

  private $replaceTo = array(' AND ', ' OR ', ' NOT');

  private $cql = '';

  /**
   * @param stdClass $response
   */
  public function __construct($ccl=NULL) {
    if ( !empty($ccl) ) {
      $this->parseCCL($ccl);
    } else {
      $this->setError('EMPTY_CCL_STRING');
    }
  }

  public function setError($error) {
    $this->error = $error;
  }

  public function getError() {
    return $this->error;
  }

  public function getCql() {
    return $this->cql;
  }

  private function parseCCL($ccl) {
    $this->cql = str_replace($this->replaceFrom, $this->replaceTo, $ccl);
    return $this->cql;
  }

}

/*
xx -> dkcclterm.xx
xxx -> dkcclphrase.xxx

boolske operatorer: blank + xx + blank -> blank + XX + blank

trunkeringstegn som nedenfor.

dkcclphrase.lds lds
dkcclphrase.lem lem
dkcclphrase.lti lti
dkcclterm.db    db
dkcclterm.df    df
dkcclterm.dk    dk
dkcclterm.ds    ds
dkcclterm.em    em
dkcclterm.fl    fl
dkcclterm.ti    ti
dkcclterm.ke    ke
dkcclterm.kk    kk
dkcclterm.ma    ma
dkcclterm.no    no
dkcclterm.ok    ok
dkcclterm.sp    sp
dkcclterm.ti    ti

OG    og
IKKE  ikke
ELLER eller
* ?
* *

*/