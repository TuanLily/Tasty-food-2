<div id="fb-customer-chat" class="fb-customerchat">
</div>
<!-- footer section -->
<footer class="footer_section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 footer-col">
                <div class="footer_contact">
                    <h4>Liên hệ</h4>
                    <div class="contact_link_box">
                        <a href="https://maps.app.goo.gl/osdMKSs4nV57rj4S6">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span>
                                Toà nhà FPT Polytechnic quận Cái Răng, TP Cần Thơ
                            </span>
                        </a>
                        <a href="tel: 0774808219">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span> Call +365347890 </span>
                        </a>
                        <a href="https://mail.google.com/mail/u/2/#inbox?compose=new">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span> tastyfood@gmail.com </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 footer-col">
                <div class="footer_detail">
                    <a href="" class="footer-logo"> Tasty Food </a>
                    <p>
                        Hãy đến và trải nghiệm những hương vị tuyệt vời tại nhà hàng
                        Tasty Food.
                    </p>
                    <div class="footer_social">
                        <a href="https://www.facebook.com/profile.php?id=100094883262759&locale=vi_VN">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                        <a href="">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                        <a href="">
                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                        </a>
                        <a href="">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                        <a href="">
                            <i class="fa fa-pinterest" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 footer-col">
                <h4>Giờ mở cửa</h4>
                <p>Mỗi ngày</p>
                <p>10.00 Am -10.00 Pm</p>
            </div>
        </div>
        <div class="footer-info">
            <p>&copy; 2023 Tastyfood. Bảo lưu mọi quyền.</p>
        </div>
    </div>
</footer>
<!-- footer section -->
<!-- Messenger Plugin chat Code -->

<script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "108871585613948");
    chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
    window.fbAsyncInit = function () {
        FB.init({
            xfbml: true,
            version: 'v18.0'
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<!-- Chat Bot FPT AI -->
<script>
    // Configs
    let liveChatBaseUrl = document.location.protocol + '//' + 'livechat.fpt.ai/v36/src'
    let LiveChatSocketUrl = 'livechat.fpt.ai:443'
    let FptAppCode = 'd0360e091155701579cf57760bf2271c'
    let FptAppName = 'Live support'
    // Define custom styles
    let CustomStyles = {
        // header
        headerBackground: 'linear-gradient(86.7deg, #FFF300FF 0.85%, #FFAC00FF 98.94%)',
        headerTextColor: '#000000FF',
        headerLogoEnable: false,
        headerLogoLink: 'https://chatbot-tools.fpt.ai/livechat-builder/img/Icon-fpt-ai.png',
        headerText: 'Tasty Chat Bot',
        // main
        primaryColor: '#FFC100FF',
        secondaryColor: '#ecececff',
        primaryTextColor: '#FFFFFFFF',
        secondaryTextColor: '#000000DE',
        buttonColor: '#b4b4b4ff',
        buttonTextColor: '#ffffffff',
        bodyBackgroundEnable: false,
        bodyBackgroundLink: '',
        avatarBot: 'https://chatbot-tools.fpt.ai/livechat-builder/img/bot.png',
        sendMessagePlaceholder: 'Nhập tin nhắn tại đây',
        // float button
        floatButtonLogo: 'https://chatbot-tools.fpt.ai/livechat-builder/img/Icon-fpt-ai.png',
        floatButtonTooltip: 'Tôi có thể giúp gì được cho bạn?',
        floatButtonTooltipEnable: true,
        // start screen
        customerLogo: 'https://cdn-icons-png.flaticon.com/512/2040/2040946.png',
        customerWelcomeText: 'Nhập tên của bạn',
        customerButtonText: 'Start',
        prefixEnable: false,
        prefixType: 'radio',
        prefixOptions: ["Anh", "Chị"],
        prefixPlaceholder: 'Danh xưng',
        // custom css
        css: ''
    }
    // Get bot code from url if FptAppCode is empty
    if (!FptAppCode) {
        let appCodeFromHash = window.location.hash.substr(1)
        if (appCodeFromHash.length === 32) {
            FptAppCode = appCodeFromHash
        }
    }
    // Set Configs
    let FptLiveChatConfigs = {
        appName: FptAppName,
        appCode: FptAppCode,
        themes: '',
        styles: CustomStyles
    }
    // Append Script
    let FptLiveChatScript = document.createElement('script')
    FptLiveChatScript.id = 'fpt_ai_livechat_script'
    FptLiveChatScript.src = liveChatBaseUrl + '/static/fptai-livechat.js'
    document.body.appendChild(FptLiveChatScript)
    // Append Stylesheet
    let FptLiveChatStyles = document.createElement('link')
    FptLiveChatStyles.id = 'fpt_ai_livechat_script'
    FptLiveChatStyles.rel = 'stylesheet'
    FptLiveChatStyles.href = liveChatBaseUrl + '/static/fptai-livechat.css'
    document.body.appendChild(FptLiveChatStyles)
    // Init
    FptLiveChatScript.onload = function () {
        fpt_ai_render_chatbox(FptLiveChatConfigs, liveChatBaseUrl, LiveChatSocketUrl)
    }
</script>


<!-- jQery -->
<script src="js/jquery-3.4.1.min.js"></script>
<!-- popper js -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
<!-- bootstrap js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js"
    integrity="sha512-WW8/jxkELe2CAiE4LvQfwm1rajOS8PHasCCx+knHG0gBHt8EXxS6T6tJRTGuDQVnluuAvMxWF4j8SNFDKceLFg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="./extentions/js/bootstrap.js"></script>

<!-- owl slider -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<!-- isotope js -->
<script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
<!-- nice select -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
<!-- custom js -->
<script src="./extentions/js/custom.js"></script>
<script src="./extentions/js/slider.js"></script>
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
</script>
<!-- End Google Map -->


<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>