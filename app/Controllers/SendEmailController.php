<?php
 
 namespace App\Controllers;
  
 use App\Controllers\BaseController;
  
 class SendEmailController extends BaseController
 {
     public function index()
     {
         $email = \Config\Services::email();
         $email->setTo('sample-recipient@binaryboxtuts.com');
         $email->setSubject('Email Test');
         $email->setMessage('A sample email using mailtrap.');
         $email->send();
     }
 }

