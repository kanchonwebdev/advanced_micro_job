<!DOCTYPE html>
<html lang="en-ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FAQ - Review</title>
    <link rel="stylesheet" href="css/job_seeker_dashboard.css">
    <link rel="stylesheet" href="css/faq.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amaranth&display=swap" rel="stylesheet">
</head>

<body>
    <div class="main-menu">
        <div class="main-menu-container">
            <div class="main-menu-left">
                <div class="sign-header">
                    <div class="sign-logo">
                        <a href="https://partippl.com"><img src="new_img/ppl.png" width="250px" height="75px"></a>
                    </div>
                </div>
            </div>

            <div class="main-menu-right">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#" id="active">Inbox</a></li>
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#"><span>Logout</span> <img src="new_img/10.png" width="20px" height="100%" alt=""></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="menu-2">
        <div class="menu-2-container">
            <div class="menu-2-left">
                <div class="logo">
                    <a href="https://partippl.com"><img src="new_img/ppl.png" width="100%" height="100%"></a>
                </div>
            </div>

            <div class="menu-2-right">
                <span onclick="show_menu()" class="menu-icon-block">
                    <div class="menu-icon"></div>
                    <div class="menu-icon"></div>
                    <div class="menu-icon"></div>
                </span>
            </div>
        </div>
    </div>

    <div class="menu-2-content" id="menu">
        <a href="" class="menu-2-block">Home</a>
        <a href="" class="menu-2-block">Inbox</a>
        <a href="" class="menu-2-block">Dashboard</a>
        <a href="" class="menu-2-block">Browse Employers</a>
        <a href="" class="menu-2-block">Browse Jobs</a>
        <a href="" class="menu-2-block">Reset Password</a>
        <a href="" class="menu-2-block">Edit Profile</a>
        <a href="" class="menu-2-block">Active Applications</a>
        <a href="" class="menu-2-block">Job History</a>
        <a href="" class="menu-2-block">Job Offers</a>
        <a href="" class="menu-2-block">Logout</a>
    </div>

    <div class="faq">
        <div class="faq-header">
            <h1>FAQ: REVIEWS</h1>
        </div>
        
        <div class="faq-container">
            <div class="faq-content">
                <div class="faq-block">
                    <div class="faq-block-header">
                        <h1>Q.</h1>

                        <h2>What? Reviews? Why?</h2>
                    </div>


                    <div class="faq-block-content">
                        <b>A.</b>

                        We want all of our users to have the best possible experience on PartiPpl, and the best way to
                        do so is through a review system where jobseekers who have worked for an employer can review the
                        employer, and employers can review people they have previously hired.
                    </div>
                </div>

                <div class="faq-block">
                    <div class="faq-block-header">
                        <h1>Q.</h1>

                        <h2>I want to write a negative review but am worried they will write negative about me if I do.
                        </h2>
                    </div>


                    <div class="faq-block-content">
                        <b>A.</b>

                        A. First of all, we are sorry you had a bad experience. We have designed PartiPpl in a way that
                        we believe will minimize retaliatory reviews. Once your booking is finished you will be given an
                        opportunity to review the person you just worked with. Once both users have published a review,
                        or 14 days have passed (whichever comes first) the reviews will become public. It is our belief
                        this system will help guard users against retaliatory reviews.
                    </div>
                </div>
            </div>

            <div class="faq-content">
                <div class="faq-block">
                    <div class="faq-block-header">
                        <h1>Q.</h1>

                        <h2>Who can write reviews?</h2>
                    </div>


                    <div class="faq-block-content">
                        <b>A.</b>

                        Only users who have met and who have worked with one another are able to write reviews. Once you
                        have completed the booking you will be presented with an option to write a review.
                    </div>
                </div>

                <div class="faq-block">
                    <div class="faq-block-header">
                        <h1>Q.</h1>

                        <h2>Someone wrote a negative review about me, what can I do?</h2>
                    </div>


                    <div class="faq-block-content">
                        <b>A.</b>

                        Only users who have met and who have worked with one another are able to write reviews. Once you
                        have completed the booking you will be presented with an option to write a review.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function show_menu() {
            var menu = document.getElementById("menu");

            if (menu.className === "menu-2-content") {
                menu.className = "display";

            } else {
                menu.className = "menu-2-content";
            }
        }
    </script>
</body>

</html>