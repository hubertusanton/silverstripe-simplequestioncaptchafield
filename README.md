SilverStripe SendFriend Module
========================================

Maintainer Contacts
-------------------
*  Bart van Irsel (<bart@30.nl>)

Requirements
------------
* SilverStripe 3+

Documentation
-------------
[GitHub Wiki](http://wiki.github.com/hubertusanton/silverstripe-simplequestioncaptchafield)

Installation Instructions
-------------------------

1. Place this directory in the root of your SilverStripe installation.
2. Rename directory to simplequestioncaptchafield
3. Visit yoursite.com/dev/build?flush=1

Usage 
--------------

This is a simple user friendly captcha field with random questions a human should know the answer to to prevent spamming of forms in silverstripe.

Documentation
-------------
examples of usage:


`$obvious_questions = array('what is the answer of 1 + 1?' => '2', 'What is the first letter of the alphabet?' => 'a', 'What is the color of the sky?' => 'blue');`

`$test_field = new SimpleQuestionCaptchaField('SimpleCaptcha', null, '', $obvious_questions);`

or

`$test_field = new SimpleQuestionCaptchaField('SimpleCaptcha', null, '');`

Help 
--------------
I could use some help in making up the default obvious questions and maybe making these also suporting multiple languages.

