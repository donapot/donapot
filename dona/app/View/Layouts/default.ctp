<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo __('CakePHP: the rapid development php framework:'); ?>
      <?php echo $title_for_layout; ?></title>

    <!-- Bootstrap -->
    <?php echo $this -> Html -> css('bootstrap.min'); ?>

    <!-- Le styles -->
    <style>
      /* something style */
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="header-top clearfix dark visible-lg visible-md">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-2 col-sm-5">
                            </div>
                            <div class="col-xs-10 col-sm-7" style="pull-right">
                                <!-- header-top-second start -->
                                <div id="header-top-second"  class="clearfix text-right">
                                    <nav>
                                        <ul class="list-inline">
                                                    <li>ログインする</li>
                                                    <li>DonaPotをはじめる</li>
                                                    <li><form role="記事を検索する" class="search-box margin-clear" action="/products/" method="post">
                                                                <div class="form-group has-feedback">
                                                                    <input name="data[Product][keyword]" type="text" class="form-control" placeholder="Search">
                                                                    <i class="fa fa-search form-control-feedback"></i>
                                                                </div>
                                                        </form>
                                                      </li>
                                        </ul>
                                    </nav>
                                </div>
                                <!-- header-top-second end -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- header-top end -->
    <nav class="navbar navbar-default navbar-static-top">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">どなぽっと</a>
        </div>
        <div style="height: 1px;"  style="pull-right" aria-expanded="false" id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active">
              <a href="#">ホーム</a>
            </li>
            <li>
              <a href="#about">記事一覧</a>
            </li>
            <li>
              <a href="#contact">DonaPotとは</a>
            </li>
             <li>
              <a href="#contact">わたしたち</a>
            </li>
             <li>
              <a href="#contact">お問い合わせ</a>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<!-- サイドバー -->
<!-- バックナンバー -->
<aside class="col-md-2">
        <div class="sidebar">
          <div class="block clearfix">
            <nav>
              <ul class="nav nav-pills nav-stacked">
                <li class="active">
                  <legend>バックナンバー</legend>
                </li>
                <li>2016年1月11日</li>
                <li>2016年1月11日</li>
                <li>2016年1月11日</li>
                <li>2016年1月11日</li>
                <li>2016年1月11日</li>
                <li>2016年1月11日</li>
                <li>2016年1月11日</li>
                <li>2016年1月11日</li>
              </ul>
            </nav>
            <br>
            <br>
<div class="block clearfix">
            <nav>
              <ul class="nav nav-pills nav-stacked">
                <li class="active">
                  <legend>カテゴリー</legend>
                </li>
                <li>セブ島あるある</li>
                <li>セブ島あるある</li>
                <li>セブ島あるある</li>
                <li>セブ島あるある</li>
                <li>セブ島あるある</li>
                <li>セブ島あるある</li>
                <li>セブ島あるある</li>
                <li>セブ島あるある</li>
              </ul>
            </nav>
          </div>
          </div>
        </div>
      </aside>
      <!-- カテゴリー -->
    <div class="container">

      <h1>Bootstrap starter template</h1>

      <?php echo $this -> Session -> flash(); ?>

      <?php echo $this -> fetch('content'); ?>
     
    </div><!-- /container -->
 <!-- フッター -->
      <footer class="footer" style="background-color:#F8F8F8;">
    <div class="container">

        <div class="row upper-section">
            <div class="col-xs-12 col-sm-4 col-md-3">
                <h1>Features</h1>
                <ul>
                    <li><a href="#">トップ</a></li>
                    <li><a href="#">記事一覧</a></li>
                    <li><a href="#">DonaPotとは</a></li>
                    <li><a href="#">お問い合わせ</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-3">
                <h1>Details</h1>
                <ul>
                    <li><a href="#">Specs</a></li>
                    <li><a href="#">Tools</a></li>
                    <li><a href="#">Resources</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-3">
                <h1>Technology</h1>
                <ul>
                    <li><a href="#">How it works</a></li>
                    <li><a href="#">Patterns</a></li>
                    <li><a href="#">Usage</a></li>
                    <li><a href="#">Products</a></li>
                    <li><a href="#">Contracts</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-4 col-sm-offset-8 col-md-3 col-md-offset-0">
                <h1 class="">FAQ</h1>
                <ul>
                    <li><a href="#">Questions</a></li>
                    <li><a href="#">Answers</a></li>
                    <li><a href="#">Contact us</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <?php echo $this -> Html -> script('bootstrap.min'); ?>
    <?php echo $this -> fetch('script'); ?>
  </body>
</html>