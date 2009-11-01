<?php


New plugin_contact_page();

If (Class_Exists('plugin_contact_page')) return False;
Class plugin_contact_page {
  var $base_url;
  var $error;

  Function Plugin_contact_page(){
    // Read base
    $this->base_url = get_option('home').'/'.Str_Replace("\\", '/', SubStr(  RealPath(DirName(__FILE__)), Strlen(ABSPATH) ));
    
    // Owner of this contact form is the Author of the page
    Global $post;
    $this->form_owner = get_userdata($post->post_author);  
    
    // Set Hook
    Add_Filter ('the_content', Array($this, 'AddForm'));
    Add_Action ('wp_head', Array($this, 'AddStyle'));
  }

  Function mail_is_valid ($mail){
    // Check is a Mailadress is valid
    return eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $mail);
  }
  
  Function AddStyle(){
    // Add the style file to the header
    Echo '<link rel="stylesheet" href="'.$this->base_url.'/contact_form.css" type="text/css" media="screen" />';
  }
  
  Function HandleRequest (){
    // Check the REQUEST
    If ( !Empty($_POST) ){
      // Read from _POST
      $arr_form = $_POST['contact_form'];
      
      // Strips Slashes
      ForEach ($arr_form AS $key => $value){
        $arr_form[$key] = Trim (StripSlashes($value));
      }
      
      // Send the mail
      $from = $arr_form['name'].' <'.$arr_form['mail'].'>';
      $to = $this->form_owner->display_name.' <'.$this->form_owner->user_email.'>';
      $subject = UTF8_Decode (sprintf (__('Mail from %1$s via %2$s', 'theme'), $arr_form['name'], Parse_URL(get_option('home'), PHP_URL_HOST)));

      $header = 'From: '.$from."\n".
                'MIME-Version: 1.0'."\n".
                'Content-Type: text/plain; charset=UTF-8'."\n".
                'Content-Transfer-Encoding: 7bit';
      $message = $arr_form['message']."\r\n".
                 "\r\n".
                 "------\r\n";
                 If ($arr_form['company'] != '')
                   $message .= SPrintF(__('Company: %s', 'theme'), $arr_form['company'])."\r\n";
                 
                 If ($arr_form['fon'] != '')  
                   $message .= SPrintF(__('Fon: %s', 'theme'), $arr_form['fon'])."\r\n";
                   
      $message.= SPrintF(__('Remote-IP: %s', 'theme'), $_SERVER['REMOTE_ADDR'])."\r\n".
                 SPrintF(__('Date time: %s', 'theme'), Date(_c('m/d/Y h:i a|Date in contact form', 'theme')))."\r\n";
      
      $message = UTF8_Decode ($message);
    }
    
    // Check the Request and try to send
    If ( !Empty($_POST) &&
         ($arr_form['name'] && $arr_form['mail'] && $arr_form['message']) &&
         $this->mail_is_valid($arr_form['mail']) &&
         $this->mail_is_valid($this->form_owner->user_email) &&
         Mail($to, $subject, $message, $header)
       ){
       // Mail sent
       return true;
    }
    Else {
      // Show Error:
      If ( !Empty($_POST) && !($arr_form['name'] && $arr_form['mail'] && $arr_form['message']) )
        $this->error = __('Plase fill out all required fields.', 'theme');
      ElseIf ( !Empty($_POST) && !$this->mail_is_valid($arr_form['mail']) )
        $this->error = __('Your mail adress is not valid.', 'theme');
      ElseIf ( !Empty($_POST) )
        $this->error = __('There was some technical error.', 'theme');
      
      return false;
    }
  }
  
  Function AddForm($content){
    // If Content is Empty we need no Breaks ;)
    $content = Trim ($content);
    If ($content == '<br />') $content = Null;
    
    // Init Array
    $arr_form = Array();
    
    // Read from _POST
    $arr_form = $_POST['contact_form'];
    
    $content .= '<div id="contactform">';
    $content .= '<h2>'.__('Contact the author', 'theme').'</h2>';
    If (Empty($_POST) || (!Empty($_POST) && !$this->HandleRequest())){
      // Show Error:
      If ($this->error != '') $content .= '<p class="info">'.$this->error.'</p>';
      
      // Show Form:    
      $content .= '
      <form action="'.$_SERVER['REQUEST_URI'].'#contactform" method="post">
        <p class="to"><label>'.__('To:', 'theme').' </label> '.$this->form_owner->display_name.'</p>
        <p class="name"><label for="contact_name">'.__('Name:', 'theme').' *</label> <input type="text" id="contact_name" name="contact_form[name]" value="'.HTMLSpecialChars($arr_form['name']).'" /></p>
        <p class="company"><label for="contact_company">'.__('Company:', 'theme').'</label> <input type="text" id="contact_company" name="contact_form[company]" value="'.HTMLSpecialChars($arr_form['company']).'" /></p>
        <p class="mail"><label for="contact_mail">'.__('E-Mail:', 'theme').' *</label> <input type="text" id="contact_mail" name="contact_form[mail]" value="'.HTMLSpecialChars($arr_form['mail']).'" /></p>
        <p class="fon"><label for="contact_fon">'.__('Fon:', 'theme').' </label> <input type="text" id="contact_fon" name="contact_form[fon]" value="'.HTMLSpecialChars($arr_form['fon']).'" /></p>
        <p class="message"><textarea id="contact_message" name="contact_form[message]" cols="50" rows="10">'.HTMLSpecialChars($arr_form['message']).'</textarea></p>
        <p class="submit"><input type="submit" id="contact_submit" value="'.__('Submit').'" /></p>
        <p class="asterisk">* '.__('Required fields', 'theme').'</p>
      </form>';
    }
    Else {
      $content .= '<p class="info">'.__('The Mail was sent.', 'theme').'</p>';
    }
    
    $content .= '</div>';
  
    // Ready for TakeOff
    return $content;
  }
}

/* End of File */