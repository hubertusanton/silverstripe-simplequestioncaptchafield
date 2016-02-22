<?php

/**
 * Simple Question Captcha field. A field with some configurable questions for checking the humanity of someone who fills out a form.
 */
class SimpleQuestionCaptchaField extends FormField
{
    
    protected $questions_answers = array(
        'What color is the clear sky?' => 'blue',
        'What is the color of grass?' => 'green'
    );
    
    public function __construct($name, $title = null, $value = '', $custom_questions_answers = null)
    {
        if ($custom_questions_answers) {
            $this->questions_answers = $custom_questions_answers;
        }

        if (!Session::get('SimpleQuestionCaptchaField')) {
            $title = array_rand($this->questions_answers);
            Session::set('SimpleQuestionCaptchaField', $title);
        } else {
            $title = Session::get('SimpleQuestionCaptchaField');
        }
        
        parent::__construct($name, $title);
    }
    
    
    public function validate($validator)
    {
        if (Session::get('SimpleQuestionCaptchaField')) {
            $question    = trim(Session::get('SimpleQuestionCaptchaField'));
        } else {
            return false;
        }
        
        $answer      = trim($this->value);
        $good_answer = $this->questions_answers[$question];

        if (strcasecmp($answer, $good_answer)) {
            $validator->validationError(
                $this->name,
                _t('SimpleQuestionCaptchaField.VALIDATION', "Please enter the right answer to prove you are human."),
                "validation",
                false
            );
            return false;
        } else {
            Session::clear('SimpleQuestionCaptchaField');
        }
        return true;
    }
}
