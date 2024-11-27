<?php
class PhpCodeValidator {
    private $code;

    public function __construct($code) {
        $this->code = $code;
    }
    public function isValid() {
        $arr = [];
        $length = strlen($this->code);

        for ($i = 0; $i < $length; $i++) {
            if ($this->code[$i] === '{') {
                array_push($arr, '{');
            } elseif ($this->code[$i] === '}') {
                if (empty($arr)) {
                    return false;
                }
                array_pop($arr);
            }
        }
        return empty($arr);
    }
}
$text1 = new PhpCodeValidator("{{lajkdhf{adfa}{}adfasdfadf{}}}");
echo $text1->isValid() ? 'Корректный код' : 'Некорректный код'; 
$text2 = new PhpCodeValidator("{{lajkdhf{adfa");
echo $text2->isValid() ? 'Корректный код' : 'Некорректный код'; 
?>