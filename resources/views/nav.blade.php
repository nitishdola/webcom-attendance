<div class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">WebCom Ind</a>
        </div>
        <div class="navbar-collapse collapse ">
            <ul class="nav navbar-nav">
                <li class="dropdown active">
                    <a href="{{ route('home') }}" class="dropdown-toggle " data-delay="0" data-close-others="false">Home</a>
                               
                
                </li>
                <li class="active">
                    <a href="{{ route('check.attendance') }}" class="dropdown-toggle " data-delay="0" data-close-others="false">Check Attendance</a>
                               
                
                </li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </div>
</div>