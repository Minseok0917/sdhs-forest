

    <article id="signup" class="content-container">
        <div class="signup util-content flex">
            <h3 class="title">Sign Up</h3>
            <form action="/signupPro" method="post" class="flex">
                <input type="hidden" name="base64Img" value="default">
                <div class="form-content">
                    <input type="text" name="id" required>
                    <label for="id">User ID</label>
                </div>
                <div class="form-content">
                    <input type="password" name="pass" required>
                    <label for="id">Password</label>
                </div>
                <div class="form-content">
                    <input type="password" name="passc" required>
                    <label for="id">Confirm Password</label>
                </div>
                <div class="form-content">
                    <input type="text" name="name" required>
                    <label for="id">User Name</label>
                </div>
                <div class="form-content profile-img flex">
                    <div class="ipt-img">
                        <p>Profile Image</p>
                        <input type="file" name="profileImg" accept="image/png, image/jpg, image/jpeg">
                    </div>
                    <div class="img-ex">
                        <img src="/resource/img/profile/default.jpg" alt="">
                    </div>
                </div>
                <input type="submit" value="Sign Up">
            </form>
        </div>
    </article#>




