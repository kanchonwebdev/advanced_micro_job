<?php
    include_once 'lib/Main_Query.php';
    error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en-ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PartiPpl - We Know How to Party!</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Reem+Kufi&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/slick.css">
</head>

<body>
    <div class="hero">
        <div class="hero-container">
            <div class="hero-left">
                <div class="hero-left-header">
                    <div class="hero-left-header-left">
                        <img src="new_img/partippl-blue.png" width="270px" height="75px" alt="">
                    </div>

                    <div class="hero-left-header-right">
                        <a href="#" id="active">Home</a>
                        <a href="#">Hire</a>
                        <a href="#">Work</a>
                        <img src="new_img/user.png" width="20px" height="20px" alt="" onclick="show_login()" style="cursor: pointer">
                    </div>
                </div>

                <img src="img/17.png" width="100%" height="100%" alt="" class="img-2">

                <div class="hero-left-content">
                    <b>Party People</b>

                    <img src="img/20.png" width="100%" height="100%" alt="" class="img-3">
                    <img src="img/19.png" width="100%" height="100%" alt="" class="img-4">

                    <section id="color">
                        Having a party? A get together? <br>
                        A big event? We know how to party! <br>
                        We are the Party People.
                    </section>
                </div>

                <img src="img/18.png" width="100%" height="100%" alt="" class="img-5">

                <div class="hero-left-footer">
                    <div class="hero-left-footer-left">
                        <h1>Hire</h1>

                        <section>
                            Post a new job and watch the applications
                            come rolling in! It's as easy as 1-2-3.
                        </section>
                    </div>

                    <div class="hero-left-footer-right">
                        <h1>Work</h1>

                        <section>
                            Register and create a jobseekers profile,
                            apply for jobs, start working. Get paid
                        </section>
                    </div>
                </div>
            </div>

            <div class="hero-right">
                <div class="hero-right-block-container" id="hero-right-block-container">
                    <div class="hero-right-block">
                        <div class="hero-right-left">
                            <img src="img/1.png" width="100%" height="100%" alt="">
                        </div>

                        <div class="hero-right-right">
                            <div class="hero-right-right-header">
                                <section onclick="show_login()">LOGIN</section>
                                <img src="img/2.png" width="100%" height="100%" alt="">
                            </div>

                            <div class="hero-right-right-footer">
                                <a href="#">Cebu City</a>
                                <a href="#">Age - 25</a>
                                <a href="#">Mary</a>
                            </div>
                        </div>
                    </div>

                    <div class="hero-right-block">
                        <div class="hero-right-left">
                            <img src="img/1.png" width="100%" height="100%" alt="">
                        </div>

                        <div class="hero-right-right">
                            <div class="hero-right-right-header">
                                <section onclick="show_login()">LOGIN</section>
                                <img src="img/2.png" width="100%" height="100%" alt="">
                            </div>

                            <div class="hero-right-right-footer">
                                <a href="#">Cebu City</a>
                                <a href="#">Age - 25</a>
                                <a href="#">Mary</a>
                            </div>
                        </div>
                    </div>

                    <div class="hero-right-block">
                        <div class="hero-right-left">
                            <img src="img/1.png" width="100%" height="100%" alt="">
                        </div>

                        <div class="hero-right-right">
                            <div class="hero-right-right-header">
                                <section onclick="show_login()">LOGIN</section>
                                <img src="img/2.png" width="100%" height="100%" alt="">
                            </div>

                            <div class="hero-right-right-footer">
                                <a href="#">Cebu City</a>
                                <a href="#">Age - 25</a>
                                <a href="#">Mary</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pagingInfo"></div>

                <div class="hero-right-icon-block">
                    <div class="hero-right-icon-left"><img src="new_img/left.png" width="25px" height="25px" alt=""></div>
                    <div class="hero-right-icon-right"><img src="new_img/right.png" width="25px" height="25px" alt=""></div>
                </div>
            </div>
        </div>
    </div>

    <div class="parti">
        <h1>Benefits Of Partippl</h1>

        <div class="parti-container">
            <div class="parti-left">
                <section id="color">
                    The number one issue most people face when planning their parties
                    is "Who is going to come?" "Who will bartend?" "Who will help me
                    cleanup afterwards?" and most importantly "Where do I find these
                    people?" The good news is all of these questions can be answered
                    right here. PartiPpl puts all these right in reach.
                </section>
            </div>

            <div class="parti-right">
                <img src="img/benefits.png" width="100%" height="100%" alt="">
            </div>
        </div>
    </div>

    <div class="staff">
        <div class="staff-container">
            <div class="staff-left">
                <h1>Instantly Find Staff</h1>

                <section id="color">
                    Find staff that are perfect for your job, and your situation instantly.
                    Simply, sign up, post a job and begin browsing staff to find the people
                    that are perfect for your requirements. You won't believe how smooth your
                    next event is because of our PartiPpl!
                </section>
            </div>

            <div class="staff-right">
                <img src="img/3.png" width="100%" height="100%" alt="">
            </div>
        </div>
    </div>

    <div class="staff">
        <div class="staff-container">
            <div class="staff-left">
                <h1>Cost Effective</h1>

                <section id="color">
                    Since you are only hiring staff on a per job basis you don't need to have
                    people even when you aren't busy or are not having an event. This way you
                    can find the people you want at a price you can afford.
                </section>
            </div>

            <div class="staff-right">
                <img src="img/55.png" width="100%" height="100%" alt="">
            </div>
        </div>
    </div>

    <div class="staff">
        <div class="staff-container">
            <div class="staff-left">
                <h1>Social Review Process</h1>

                <section id="color">
                    Benefit from the reviews left by other employers for our staff and hire
                    only the best. Staff are required to maintain a four star rating in order
                    to remain on our platform.
                </section>
            </div>

            <div class="staff-right">
                <img src="img/44.png" width="100%" height="100%" alt="">
            </div>
        </div>
    </div>

    <div class="staff-2">
        <div class="staff-2-container">
            <div class="staff-2-header">
                <h1>Types of Staff</h1>

                <section>
                    Partippl for the time being focuses on just a few specific job roles. As time
                    goes by we may add more, but for the time being; and for the sake of clarity
                    we have taken the time give a broader description of each role you can book
                    for on our website.
                </section>
            </div>

            <div class="staff-2-content">
                <div class="staff-2-block">
                    <div class="staff-2-block-header">
                        <img src="img/6.png" width="100%" height="100%" alt="">

                        <h2>Bartenders</h2>
                    </div>

                    <div class="staff-2-block-content">
                        A person who mixes and pours drinks is a bartender. A bartender
                        adds style and pizzazz to any party and allows you to focus on
                        entertaining your guests. In hiring a bartender make sure you
                        are clear with the PartiPpl you speak to in regards to your
                        expectations. Will they just be required to pour drinks, or will
                        they need to be a mixologist. As with all of our booking types,
                        you can specify whether you prefer to hire a male or female.
                    </div>
                </div>

                <div class="staff-2-block">
                    <div class="staff-2-block-header">
                        <img src="img/14.png" width="100%" height="100%" alt="">

                        <h2>Waitstaff</h2>
                    </div>

                    <div class="staff-2-block-content">
                        Waitstaff are good if you are having an party where you will be
                        serving people food and/or drinks. They can bring things to
                        tables, help you setup and tear down, and help with the overall
                        tasks of running an event. Essentially, waitstaff will do for you
                        what you would expect them to do in a restaurant. When you
                        post a job you can specify if you prefer male or female waiters.
                    </div>
                </div>

                <div class="staff-2-block">
                    <div class="staff-2-block-header">
                        <img src="img/15.png" width="100%" height="100%" alt="">

                        <h2>Promotions Staff</h2>
                    </div>

                    <div class="staff-2-block-content">
                        Are you launching a new product? Opening a new business?
                        Promoting an existing product? Promotional staff generally help
                        you attract people to your product in public places by handing
                        out free samples or otherwise sparking interest. Great
                        promotional staff have a perfect mix of looks, salesmanship,
                        and charisma.
                    </div>
                </div>

                <div class="staff-2-block">
                    <div class="staff-2-block-header">
                        <img src="img/16.png" width="100%" height="100%" alt="">

                        <h2>Entertainers</h2>
                    </div>

                    <div class="staff-2-block-content">
                        At PartiPpl when we talk about entertainers we are not talking
                        about people who can juggle, or clowns. We are talking about
                        someone who can act as a person at your event or party whose
                        only job it is to create a positive vibe and make sure everyone is
                        having fun. An entertainer should be outgoing, and a great
                        conversation starter. Someone everyone likes being around.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="login" id="myModal">
        <div class="login-container">
            <div class="login-content">
                <?php
                    if (Session::show_value('u_name') == "" || Session::show_value('u_name') == NULL) {
                ?>
                    <div class="login-left">
                        <div class="login-left-text-block">
                            <div class="login-left-text-1">Post a Job <div class="hide-div"></div>
                            </div>
                            <div class="login-left-text-2">Get Applications <div class="hide-div-2"></div>
                            </div>
                            <div class="login-left-text-3">Hire, and Party! <div class="hide-div-3"></div>
                            </div>
                        </div>

                        <div class="login-left-footer">
                            <div class="women">
                                <img src="new_img/2.png" width="100%" height="100%" alt="">
                            </div>

                            <div class="plant">
                                <img src="new_img/3.png" width="100%" height="100%" alt="">
                            </div>
                        </div>
                    </div>

                    <form role="form" id="loginForm" class="login-right">
                        <div class="login-right-header">
                            <h1>Welcome Back!</h1>
                            <span>Login to get access</span>
                        </div>

                        <div class="login-right-content">
                            <div id="login_msg"></div>

                            <div class="login-right-block">
                                <img src="new_img/user.png" width="15px" height="100%" alt="" style="margin: 0px 15px">
                                <input type="email" name="u_email" id="" placeholder="Email" class="text-field">
                            </div>

                            <div class="login-right-block">
                                <img src="new_img/lock.png" width="15px" height="100%" alt="" style="margin: 0px 15px">
                                <input type="password" name="u_pass" placeholder="Password" id="" class="text-field">
                            </div>

                            <div class="login-right-block-2">
                                <div>
                                    <input type="checkbox" name="" class="checkbox" id="remember">
                                    <label for="remember">Remember Me</label>
                                </div>

                                <a href="forget_pass.php">Forgot password?</a>
                            </div>
                        </div>

                        <div class="login-right-footer">
                            <input type="submit" value="Login" name="login" class="btn" id="login">

                            <div>
                                <a href="sign_up.php">New User? Sign Up</a>
                            </div>
                        </div>
                    </form>
                <?php }else{ ?>
                    <h1>You are Logged in <?php echo Session::show_value("u_type"); ?></h1>
                    <a href="logout.php" class="btn">Logout</a>

                    <?php if(Session::show_value("u_type") == "employer"){ ?>
                        <a href="employe_dashboard.php" class="btn">Go Dashboard</a>
                    <?php }else{ ?>
                        <a href="job_seeker_dashboard.php" class="btn">Go Dashboard</a>
                    <?php } ?>
                <?php } ?>
            </div>

            <div class="login-footer-text">
                <div>
                    <a href="#">Copyright Reserved @2021</a>
                </div>

                <div>
                    <a href="#">Terms and Conditions</a>
                    <a href="#">Privacy Policy</a>
                </div>
            </div>

            <div class="close" id="close">X</div>
        </div>
    </div>

    <div class="hire">
        <div class="hire-container">
            <div class="hire-header">
                <h1>Hiring Party People is Easy!</h1>
            </div>

            <div class="hire-content">
                <div class="hire-block">
                    <div class="hire-left">
                        <h1>Post A New Job</h1>

                        <section id="color">
                            The best way to find the best PartiPpl is by posting and job advert.
                            When you do so everyone you are targeting will get an email informing
                            them of the job. Make sure in the job posting include information such
                            as how long the job will take, how much it pays, when it pays, what the
                            dress code is and any other pertinent information. This will save you a
                            ton of time in the interview process.
                        </section>

                        <div class="hire-number">01</div>
                    </div>

                    <div class="hire-right">
                        <div class="hire-right-img">
                            <img src="img/21.PNG" width="100%" height="100%" alt="">
                        </div>
                    </div>
                </div>

                <div class="hire-block">
                    <div class="hire-left">
                        <h1>Start Getting Applications</h1>

                        <section id="color">
                            Once you have posted a job you can manage your applications directly from your dashboard,
                            you can keep track of the application status, and remember who you hired. Remember to make
                            sure to ask all the right questions, and be as straightforward and clear as possible when
                            you are interviewing.
                        </section>

                        <div class="hire-number">02</div>
                    </div>

                    <div class="hire-right">
                        <div class="hire-right-img">
                            <img src="img/22.PNG" width="100%" height="100%" alt="">
                        </div>
                    </div>
                </div>

                <div class="hire-block">
                    <div class="hire-left">
                        <h1>Hire Staff</h1>

                        <section id="color">
                            Once you have reviewed the applications, and had a chance to interview your potential hires
                            it's time to make a decision. Using our platform you can send them a job offer with all the
                            pertinent information. The applicant will then have the option to either accept or decline
                            the job. Once it has been accepted prepare to have a great time!
                        </section>

                        <div class="hire-number">03</div>
                    </div>

                    <div class="hire-right">
                        <div class="hire-right-img">
                            <img src="img/23.PNG" width="100%" height="100%" alt="">
                        </div>
                    </div>
                </div>

                <div class="hire-border"></div>
            </div>
        </div>
    </div>

    <div class="faq">
        <div class="faq-container">
            <div class="faq-header">
                <div class="faq-header-left">
                    <h1>Frequently Asked <br> Questions</h1>
                </div>

                <div class="faq-header-right">
                    <div class="faq-header-right-block">
                        <section onclick="show_faq('employee', this)" class="faq-active-2" id="default">Employer F.A.Q.
                        </section>
                    </div>

                    <div class="faq-header-right-block">
                        <section onclick="show_faq('staff', this)" class="faq-active-2">Staff F.A.Q</section>
                    </div>
                </div>
            </div>

            <div class="faq-content" id="employee">
                <div class="faq-left">
                    <div class="faq-block">
                        <div class="faq-block-header"><b>How much is PartiPpl</b> <img src="new_img/plus.png" width="15px" height="15px" alt=""></div>

                        <div class="faq-block-content">
                            During our closed beta we are not charging members for
                            access. Ultimately, PartiPpl will always be free for those
                            looking for work and the plan is to eventually charge those
                            looking to hire a monthly membership fee. We have yet to
                            determine a revenue model for PartiPpl but will do so based
                            on the feedback from the community.
                        </div>
                    </div>

                    <div class="faq-block">
                        <div class="faq-block-header"><b>How do I post a job?</b> <img src="new_img/plus.png" width="15px" height="15px" alt=""></div>

                        <div class="faq-block-content">
                            During our closed beta we are not charging members for
                            access. Ultimately, PartiPpl will always be free for those
                            looking for work and the plan is to eventually charge those
                            looking to hire a monthly membership fee. We have yet to
                            determine a revenue model for PartiPpl but will do so based
                            on the feedback from the community.
                        </div>
                    </div>
                </div>

                <div class="faq-right">
                    <div class="faq-block">
                        <div class="faq-block-header"><b>How do I pay staff? </b> <img src="new_img/plus.png" width="15px" height="15px" alt=""></div>

                        <div class="faq-block-content">
                            During our closed beta we are not charging members for
                            access. Ultimately, PartiPpl will always be free for those
                            looking for work and the plan is to eventually charge those
                            looking to hire a monthly membership fee. We have yet to
                            determine a revenue model for PartiPpl but will do so based
                            on the feedback from the community.
                        </div>
                    </div>

                    <div class="faq-block">
                        <div class="faq-block-header"><b>How do I hire the right staff?</b> <img src="new_img/plus.png" width="15px" height="15px" alt=""></div>

                        <div class="faq-block-content">
                            During our closed beta we are not charging members for
                            access. Ultimately, PartiPpl will always be free for those
                            looking for work and the plan is to eventually charge those
                            looking to hire a monthly membership fee. We have yet to
                            determine a revenue model for PartiPpl but will do so based
                            on the feedback from the community.
                        </div>
                    </div>

                    <div class="faq-block">
                        <div class="faq-block-header"><b>I need to extend the booking.</b> <img src="new_img/plus.png" width="15px" height="15px" alt=""></div>

                        <div class="faq-block-content">
                            During our closed beta we are not charging members for
                            access. Ultimately, PartiPpl will always be free for those
                            looking for work and the plan is to eventually charge those
                            looking to hire a monthly membership fee. We have yet to
                            determine a revenue model for PartiPpl but will do so based
                            on the feedback from the community.
                        </div>
                    </div>
                </div>
            </div>

            <div class="faq-content" id="staff">
                <div class="faq-left">
                    <div class="faq-block">
                        <div class="faq-block-header"><b>How do I get paid?</b> <img src="new_img/plus.png" width="15px" height="15px" alt=""></div>

                        <div class="faq-block-content">
                            First of all, PartiPpl has no involvement in the payment process, nor do we
                            set any kind of rates. This is strictly between you and whichever job you
                            choose to accept. When deciding upon payment please decide with your employer
                            on how much you will be paid. Also be clear as to when and how you will be
                            paid. We will take any complaints from staff seriously and if you find yourself
                            in a situation where you were not paid please contact us immediately.
                        </div>
                    </div>

                    <div class="faq-block">
                        <div class="faq-block-header"><b>How to find work?</b> <img src="new_img/plus.png" width="15px" height="15px" alt=""></div>

                        <div class="faq-block-content">
                            First make sure to register for PartiPpl by clicking here. Once you have
                            registered you need to completely fill out your profile. In your profile
                            make sure to include recent, clear photos. Once you have completed these
                            tasks you are able to send and receive messages as well as view and apply
                            to job advertisements.
                        </div>
                    </div>
                </div>

                <div class="faq-right">
                    <div class="faq-block">
                        <div class="faq-block-header"><b>What should I wear?</b> <img src="new_img/plus.png" width="15px" height="15px" alt=""></div>

                        <div class="faq-block-content">
                            In the event you are unsure as to what the dress code is for your booking
                            just ask the person hiring you in order to gain clarity on the issue.
                        </div>
                    </div>

                    <div class="faq-block">
                        <div class="faq-block-header"><b>A client wants to extend the booking.</b> <img src="new_img/plus.png" width="15px" height="15px" alt=""></div>

                        <div class="faq-block-content">
                            If the client would like to extend the booking you are of course under no
                            obligation to do so, however; if you are able and willing to do so then just
                            make sure you negotiate whatever it is you feel you need to extend.
                        </div>
                    </div>

                    <div class="faq-block">
                        <div class="faq-block-header"><b>I feel unsafe at a booking.</b> <img src="new_img/plus.png" width="15px" height="15px" alt=""></div>

                        <div class="faq-block-content">
                            Your safety should always be your foremost priority. Please do not stay in a
                            booking where you feel safe. In the event you feel you cannot continue a job
                            and feel you cannot safely discuss what might be bothering you about a booking
                            please leave. Once you have left please contact us and let us know the
                            circumstances in order for us to make PartiPpl a better platform.
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>

    <div class="find">
        <div class="find-container">
            <div class="find-left">
                <div class="find-left-block">
                    <h1>Find Your Party People Now!</h1>

                    <section>
                        In order to plan the best event, you need to find the best people. Our
                        professional partiers from Party People will help make sure your event
                        is a hit. They will make sure things run smoothly, and the energy stays
                        high, that way you can focus on the party.
                    </section>

                    <b>Book instantly for your next event.</b>
                </div>
            </div>

            <div class="find-right">
                <div class="find-right-img">
                    <img src="img/8.png" width="100%" height="100%" alt="">
                </div>
            </div>
        </div>
    </div>
    
    <div class="border-image">
    </div>

    <div class="footer">
        <div class="footer-container">
            <div class="footer-left">
                <div class="logo"><img src="new_img/partippl-blue.png" width="100%" height="100%" alt=""></div>

                <p>
                    Having a party? A get together? A big event? <br>
                    We know how to party! We are the Party People.
                </p>

                <span>Get the freshest news from our site.</span>

                <form action="#" class="news-form">
                    <input type="email" name="" class="news-text">
                    <input type="submit" value="SUBSCRIBE" class="news-btn">
                </form>
            </div>

            <div class="footer-right">
                <div class="footer-right-left">
                    <b>Quick Links</b>

                    <a href="#">Hire</a>
                    <a href="#">Work</a>
                </div>

                <div class="footer-right-right">
                    <b>Contact Us</b>

                    <a href="mailto:info@partippl.com">Email Us!</a>.<br>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-last">
        <div class="footer-last-container">
            <div class="footer-last-left">
                <a href="#">Terms & Conditions</a>
                <a href="#">Privacy Policy</a>
                <a href="#">Contact Us</a>
            </div>

            <div class="footer-last-right">
                Copyright © Partippl. All Rights Reserved.
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/slick.js"></script>
    <script src="js/main.js"></script>

    <script>
        $(document).ready(function(){
            $("#loginForm").on("submit", function(e){
                e.preventDefault();
                $("#loginbtn").text('Please wait..');
                var userForm = $(this).serialize();
                $.ajax({
                    url :"login_code.php",
                    type : "POST",
                    data: userForm,
                    success:function(response){
                        if (response == 2 || response == 3) {
                            if (response == 2) {
                                window.location = "employe_dashboard.php";
                            }
                            
                            if (response == 3) {
                                window.location = "job_seeker_dashboard.php";
                            }
                        }else{
                            $("#login_msg").html(response);
                        }
                    }
                });
            });

        });

        var $status = $('.pagingInfo');
        var $slickElement = $('#hero-right-block-container');

        $slickElement.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
            //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
            var i = (currentSlide ? currentSlide : 0) + 1;
            $status.text(i + '/' + slick.slideCount);
        });

        $('#hero-right-block-container').slick({
            dots: false,
            autoplay: true,
            autoplaySpeed: 2500,
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: true,
            variableWidth: true,
            prevArrow: $('.hero-right-icon-left'),
            nextArrow: $('.hero-right-icon-right')
        });

        var modal = document.getElementById("myModal");

        var span = document.getElementById("close");
        
        function show_login(){
            modal.style.display = "flex";   
        }

        span.onclick = function () {
            modal.style.display = "none";
        }

        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>

</html>

<?php
    Session::set_value("login_message", NULL);
    Session::set_value("u_email", NULL);
    Session::set_value("u_pass", NULL);
?>