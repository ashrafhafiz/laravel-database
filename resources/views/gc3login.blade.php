<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>gc3login</title>
    <link rel="stylesheet" href="{{ asset('css/loginstyle.css') }}">
</head>

<body>
    <div id="login_form" style="">
        <div class="sdp-bg" style="background: url(/images/login-bg-top.png) repeat-x"></div>
        <div class="loginbg red">

            <div class="copyright"><a href="http://www.gc-3.com" target="_blank" rel="noopener noreferrer"><span
                        class="first-letter">E</span>NTERPRISE <span class="first-letter">R</span>ESOURCE <span
                        class="first-letter">P</span>LANNING
                </a>
            </div>

            <div id="loginDiv">
                <div class="logo-heading" style=""><img src="{{ asset('/images/weblogo.png') }}" width="400"></div>

                <div class="colorborder">
                    <div class="red"></div>
                    <div class="green"></div>
                    <div class="blue"></div>
                    <div class="yellow"></div>
                </div>

                <div class="loginform" id="loginFormDiv">
                    <div id="login-section1" class="login-section loginform">
                        <div id="message" class="tl err-div">
                            <div style="clear:both"></div>
                            <script>
                                function closeAlertMsg() {
                                    var ele = document.getElementById("errorMsg");
                                    if (ele != null) {
                                        jQuery('#errorMsg').slideUp('slow'); //NO I18N
                                        usernameEle = document.getElementById("username");
                                        usernameEle.focus();
                                    }
                                }
                            </script>

                            <div class="errorMsg" id="errorMsg" hidden="">
                                <div class="alert alert-dismissible alert-danger mb5" role="alert">
                                    <span class="alert-close-icon cursor-hand" aria-hidden="true"
                                        onclick="closeAlertMsg();" title="Close"></span>
                                    <span class="sr-only"></span>
                                    <span aria-hidden="true" class="alert-failure sdp-glyph-status"></span>
                                    <span class="msg"></span>
                                </div>
                            </div>

                        </div>
                        <form action="/j_security_check" id="login-form" method="post" name="login" autocomplete="off">
                            <input type="hidden" name="AUTHRULE_NAME" id="AUTHRULE_NAME" value="RememberMeLoginModule">


                            <input type="hidden" name="sdplogincsrfparam" value="ea88e3e8-bedc-4f63-a7a6-33481a83187d">

                            <div class="widget-table">

                                <div class="pt20"></div>

                                <div id="loginBox" class="widget-box collapse in" style="overflow:hidden">
                                    <div id="loginFormTable" class="formsection">
                                        <div class="fsinner">
                                            <div>
                                                <!-- form container div -->
                                                <div>
                                                    <div class="input-group"> <span
                                                            class="input-group-addon email-label"><span
                                                                class="login-user-icon"></span></span>
                                                        <input class="form-control" type="email" name="email"
                                                            id="email" placeholder="Email" value="{{ old('email') }}"
                                                            autofocus="">
                                                    </div>
                                                </div>
                                                <div class="pt20">
                                                    <div class="input-group"> <span
                                                            class="input-group-addon email-label"><span
                                                                class="login-pawd-icon"></span></span>
                                                        <input class="form-control" value="" placeholder="Password"
                                                            name="password" type="password" id="password"
                                                            autocomplete="off">
                                                    </div>
                                                </div>
                                                <div style="clear:both"></div>


                                                <div class="hide" id="choosedomaindiv">Select a Domain</div>
                                                <div class="hide" id="moreOptionsMsg">Options</div>
                                                <div class="hide" id="jserror">Enter both username and
                                                    password to proceed</div>
                                                <div class="hide" id="empty_captcha">Captcha text cannot be
                                                    empty.</div>
                                                <div id="LocalAuthLabel"></div>
                                                <div style="clear:both"></div>


                                                <span id="LocalAuthdomainname" style="display:none">
                                                    <div class="login-user-focus pt20">
                                                        <div class="input-group">
                                                            <span class="input-group-addon email-label">
                                                                <span class="login-globe1-icon">
                                                                </span>
                                                            </span>
                                                            <select name="dname" class="form-control">
                                                                <option value="0">Not in Domain</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </span>

                                                <div id="domainname"></div>


                                                <input name="LDAPEnable" type="hidden" value="false">
                                                <!-- NO OUTPUTENCODING -->
                                                <input name="AdEnable" type="hidden" value="false">
                                                <!-- NO OUTPUTENCODING -->
                                                <input name="enableDomainDropdown" type="hidden" value="true">
                                                <input name="DomainCount" type="hidden" value="0">
                                                <input name="LocalAuth" type="hidden" value="No">
                                                <input name="LocalAuthWithDomain" type="hidden" value="No">
                                                <input name="dynamicUserAddition_status" type="hidden" value="true">
                                                <!-- NO OUTPUTENCODING -->
                                                <input name="localAuthEnable" type="hidden" value="true">
                                                <!-- NO OUTPUTENCODING -->
                                                <input name="logonDomainName" type="hidden" value="-1">
                                                <div id="LocalAuthentication" class="hide">Local
                                                    Authentication</div>
                                                <div id="NoDomain" class="hide">--Select Domain--</div>
                                                <div style="clear:both"></div>
                                                <div id="domainLabel" style="display : none" class="pt10">
                                                    <label>Domain - <span id="domain"></span></label>
                                                </div>
                                                <div style="clear:both"></div>
                                                <div class="pb10 pt15" id="keepme">

                                                    <p class="m0">
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="checkbox" value="checkbox"
                                                                id="signedInCB" class="m0">
                                                            &nbsp;<label for="signedInCB">Keep me signed in</label>
                                                        </label>
                                                    </p>

                                                </div>
                                                <div class="pb3">

                                                    <button id="loginSDPage" name="loginButton" class="btn btn-primary"
                                                        data-loading-text="<span class='icon-sm spinner-icon1 mr5'></span>Logging in..."
                                                        title="Log in"
                                                        onclick="return checkForNullInLogin(this, this.form, 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAs+rUNFo9/ys4FhnloLKeBQt+Qq294bRTN1FDEJhG3Lkf8m/6Gci/Xk2W8ijcA/hbD8517PcgwRs8C4fueUld3mgumOvTrmw8q223KzsChtBKnifiEeIpFcTOkZImr737uJFrjmOOs/76+seQCkafL/t28JlMR1IyLFc4Z+k2i+Je1inXKSzZhkINIjM22Uk2sN7UEu94Ayy7BdyCV3tLibMusPFVsCv6K6sddlIFvPyXEPwez9n/FgA5puGB7YuJWp4CH1QOul6s8929usOwArh7Tvwlu4/1IFbyfrEuJlq6MYiQf18UvAelp3pJ1baAStzFpSAqKOdh/7cxGGREoQIDAQAB', 'ea88e3e8-bedc-4f63-a7a6-33481a83187d');">Log
                                                        in</button>

                                                </div>
                                            </div>
                                        </div>
                                        <!--/.fsinner-->

                                    </div>
                                    <!--/.formsection-->
                                </div>
                            </div>
                        </form>

                    </div>

                </div>

                <div class="copyright-subtitle">
                    <a href="http://www.gc-3.com" target="_blank">&copy; 2022 Giza Cable Industries</a>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
