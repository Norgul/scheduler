<section id="home" name="home">
    <div id="headerwrap">
        <div class="container">
            <div class="row centered">
                <div class="col-lg-12">
                    <h1>Acacha <b><a href="https://github.com/acacha/adminlte-laravel">adminlte-laravel</a></b></h1>
                    <h3>A <a href="https://laravel.com/">Laravel</a> {{ trans('adminlte_lang::message.laravelpackage') }}
                        scaffolding/boilerplate {{ trans('adminlte_lang::message.to') }} <a href="https://almsaeedstudio.com/preview">AdminLTE</a> {{ trans('adminlte_lang::message.templatewith') }}
                        <a href="http://getbootstrap.com/">Bootstrap</a> 3.0 {{ trans('adminlte_lang::message.and') }} <a href="http://blacktie.co/demo/pratt/">Pratt</a> Landing page</h3>
                    <h3><a href="{{ url('/register') }}" class="btn btn-lg btn-success">{{ trans('adminlte_lang::message.gedstarted') }}</a></h3>
                </div>
                <div class="col-lg-2">
                    <h5>{{ trans('adminlte_lang::message.amazing') }}</h5>
                    <p>{{ trans('adminlte_lang::message.basedadminlte') }}</p>
                    <img class="hidden-xs hidden-sm hidden-md" src="{{ asset('/img/arrow1.png') }}">
                </div>
                <div class="col-lg-8">
                    <img class="img-responsive" src="{{ asset('/img/app-bg.png') }}" alt="">
                </div>
                <div class="col-lg-2">
                    <br>
                    <img class="hidden-xs hidden-sm hidden-md" src="{{ asset('/img/arrow2.png') }}">
                    <h5>{{ trans('adminlte_lang::message.awesomepackaged') }}</h5>
                    <p>... {{ trans('adminlte_lang::message.by') }} <a href="http://acacha.org/sergitur">Sergi Tur Badenas</a> {{ trans('adminlte_lang::message.at') }} <a href="http://acacha.org">acacha.org</a> {{ trans('adminlte_lang::message.readytouse') }}</p>
                </div>
            </div>
        </div> <!--/ .container -->
    </div><!--/ #headerwrap -->
</section>

<section id="desc" name="desc">
    <!-- INTRO WRAP -->
    <div id="intro">
        <div class="container">
            <div class="row centered">
                <h1>{{ trans('adminlte_lang::message.designed') }}</h1>
                <br>
                <br>
                <div class="col-lg-4">
                    <img src="{{ asset('/img/intro01.png') }}" alt="">
                    <h3>{{ trans('adminlte_lang::message.community') }}</h3>
                    <p>{{ trans('adminlte_lang::message.see') }} <a href="https://github.com/acacha/adminlte-laravel">{{ trans('adminlte_lang::message.githubproject') }}</a>, {{ trans('adminlte_lang::message.post') }} <a href="https://github.com/acacha/adminlte-laravel/issues">{{ trans('adminlte_lang::message.issues') }}</a> {{ trans('adminlte_lang::message.and') }} <a href="https://github.com/acacha/adminlte-laravel/pulls">{{ trans('adminlte_lang::message.pullrequests') }}</a></p>
                </div>
                <div class="col-lg-4">
                    <img src="{{ asset('/img/intro02.png') }}" alt="">
                    <h3>{{ trans('adminlte_lang::message.schedule') }}</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
                <div class="col-lg-4">
                    <img src="{{ asset('/img/intro03.png') }}" alt="">
                    <h3>{{ trans('adminlte_lang::message.monitoring') }}</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
            </div>
            <br>
            <hr>
        </div> <!--/ .container -->
    </div><!--/ #introwrap -->

    <!-- FEATURES WRAP -->
    <div id="features">
        <div class="container">
            <div class="row">
                <h1 class="centered">{{ trans('adminlte_lang::message.whatnew') }}</h1>
                <br>
                <br>
                <div class="col-lg-6 centered">
                    <img class="centered" src="{{ asset('/img/mobile.png') }}" alt="">
                </div>

                <div class="col-lg-6">
                    <h3>{{ trans('adminlte_lang::message.features') }}</h3>
                    <br>
                    <!-- ACCORDION -->
                    <div class="accordion ac" id="accordion2">
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                    {{ trans('adminlte_lang::message.design') }}
                                </a>
                            </div><!-- /accordion-heading -->
                            <div id="collapseOne" class="accordion-body collapse in">
                                <div class="accordion-inner">
                                    <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                </div><!-- /accordion-inner -->
                            </div><!-- /collapse -->
                        </div><!-- /accordion-group -->
                        <br>

                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                                    {{ trans('adminlte_lang::message.retina') }}
                                </a>
                            </div>
                            <div id="collapseTwo" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                </div><!-- /accordion-inner -->
                            </div><!-- /collapse -->
                        </div><!-- /accordion-group -->
                        <br>

                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                                    {{ trans('adminlte_lang::message.support') }}
                                </a>
                            </div>
                            <div id="collapseThree" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                </div><!-- /accordion-inner -->
                            </div><!-- /collapse -->
                        </div><!-- /accordion-group -->
                        <br>

                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
                                    {{ trans('adminlte_lang::message.responsive') }}
                                </a>
                            </div>
                            <div id="collapseFour" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                </div><!-- /accordion-inner -->
                            </div><!-- /collapse -->
                        </div><!-- /accordion-group -->
                        <br>
                    </div><!-- Accordion -->
                </div>
            </div>
        </div><!--/ .container -->
    </div><!--/ #features -->
</section>

<section id="showcase" name="showcase">
    <div id="showcase">
        <div class="container">
            <div class="row">
                <h1 class="centered">{{ trans('adminlte_lang::message.screenshots') }}</h1>
                <br>
                <div class="col-lg-8 col-lg-offset-2">
                    <div id="carousel-example-generic" class="carousel slide">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="{{ asset('/img/item-01.png') }}" alt="">
                            </div>
                            <div class="item">
                                <img src="{{ asset('/img/item-02.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
        </div><!-- /container -->
    </div>
</section>

<section id="contact" name="contact">
    <div id="footerwrap">
        <div class="container">
            <div class="col-lg-5">
                <h3>{{ trans('adminlte_lang::message.address') }}</h3>
                <p>
                    Av. Greenville 987,<br/>
                    New York,<br/>
                    90873<br/>
                    United States
                </p>
            </div>

            <div class="col-lg-7">
                <h3>{{ trans('adminlte_lang::message.dropus') }}</h3>
                <br>
                <form role="form" action="#" method="post" enctype="plain">
                    <div class="form-group">
                        <label for="name1">{{ trans('adminlte_lang::message.yourname') }}</label>
                        <input type="name" name="Name" class="form-control" id="name1" placeholder="{{ trans('adminlte_lang::message.yourname') }}">
                    </div>
                    <div class="form-group">
                        <label for="email1">{{ trans('adminlte_lang::message.emailaddress') }}</label>
                        <input type="email" name="Mail" class="form-control" id="email1" placeholder="{{ trans('adminlte_lang::message.enteremail') }}">
                    </div>
                    <div class="form-group">
                        <label>{{ trans('adminlte_lang::message.yourtext') }}</label>
                        <textarea class="form-control" name="Message" rows="3"></textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-large btn-success">{{ trans('adminlte_lang::message.submit') }}</button>
                </form>
            </div>
        </div>
    </div>
</section>