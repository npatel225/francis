<?php
// Neel Patel
// UPenn - PMACS developer screening exercise
class Francis{
    const YELL      = 'Chill!';
    const QUESTION  = 'Sure.';
    const IS_EMPTY  = 'See if I care!';
    const ETC       = 'Whatevs.';
    private $request = '';
    public function __construct(){
    }
    public function __destruct(){
        unset($this->request);
    }
    /**
     * @param $request is required
     * @return string
     */
    public function yo($request){
        $this->setRequest(str_replace(' ', '', $request));
        return $this->process();
    }
    // getter and setter for the request
    public function getRequest(){return $this->request;}
    public function setRequest($string){$this->request=$string;}
    // process the request
    private function process(){
        if($this->isYell()){
            return self::YELL;
        }
        elseif($this->isQuestion()){
            return self::QUESTION;
        }
        elseif($this->isEmpty()){
            return self::IS_EMPTY;
        }
        return self::ETC;
    }
    // check for a `?` at the end
    private function isQuestion(){
        return (is_string($this->request) && substr($this->request,-1) == '?');
    }
    // check for all capital letters
    private function isYell(){
        return (is_string($this->request) && ctype_upper(preg_replace('/[^A-Za-z\-]/', '', $this->request)));
    }
    // check to see if empty or null
    private function isEmpty(){
        return $this->request=='' || count($this->request)==0 || $this->request==null;
    }
}
?>