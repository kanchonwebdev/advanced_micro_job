<?php
    include_once 'lib/Session.php';
    Session::session_start();
    error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en-ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <link rel="stylesheet" href="css/sign_up.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amaranth&display=swap" rel="stylesheet">
</head>

<body>
    <div class="sign">
        <div class="sign-container">
            <div class="sign-header">
                <div class="sign-logo">
                    <a href="https://partippl.com">
                        <img src="new_img/partippl-blue.png" width="100%">
                    </a>
                </div>
            </div>

            <div class="sign-content">
                <div class="sign-left">
                    <div class="sign-left-header">
                        <h1>Register for PartiPpl.</h1>
                    </div>

                    <div class="sign-left-content">
                        <img src="new_img/1.png" width="100%" height="100%" alt="">
                    </div>

                    <div class="sign-left-footer">
                        PartiPpl is free for now, and will always be for
                        job seekers! Always find the best people for your
                        party, and find them now!
                    </div>
                </div>

                <form action="sign_code.php" method="post" class="sign-right">
                    <div class="sign-right-header">

                        <?php if(Session::show_value("sign_suc_msg") != "" || Session::show_value("sign_suc_msg") != NULL){ ?>
                            <div class="suc_bg">
                                <?php echo Session::show_value("sign_suc_msg"); ?>

                                <div class="close-icon" onclick="this.parentElement.style.display='none'">X</div>
                            </div>
                        <?php } ?>

                        <?php if(Session::show_value("sign_err_msg") != "" || Session::show_value("sign_err_msg") != NULL){ ?>
                            <div class="err_bg">
                                <?php echo Session::show_value("sign_err_msg"); ?>

                                <div class="close-icon" onclick="this.parentElement.style.display='none'">X</div>
                            </div>
                        <?php } ?>
                        
                        <div class="sign-right-header-block">
                            <input type="email" name="u_email" id="" placeholder="Email" class="text-field">
                        </div>

                        <?php if(Session::show_value("u_email") != "" || Session::show_value("u_email") != NULL){ ?>
                            <div class="err_bg">
                                <?php echo Session::show_value("u_email"); ?>

                                <div class="close-icon" onclick="this.parentElement.style.display='none'">X</div>
                            </div>
                        <?php } ?>
                        
                        <div class="sign-right-header-block">
                            <input type="text" name="u_name" id="" placeholder="Username" class="text-field">
                        </div>

                        <?php if(Session::show_value("u_name") != "" || Session::show_value("u_name") != NULL){ ?>
                            <div class="err_bg">
                                <?php echo Session::show_value("u_name"); ?>

                                <div class="close-icon" onclick="this.parentElement.style.display='none'">X</div>
                            </div>
                        <?php } ?>

                        <div class="sign-right-header-block">
                            <input type="password" name="u_pass" id="" placeholder="Password" class="text-field">
                        </div>

                        <?php if(Session::show_value("u_pass") != "" || Session::show_value("u_pass") != NULL){ ?>
                            <div class="err_bg">
                                <?php echo Session::show_value("u_pass"); ?>

                                <div class="close-icon" onclick="this.parentElement.style.display='none'">X</div>
                            </div>
                        <?php } ?>

                        <div class="sign-right-header-block">
                            <select name="b_day" id="" class="text-field">
                                <option value="none">Day</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>

                            <select name="b_month" id="" class="text-field">
                                <option value="none">Month</option>
                                <option value="01">Jan</option>
                                <option value="02">Feb</option>
                                <option value="03">Mar</option>
                                <option value="04">Apr</option>
                                <option value="05">May</option>
                                <option value="06">Jun</option>
                                <option value="07">Jul</option>
                                <option value="08">Aug</option>
                                <option value="09">Sep</option>
                                <option value="10">Oct</option>
                                <option value="11">Nov</option>
                                <option value="12">Dec</option>
                            </select>

                            <select name="b_year" id="" class="text-field">
                                <option value="none">Year</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2021</option>
                                <option value="2017">2017</option>
                                <option value="2016">2016</option>
                                <option value="2015">2015</option>
                                <option value="2014">2014</option>
                                <option value="2013">2013</option>
                                <option value="2012">2012</option>
                                <option value="2011">2011</option>
                                <option value="2010">2010</option>
                                <option value="2009">2009</option>
                                <option value="2008">2008</option>
                                <option value="2007">2007</option>
                                <option value="2006">2006</option>
                                <option value="2005">2005</option>
                                <option value="2004">2004</option>
                                <option value="2003">2003</option>
                                <option value="2002">2002</option>
                                <option value="2001">2001</option>
                                <option value="2000">2000</option>
                                <option value="1999">1999</option>
                                <option value="1998">1998</option>
                                <option value="1997">1997</option>
                                <option value="1996">1996</option>
                                <option value="1995">1995</option>
                                <option value="1994">1994</option>
                                <option value="1993">1993</option>
                                <option value="1992">1992</option>
                                <option value="1991">1991</option>
                                <option value="1990">1990</option>
                                <option value="1989">1989</option>
                                <option value="1988">1988</option>
                                <option value="1987">1987</option>
                                <option value="1986">1986</option>
                                <option value="1985">1985</option>
                                <option value="1984">1984</option>
                                <option value="1983">1983</option>
                                <option value="1982">1982</option>
                                <option value="1981">1981</option>
                                <option value="1980">1980</option>
                                <option value="1979">1979</option>
                                <option value="1978">1978</option>
                                <option value="1977">1977</option>
                                <option value="1976">1976</option>
                                <option value="1975">1975</option>
                                <option value="1974">1974</option>
                                <option value="1973">1973</option>
                                <option value="1972">1972</option>
                                <option value="1971">1971</option>
                                <option value="1970">1970</option>
                                <option value="1969">1969</option>
                                <option value="1968">1968</option>
                                <option value="1967">1967</option>
                                <option value="1966">1966</option>
                                <option value="1965">1965</option>
                                <option value="1964">1964</option>
                                <option value="1963">1963</option>
                                <option value="1962">1962</option>
                                <option value="1961">1961</option>
                                <option value="1960">1960</option>
                                <option value="1959">1959</option>
                                <option value="1958">1958</option>
                                <option value="1957">1957</option>
                                <option value="1956">1956</option>
                                <option value="1955">1955</option>
                                <option value="1954">1954</option>
                                <option value="1953">1953</option>
                                <option value="1952">1952</option>
                                <option value="1951">1951</option>
                                <option value="1950">1950</option>
                                <option value="1949">1949</option>
                                <option value="1948">1948</option>
                                <option value="1947">1947</option>
                                <option value="1946">1946</option>
                                <option value="1945">1945</option>
                                <option value="1944">1944</option>
                                <option value="1943">1943</option>
                                <option value="1942">1942</option>
                                <option value="1941">1941</option>
                                <option value="1940">1940</option>
                            </select>
                        </div>

                        <?php if(Session::show_value("b_date") != "" || Session::show_value("b_date") != NULL){ ?>
                            <div class="err_bg">
                                <?php echo Session::show_value("b_date"); ?>

                                <div class="close-icon" onclick="this.parentElement.style.display='none'">X</div>
                            </div>
                        <?php } ?>

                        <div class="sign-right-header-block">
                            <div class="sign-right-header-block-left">
                                <label for="male">Male</label>
                                <input type="checkbox" name="u_gender[]" id="male" class="checkbox" value="male">
                            </div>

                            <div class="sign-right-header-block-left">
                                <label for="female">Female</label>
                                <input type="checkbox" name="u_gender[]" id="female" class="checkbox" value="female">
                            </div>
                        </div>

                        <?php if(Session::show_value("u_gender") != "" || Session::show_value("u_gender") != NULL){ ?>
                            <div class="err_bg">
                                <?php echo Session::show_value("u_gender"); ?>

                                <div class="close-icon" onclick="this.parentElement.style.display='none'">X</div>
                            </div>
                        <?php } ?>

                        <div class="sign-right-header-block">
                            <div>I am a: </div>
                            <div><input type="checkbox" name="u_type[]" id="jobseeker" class="checkbox" value="job_seeker"> <label
                                    for="jobseeker">Job Seeker</label></div>
                            <div><input type="checkbox" name="u_type[]" id="employer" class="checkbox" value="employer"> <label
                                    for="employer">Employer</label></div>
                        </div>
                        
                        <?php if(Session::show_value("u_type") != "" || Session::show_value("u_type") != NULL){ ?>
                            <div class="err_bg">
                                <?php echo Session::show_value("u_type"); ?>

                                <div class="close-icon" onclick="this.parentElement.style.display='none'">X</div>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="sign-right-footer">
                        <input type="submit" value="REGISTER" class="btn">
                        <a href="home.php">Already a Member?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php 
    Session::set_value("sign_suc_msg", NULL);
    Session::set_value("sign_err_msg", NULL);
    Session::set_value("u_email", NULL);
    Session::set_value("u_name", NULL);
    Session::set_value("u_pass", NULL);
    Session::set_value("b_date", NULL);
    Session::set_value("u_gender", NULL);
    Session::set_value("u_type", NULL);
?>