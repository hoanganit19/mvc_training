<?php
echo (!empty($msg))?$msg:false;
HtmlHelper::formOpen('post', _WEB_ROOT.'/home/post_user');
HtmlHelper::input('<div>', '<br/>'.form_error('fullname', '<span style="color: red">', '</span>').'</div>', 'text', 'fullname', '', '', 'Họ tên...', old('fullname'));
HtmlHelper::input('<div>', '<br/>'.form_error('email', '<span style="color: red">', '</span>').'</div>', 'text', 'email', '', '', 'Email...', old('email'));
HtmlHelper::input('<div>', '<br/>'.form_error('age', '<span style="color: red">', '</span>').'</div>', 'text', 'age', '', '', 'Age...', old('age'));
HtmlHelper::input('<div>', '<br/>'.form_error('password', '<span style="color: red">', '</span>').'</div>', 'password', 'password', '', '', 'Password...');
HtmlHelper::input('<div>', '<br/>'.form_error('confirm_password', '<span style="color: red">', '</span>').'</div>', 'password', 'confirm_password', '', '', 'Confirm Password...');
HtmlHelper::submit('Submit');
HtmlHelper::formClose();
?>