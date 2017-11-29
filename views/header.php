<!DOCTYPE html>

<html>

    <head>

        <!-- http://getbootstrap.com/ -->
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>

        <link href="/css/styles.css" rel="stylesheet"/>

        <link href="/css/phonebook.css" rel="stylesheet"/>

        <link href="/css/selectize.default.css" rel="stylesheet"/>

        <link href="/less/selectize.default.less" rel="stylesheet/less" type="text/css" />

        <?php if (isset($title)): ?>
            <title>C$50 Finance: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>C$50 Finance</title>
        <?php endif ?>

        <!-- https://developers.google.com/maps/documentation/javascript/ -->
        <!--<script src="https://maps.googleapis.com/maps/api/js"></script>-->

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCLpWoaYdH4z-LAXvGqrnKvsC9dQKoehQ&libraries=places"></script>

        <!-- http://google-maps-utility-library-v3.googlecode.com/svn/tags/markerwithlabel/1.1.10/ -->
        <script src="/js/markerwithlabel_packed.js"></script>

        <!-- http://jquery.com/ -->
        <script src="/js/jquery-1.11.3.min.js"></script>

        <!-- http://getbootstrap.com/ -->
        <script src="/js/bootstrap.min.js"></script>

        <!-- http://underscorejs.org/ -->
        <script src="/js/underscore-min.js"></script>

        <script src="/js/maps.js"></script>

        <!--<script src="/js/maps.js"></script>-->

        <script src="/js/scripts.js"></script>

        <script src="/js/phonebook.js"></script>

        <script src="/js/selectize.min.js"></script>

                <!-- https://github.com/twitter/typeahead.js/ -->
        <script src="/js/typeahead.jquery.min.js"></script>

    </head>

    <body>

        <div class="container">




            <div id="top">
                <div>
                    <a href="/"><img alt="C$50 Finance" src="/img/logo large.jpg"/></a>
                </div>
                <?php if (!empty($_SESSION["id"])): ?>
                    <ul class="nav nav-pills">
                        <li><a href="quote.php">My Contacts</a></li>
                        <!--<li><a href="buy.php">Buy</a></li>
                        <li><a href="sell.php">Sell</a></li>-->
                        <li><a href="history.php">My Study Material</a></li>
                        <li>
                            <div class="btn-group color">
                                <button class="btn dropdown-toggle btn-custom " type="button" data-toggle="dropdown">
                                    <span class="glyphicon glyphicon-cog"></span>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu nav-custom">
                                    <li><a href="logout.php">Log Out</a></li>
                                    <li><a href="changepassword.php">Change Password</a></li>
                                </ul>
                            </div>
                        </li>
                     </ul>
                <?php endif ?>
            </div>

            <div id="middle">
