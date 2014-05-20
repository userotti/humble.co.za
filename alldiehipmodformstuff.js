);tab=q('<div id="hipmob_tab" class="hipmob_tab hipmob_hide"><div id="hipmob_titlebar" class="hipmob_titlebar"><div id="hipmob_custom_icon_block" class="hipmob_custom_icon_block"><img id="hipmob_custom_icon" class="hipmob_custom_icon" /></div><div id="hipmob_status_icon_block" class="hipmob_status_icon_block"><div id="hipmob_status_icon" class="hipmob_status_icon hmicon hmicon_clean"></div></div><div id="hipmob_title" class="hipmob_title"></div><div id="hipmob_openclose_block" class="hipmob_openclose_block"><div id="hipmob_window_button" class="hipmob_window_button hmicon hmicon_clean" /></div><div id="hipmob_popout_block" class="hipmob_popout_block hipmob_hide"><div id="hipmob_popout_button" class="hipmob_popout_button hmicon hmicon_popout" /></div><div id="hipmob_email_block" class="hipmob_email_block hipmob_hide"><div id="hipmob_email_transcript_button" class="hipmob_email_transcript_button hmicon hmicon_email" /></div></div>'+'<div id="hipmob_info" class="hipmob_info hipmob_hide"><form id="hipmob_info_form">'+'<div id="hipmob_info_message">Tell us a little bit about you:</div>'+'<div id="hipmob_info_name">

<input type="text" class="hipmob_input hipmob_class_input" id="hipmob_info_input_name" autocorrect="off" /></div>'+'<div id="hipmob_info_email">

<input type="'+(supports_email_input?"email":"text")+'" class="hipmob_input hipmob_class_input" id="hipmob_info_input_email" autocorrect="off" autocapitalize="off" /></div>'+'<div id="hipmob_info_phone" class="hipmob_hide">

<input type="'+(supports_tel_input?"tel":"text")+'" class="hipmob_input hipmob_class_input" id="hipmob_info_input_phone" autocorrect="off" /></div>'+'<div id="hipmob_info_question"><textarea class="hipmob_input hipmob_class_textarea" id="hipmob_info_input_question" autocorrect="off" /></div>'+'<div id="hipmob_info_buttons">


<input type="button" id="hipmob_info_input_button" class="hipmob_class_button" value="Continue" /><div style="clear: both"></div></div>'+"</form></div>"+'<div id="hipmob_email" class="hipmob_email hipmob_hide"><form id="hipmob_email_form">'+'<div id="hipmob_email_message">Enter your name and email address to receive a transcript of this conversation by email after the conversation ends:</div>'+'<div id="hipmob_email_name">

<input type="text" class="hipmob_input hipmob_class_input" id="hipmob_email_input_name" autocorrect="off" /></div>'+'<div id="hipmob_email_email">

<input type="text" class="hipmob_input hipmob_class_input" id="hipmob_email_input_email" autocorrect="off" /></div>'+'<div id="hipmob_email_buttons">

<input type="button" id="hipmob_email_input_button" class="hipmob_class_button" value="Email Me" /><div style="clear: both"></div></div>'+"</form></div>"+'<div id="hipmob_offline_form" class="hipmob_offline_form hipmob_hide" style="width: 100%">'+"</div>"+'<div id="hipmob_queue_form" class="hipmob_hide" style="width: 100%">'+"</div>"+'<div id="hipmob_postchat_form" class="hipmob_hide" style="width: 100%">'+'<div id="hipmob_restartchat" class="hipmob_restartchat">

<input type="button" id="hipmob_restart_chat_button" class="hipmob_class_button" value="Return to Chat" /><div style="clear: both"></div></div>'+"</div>"+'<div id="hipmob_chat" class="hipmob_chat hipmob_hide"><div id="hipmob_log_spacer" class="hipmob_log_spacer"></div><div id="hipmob_log" class="hipmob_log"></div><div id="hipmob_input_container" class="hipmob_input_container"><div id="hipmob_input_block" class="hipmob_input_block"><form><table id="hipmob_input_table" class="hipmob_input_table"><tr><td>

<textarea id="hipmob_input" type="text" placeholder="" autocorrect="off" class="hipmob_input"></textarea>




</td><td><button id="hipmob_send_button" class="hipmob_send_button hipmob_hide">Send</button></td></tr></table></form></div></div></div><div id="hipmob_branding" class="hipmob_branding"></div></div>');if("position"in chat_settings){if(chat_settings.position.indexOf("#")==0){var hosts=q(chat_settings.position);if(hosts.length>0)host=q(hosts[0])}}if(host){default_tab_width=host.outerWidth()-get_border_width(host)-get_border_height(host)-get_padding_width(host)-get_padding_height(host);default_tab_offset=0;default_height=host.height()-get_padding_height(host)-get_margin_height(host);tab.css("position","")}else if(chat_settings.fullscreen){default_tab_width=w;default_tab_offset=0;default_height=h;doc.css({"padding-top":"0px","margin-top":"0px","padding-bottom":"0px","ma