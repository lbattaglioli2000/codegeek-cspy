<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/"><span style="font-family: Lobster">CodeGeek <sup style="font-family: 'Courier New'">CSPY</sup></span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item <?php if($_SESSION['pageTitle'] == "home"){echo "active";}?>">
            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
        </li>
        <?php if($_SESSION['user']['loggedIn'] == "0"){ ?>
            <li class="nav-item <?php if($_SESSION['pageTitle'] == "overview"){echo 'active';}?>">
                <a class="nav-link" href="/overview">Course Overview</a>
            </li>
        <?php } ?>
        <?php if($_SESSION['user']['loggedIn'] == 1){ ?>
            <li class="nav-item">
                <a class="nav-link" href="/course">Course</a>
            </li>
        <?php } ?>
    </ul>
    <ul class="navbar-nav">
    <?php if($_SESSION['user']['loggedIn'] == "0"){ ?>
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal2">Register</a>
      </li>
    <?php } ?>
    <?php if($_SESSION['user']['loggedIn'] == "1" and $_SESSION['user']['tester'] == "1"){ ?>
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#feedback"><i class="fa fa-bullhorn" aria-hidden="true"></i> Feedback</a>
      </li>
    <?php } ?>
    <?php if($_SESSION['user']['loggedIn'] == "1"){ ?>
    <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#chat"><i class="fa fa-comments" aria-hidden="true"></i> Chat</a></li>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo $_SESSION['user']['firstName'] . " " . $_SESSION['user']['lastName']; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="/account"><i class="fa fa-user" aria-hidden="true"></i> Account</a>
          <?php if($_SESSION['user']['admin'] == 1){ ?>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="/new-lesson"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> New Lesson</a>
          <?php } ?>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
        </div>
      </li>
    <?php } ?>
    </ul>
    <?php if($_SESSION['user']['loggedIn'] == "1"){ ?>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <?php } ?>
  </div>
</nav>

<!-- Modal LOGIN -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <div class="modal-body">
                <?php if($_SESSION['user']['loggedIn'] != 1){ ?>
                    <form method="post" action="/login/process/index.php">
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="johny@appleseed.org" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-outline-primary btn-lg btn-block">Login</button>
                    </form>
                <?php } elseif ($_SESSION['user']['loggedIn'] == 1) { ?>
                    <h1>Hey, <?php echo $_SESSION['user']['firstName']; ?></h1>
                    <p>You're already logged in. No need to do it again!</p>
                <?php } ?>
            </div>
            <div class="modal-footer">
                <a class="btn btn-outline-secondary" data-dismiss="modal" href="#">Close</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal CHAT -->

<div class="modal fade" id="chat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Chat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <div class="modal-body">
                <?php if($_SESSION['user']['loggedIn'] != 1){ ?>
                    <form method="post" action="/login/process/index.php">
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="johny@appleseed.org" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-outline-primary btn-lg btn-block">Login</button>
                    </form>
                <?php } elseif ($_SESSION['user']['loggedIn'] == 1) { ?>
                    <iframe src="https://gitter.im/Open-CodeGeek/CSPY/~embed" style="border: none; height: 500px; width: 100%;"></iframe>
                <?php } ?>
            </div>
            <div class="modal-footer">
                <a class="btn btn-outline-secondary" data-dismiss="modal" href="#">Close</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-lg" id="feedback" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Feedback</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <div class="modal-body">
                <h2>Hi <?php echo $_SESSION['user']['firstName']; ?>!</h2>
                <form action="/includes/app/submit.php" method="post">
                    <p>We're <b>really</b> happy you're a beta tester. We're even happier that you're actually sending us feedback! With your help, we can build a better <span style="font-family: Lobster">CodeGeek</span>! Now, let's get started! We're going to guide you through how to submit proper feedback. Let's start off with the URL! It should be filled out automatically, however if it isn't, simply copy and paste the URL from the address bar and paste it in the field below.</p>
                    <div class="form-group">
                        <label>URL</label>
                        <input type="url" name="url" class="form-control" value="<?php $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; echo $actual_link; ?>">
                    </div>
                    <p>Okay great! Quick question though, is this an issue you're trying to bring to our attention or is this a suggestion? Or is it simply general feedback about the product?</p>
                    <div class="form-group">
                        <label>Feedback Type</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="issue">
                                Issue
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="suggestion">
                                Suggestion
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios3" value="feedback">
                                Feedback
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios4" value="other">
                                Other
                            </label>
                        </div>
                    </div>
                    <p>Awesome! Now that we actually know what type of feedback we're looking at, could you please describe it to us? For example if you find a spelling or grammatical error on the page you specified in the <b>URL</b> field, specify where on the page you found it. You could even copy and paste the error directly.</p>
                    <div class="form-group">
                        <label>Issue Description</label>
                        <textarea name="description" rows="5" placeholder="Describe the issue or suggestion as best as you can." class="form-control"></textarea>
                    </div>
                    <p>And lastly, just to verify, here's your account information that will be submitted along with the feedback. This helps us to identify who submits information and it allows us to reach out to you for more information if the provided information doesn't suffice.</p>

                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" value="<?php echo $_SESSION['user']['firstName'] . " " . $_SESSION['user']['lastName']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="email" name="email" value="<?php echo $_SESSION['user']['email']; ?>">
                    </div>

                    <p>Sweet! If the account information above is accurate, then you're all set! Hit the blue button below and your feedback will be sent our way! If it's incorrect, you may modify it, and then submit it. Thanks for helping make our product better!</p>
                    <!--<button class="btn btn-primary btn-lg btn-block">Submit Feedback!</button>-->
                    <div class="alert alert-warning">
                        <B>Sorry!</B> We're not accepting feedback yet! It's coming soon! (Within the coming days probably!)
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>