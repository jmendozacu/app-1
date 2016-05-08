<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>

    <title>{{ $title }}</title>
    
    <link rel="icon" type="image/png" href="{{URL::to('public/images')}}/favicon.ico" />    
    <link rel="icon" type="image/gif" href="{{URL::to('public/images')}}/animated_favicon1.gif" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"/>
    <!-- Bootstrap/material Core CSS -->
    <link rel="stylesheet" href="{{URL::to('public/css')}}/bootstrap.min.css" />
    <link type="text/css" href="{{URL::to('public/css')}}/bootstrap-responsive.min.css" rel="stylesheet" />

    <link type="text/css" href="{{URL::to('public/css')}}/materialize.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{URL::to('public/css')}}/jquery-ui.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" />
    <link rel="stylesheet" href="{{URL::to('public/css')}}/font-awesome.css" />
    
    <!-- Custom CSS -->
    <link href="{{URL::to('public/css')}}/small-business.css" rel="stylesheet" />
    <link href="{{URL::to('public/css')}}/mystyle.css" rel="stylesheet" />
    <link href="{{URL::to('public/css')}}/buttons.css" rel="stylesheet" />
    <link href="{{URL::to('public/css')}}/flipper.css" rel="stylesheet"/>
    <link href="{{URL::to('public/css')}}/material-wfont.min.css" rel="stylesheet"/>
    <link href="{{URL::to('public/css')}}/jquery.qtip.min.css" rel="stylesheet"/>

    <style>
    body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
    margin-left: 2px;
    margin-right: 2px;
  }
  .sup{
        background-color: transparent;
        background-repeat: no-repeat;
        border-radius:25px;
        border:medium solid #2196F3;
        overflow: hidden;
        outline:blue;
    }
  main {
    flex: 1 0 auto;
  }
    video#bgvid { 
        position: absolute;
        top: 50%;
        left: 50%;
        min-width: 100%;
        min-height: 50%;
        width: auto;
        height: auto;
        z-index: -100;
        -webkit-transform: translateX(-50%) translateY(-50%);
        transform: translateX(-50%) translateY(-50%);
        background-size: contain; 
    }
    @media screen and (max-device-width: 800px) {
        html   {
                background: url(polina.jpg) #000 no-repeat center center fixed;
            }
    @media screen and (max-width: 350px){
        footer {
            display:none;
        }
    }
    #bgvid {
            display: none;
        }
    }
    video#bgvid {
        transition: 1s opacity;
    }
    .stopfade { opacity: .5; }
   #target > ul {
    height: 200px;
    width: 80px;
    overflow-y: scroll;
    }
    .dropdown-content {max-height:200px;}
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class=" navbar-inner">
             @if(Auth::check()==NULL)
                <a class="brand-logo" href="{{URL::route('home')}}">
                    <img src="{{URL::to('public/images')}}/logo.png" alt="Paygray Logo" style="width: 210px;height: 58px;"/>
                </a>
                @endif
                @if(Auth::check())
                <a class="brand-logo" href="{{URL::route('dashboard')}}" title="Dashboard">
                    <img src="{{URL::to('public/images')}}/logo.png" alt="Paygray Logo" style="width: 210px;height: 58px;"/>
                </a>
                @endif
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <div class="navbar-form navbar-right">
                    @if(Auth::check()==NULL)
                        <a class="waves-effect waves-teal btn-flat modal-trigger" href="#login" style="z-index: 10;">Login</a>
                        <a href="{{URL::route('home')}}#signup" class="sup waves-effect waves-teal btn-flat blue white-text" style="z-index: 10;">Signup</a>
                    @endif
                   
                    @if(Auth::check())
                    <a href="{{URL::route('dashboard.change-password')}}" class="sup waves-effect waves-teal btn-flat blue" style="z-index: 10;"> <span class="glyphicon glyphicon-lock"></span>&nbsp;Change Password</a>&nbsp;&nbsp;&nbsp;
                    <a href="{{URL::route('logout')}}" class="sup waves-effect waves-red btn-flat black-text" style="z-index: 10;"><span class="glyphicon glyphicon-log-out"></span>&nbsp;
                    Logout </a>
                    @endif
                </div>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
        
        @yield('content')
        <div class="divider grey"></div>
        
        <!-- Footer -->
       <footer class="page-footer grey lighten-3">
            <p class="pull-right"><a href="{{URL::to('privacy')}}">Privacy Policy </a>|<a href="{{URL::to('terms')}}"> Terms & Conditions </a>|<a href="{{URL::to('about')}}"> About</a></p>
            <p>&copy; {{ date('Y') }} IceTeck.</p>
      </footer>
          <!-- Login -->
      <div id="login" class="modal">
        <div class="modal-content">
          <h4>Login</h4>
         {{Form::open(array('route'=>'login', 'class'=>'form-horizontal', 'role'=>'form'))}}
          <div class="row">
                <div class="input-field col s6">
                  <i class="material-icons prefix blue-text">account_circle</i>
                  <input id="icon_prefix" type="text" name="username" class="validate" required/>
                  <label for="icon_prefix">Username</label>
                </div>
                <div class="input-field col s6">
                  <i class="material-icons prefix blue-text">lock</i>
                  <input id="icon_pass" name="password" type="password" class="validate" required />
                  <label for="icon_pass">Password</label>
                </div>
          </div>
        </div>
        <div class="modal-footer">
            <span class="left">Powered by <a href="https://iceteck.com" >Iceteck</a></span>
            <button class="waves-effect waves-light btn-flat blue-text lighten-2" type="submit" name="login">Login
                <i class="material-icons right">send</i>
            </button>
                {{Form::token()}}
            {{Form::close()}}
        </div>
      </div>
      <!-- End login -->
  
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script type="text/javascript" src="{{URL::to('public/js')}}/jquery.js"></script>
    
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <!-- Bootstrap/Materialize Core JavaScript -->
    <script type="text/javascript" src="{{URL::to('public/js')}}/flipper.js"></script>
    <script type="text/javascript" src="{{URL::to('public/js')}}/md-js.js"></script>
    <script type="text/javascript" src="{{URL::to('public/js')}}/card-depth.js"></script>
    <script src="{{URL::to('public/js')}}/materialize.min.js"></script>
    <script src="{{URL::to('public/js')}}/init.js"></script>
    <script src="{{URL::to('public/js')}}/platform.js"></script>
    <script src="{{URL::to('public/js')}}/jquery.dataTables.js"></script>
    <script src="{{URL::to('public/js')}}/jquery.flexslider.js"></script>
    <script src="{{URL::to('public/js')}}/jquery.qtip.min.js"></script>
        
    <script>
    $(document).ready(function(){
        $('#transaction_table').dataTable();
        $('.modal-trigger').leanModal();
        $('select').material_select();
        $('.loading').hide();
        $('.slider').slider({
            interval: 8000,
            height : 350
        });
        $(".dropdown-button").dropdown();
        $('.tooltiped').tooltip({delay: 50,
                                position: 'right',
                                tooltip: 'New tootlip'});
                                
        Materialize.showStaggeredList('#menulist');
    
    });
    </script>
     @if(Session::has('alertMessage'))
            <div class="row">
                <script> Materialize.toast("{{Session::get('alertMessage')}} <i class='material-icons right'>done_all</i>", 5000, 'green-text')</script>
            </div>
        @endif
        @if(Session::has('alertError'))
            <div class="col-lg-12 alert alert-danger alert-dismissible fade in" role="alert">
                <script> Materialize.toast("{{Session::get('alertError')}} <i class='material-icons right'>clear</i>", 5000, 'red-text')</script>
            </div>
        @endif
    <script>
      $(function() {
        $( "#tabs" ).tabs();
      });
            var vid = document.getElementById("bgvid"),
        pauseButton = document.getElementById("vidpause");
        function vidFade() {
            vid.classList.add("stopfade");
        }
    try{
        vid.addEventListener('ended', function() {
            // only functional if "loop" is removed 
            vid.pause();
            // to capture IE10
            vidFade();
        });

        pauseButton.addEventListener("click", function() {
            vid.classList.toggle("stopfade");
            if (vid.paused) {
                vid.play();
                pauseButton.innerHTML = '<i class="material-icons">pause</i>'; //pause
            } else {
                vid.pause();
                pauseButton.innerHTML = '<i class="material-icons">play_arrow</i>';//paused
            }
        })
        }catch(err){}
        //click scroll functionality
        $(function() {
          $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
              var target = $(this.hash);
              target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
              if (target.length) {
                if($(this).attr('href') == '#signup')
                $('html,body').animate({
                  scrollTop: target.offset().top
                }, 1000);
                return false;
              }
            }
          });
        });
        
        function ver_pass(){
            oripass = $('#password').val();
            verpass = $('#confirm_password').val();
            if(oripass == verpass)
                Materialize.toast('Passwords match <i class="material-icons right">done_all</i>', 2000, 'green-text','');
            else
                Materialize.toast('Passwords Do not match <i class="material-icons right">clear</i>', 3000, 'red-text', '');
        }
  </script>
  <script>
            $('a.Paygray_pay_btn').qtip({
                content: {
                    title:'<b>Paygray</b> - Choose your payment method below',
                    text: function(event, api) {
                        api.elements.content.html('Loading...');
                        return $.ajax({
                            url: api.elements.target.attr('href'),
                            type: 'POST',
                            data:{
                                apikey:'asdaf3',
                                amount: 212,
                                currency: 'USD',
                                cancel_url: 'localhost/app/',
                                confirm_url: 'localhost/app',
                                item_name: 'website development'
                            } // Use data-url attribute for the URL
                        })
                        .then(function(content) {
                            // Set the tooltip content upon successful retrieval
                           // api.set('content.text', content);
                            //this is so that a request is sent to reload a new parameters for the payment button
                            return content;
                        }, function(xhr, status, error) {
                            // Upon failure... set the tooltip content to the status and error value
                            api.set('content.text', status + ': ' + error);
                        });
            
                        return 'Loading ...'; // Set some initial text
                    }
                },
                position:{
                  //viewport: $(window),
                  my:'left center',
                  at:'right center',
                  effect: function(api, pos, viewport) {
                        // "this" refers to the tooltip
                        $(this).animate(pos, {
                            duration: 500,
                            easing: 'linear',
                            queue: false // Set this to false so it doesn't interfere with the show/hide animations
                        });
                    },
                    adjust: {
                            scroll: true // Can be ommited (e.g. default behaviour)
                        }  
                },
                style:{
                    width:350,
                    height:200,
                    classes: 'qtip-rounded qtip-green qtip-shadow'
                },
                show: {
                    effect: function() {
                        $(this).fadeTo(500, 1);
                    },
                    event:'click',
                    solo:true
                },
                hide: {
                        event: 'unfocus',
                        effect: function(offset) {
                            $(this).slideDown(100); // "this" refers to the tooltip
                        }
                    }
            }).click(function(e){ e.preventDefault(); });;
  </script>
    <!-- FlexSlider -->
    <script type="text/javascript">
    $(function(){
        SyntaxHighlighter.all();
    });
    $(window).load(function(){
        $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
            $('body').removeClass('loading');
        }
        });
    });
    </script>
    <!-- FlexSlider -->


     <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var $_Tawk_API={},$_Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5720b073c5def4a7560a36d2/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
</body>

</html>