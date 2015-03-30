<div class="navbar navbar-inverse navbar-fixed-top scroll-me" id="menu-section">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">

                BAND MANAGEMENT APP

            </a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#home">HOME</a></li>
                <li><a href="#services">SERVICES</a></li>
                <li><a href="#pricing">PRICING</a></li>
                <li><a href="#work">WORK</a></li>
                <li><a href="#team">TEAM</a></li>
                <li><a href="#grid">GRID</a></li>
                <li><a href="#contact">CONTACT</a></li>
                @if(Auth::check())
                    <li><a href="/auth/logout">LOGOUT</a></li>
                @endif
                @if(Auth::guest())
                    <li><a href="/auth/register">REGISTER</a></li>
                @endif
            </ul>
        </div>

    </div>
</div>