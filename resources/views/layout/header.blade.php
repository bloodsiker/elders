<header id="header" class="header">
    <div class="container">
        <div class="row">
            <!-- LOGO -->
            <div class="col-xs-12 col-sm-3 logo">
                <div class="logo-image">
                    <a href="/" title="">
                        <img class="logo-img" src="{{ asset('front/assets/images/logo.png') }}" alt="JoomlArt Demo Site">
                        <span></span>
                    </a>
                    <small class="site-slogan"></small>
                </div>
            </div>
            <!-- //LOGO -->

            <div class="head-right col-xs-12 col-sm-9">
                <!-- HEAD SEARCH -->
                <div class="head-search">
                    <button class="btn btn-search"><i class="fa fa-search"></i></button>
                    <div class="search">
                        <form action="{{ route('search') }}" method="get" class="form-inline form-search">
                            <label for="mod-search-searchword" class="element-invisible">Search ...</label>
                            <input name="search" id="mod-search-searchword" maxlength="200" class="form-control search-query" type="search" placeholder="Search ...">
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
</header>
