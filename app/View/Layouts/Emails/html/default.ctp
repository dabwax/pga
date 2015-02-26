<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title><?php echo $this->fetch("title"); ?> - PGA</title>
<style type="text/css">
a:hover { color: #09F !important; text-decoration: underline !important; }
a:hover#vw { background-color: #CCC !important; text-decoration: none !important; color:#000 !important; }
a:hover#ff { background-color: #6CF !important; text-decoration: none !important; color:#FFF !important; }
</style>
</head>
<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #FFFFFF;" bgcolor="#FFFFFF" leftmargin="0">
<!--100% body table-->
<table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#FFFFFF">
    <tr>
        <td>
            <!--email container-->
            <table cellspacing="0" border="0" align="center" cellpadding="0" width="624">
                <tr>
                    <td>
                        <!--header-->
                        <table cellspacing="0" border="0" cellpadding="0" width="624">
                            <tr>
                                <td valign="top"> <img src="<?php echo Router::fullbaseUrl(); ?>/files/email/images/spacer-top.jpg" height="12" width="624" />
                                    <!--line break-->
                                    <table cellspacing="0" border="0" cellpadding="0" width="624">
                                        <tr>
                                            <td valign="top" width="624">
                                                <p><img src="<?php echo Router::fullbaseUrl(); ?>/files/email/images/line-break.jpg" height="10" width="624" /></p>
                                            </td>
                                        </tr>
                                    </table>
                                    <!--/line break-->
                                    <!--header content-->
                                    <table cellspacing="0" border="0" cellpadding="0" width="624">
                                        <tr>
                                            <td>
                                                <h1 style="color: #333; margin: 0px; font-weight: normal; font-size: 60px; font-family: Helvetica, Arial, sans-serif;">
                                                	<img src="<?php echo Router::fullbaseUrl(); ?>/img/pga.png" />
                                                </h1>
                                                <h2 style="color: #333; margin: 0px; font-weight: normal; font-size: 30px; font-family: Helvetica, Arial, sans-serif;">//
                                                    <?php echo date("d/m/Y"); ?>
                                                </h2>
                                            </td>
                                        </tr>
                                    </table>
                                    <!--/header content-->
                                </td>
                            </tr>
                        </table>
                        <!--/header-->
                        <!--line break-->
                        <table cellspacing="0" border="0" cellpadding="0" width="624">
                            <tr>
                                <td height="50" valign="middle" width="624"><img src="<?php echo Router::fullbaseUrl(); ?>/files/email/images/line-break-2.jpg" height="13" width="624" /></td>
                            </tr>
                        </table>
                        <!--/line break-->
                        <!--email content-->
                        <table cellspacing="0" border="0" id="email-content" cellpadding="0" width="624">
                            <tr>
                                <td>
                                    <!--section 1-->
                                    <table cellspacing="0" border="0" cellpadding="0" width="624">
                                        <tr>
                                            <td>
                                            	<?php
													echo $this->fetch("content");
												?>
                                            </td>
                                        </tr>
                                    </table>
                                    <!--/section 1-->
                                    <!--line break-->
                                    <table cellspacing="0" border="0" cellpadding="0" width="624">
                                        <tr>
                                            <td height="30" valign="middle" width="624"><img src="<?php echo Router::fullbaseUrl(); ?>/files/email/images/line-break-2.jpg" height="13" width="624" /></td>
                                        </tr>
                                    </table>
                                    <!--/line break-->
                                    <!--footer-->
                                    <table cellspacing="0" border="0" cellpadding="0" width="624">
                                        <tr>
                                            <td>
                                                <p style="font-size: 17px; line-height: 24px; font-family: Georgia, 'Times New Roman', Times, serif; color: #333; margin: 0px;">
                                                    Copyright &copy; <?php echo date("Y"); ?> PGA.</p>
                                                <p style="font-size: 17px; line-height: 24px; font-family: Georgia, 'Times New Roman', Times, serif; color: #333; margin: 0px;"><img src="<?php echo Router::fullbaseUrl(); ?>/files/email/images/spacer-ten.jpg" height="10" width="624" /></p>
                                            </td>
                                        </tr>
                                    </table>
                                    <!--/footer-->
                                </td>
                            </tr>
                        </table>
                        <!--/email content-->
                    </td>
                </tr>
            </table>
            <!--/email container-->
        </td>
    </tr>
</table>
<!--/100% body table-->
</body>
</html>