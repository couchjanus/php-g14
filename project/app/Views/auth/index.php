<div class="form">
    <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
    </ul>
    <div class="tab-content">

        <div id="signup">
            <h1>Sign Up for Free</h1>
            <form action="register" method="post">
                <div class="field-wrap">
                    <label>
                        Email Address<span class="req">*</span>
                    </label>
                    <input type="email" name="email" required autocomplete="off" />
                </div>

                <div class="field-wrap">
                    <label>
                        Set A Password<span class="req">*</span>
                    </label>
                    <input type="password" name="password" required autocomplete="off" />
                </div>
                <div class="field-wrap">
                    <label>
                        Repeat A Password<span class="req">*</span>
                    </label>
                    <input type="password" name="confirmpassword" placeholder="Repeat Password" required
                        autocomplete="off" />
                </div>
                <button type="submit" class="button button-block" />Get Started</button>
            </form>
        </div>

        <div id="login">
            <h1>Welcome Back!</h1>
            <form action="login" method="post">
                <div class="field-wrap">
                    <label>
                        Email Address<span class="req">*</span>
                    </label>
                    <input type="email" name="email" required autocomplete="off" />
                </div>
                <div class="field-wrap">
                    <label>
                        Password<span class="req">*</span>
                    </label>
                    <input type="password" name="password" required autocomplete="off" />
                </div>
                <div class="field-wrap">
                    <label>
                        Remember Me
                    </label>
                    <input type="checkbox" name="remember_me" autocomplete="off">
                </div>
                <p class="forgot"><a href="#">Forgot Password?</a></p>
                <button type="submit" class="button button-block" />Log In</button>
            </form>
        </div>
    </div>
</div>