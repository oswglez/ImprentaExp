<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />        <title>
            Imprenta Express  S1S1S      </title>
        <link href="/favicon.ico" type="image/x-icon" rel="icon" /><link href="/favicon.ico" type="image/x-icon" rel="shortcut icon" /><link rel="stylesheet" type="text/css" href="/css/jquery/flick/jquery-ui-1.10.4.custom.css" /><link rel="stylesheet" type="text/css" href="/css/imprenta.css?v=0.0.3" /><link rel="stylesheet" type="text/css" href="/css/admin.css" />
        <script type="text/javascript" src="/js/third/jquery-1.10.2.js"></script>
        <script type="text/javascript" src="/js/third/jquery-ui-1.10.4.custom.min.js"></script>
        <script type="text/javascript" src="/js/third/underscore.js"></script>
        <script type="text/javascript" src="/js/third/sprintf.min.js"></script>
        <script type="text/javascript" src="/js/utils.js"></script>
        <script type="text/javascript" src="/js/layout.js"></script>

        <script>
            var BASE_URL = "/public/";
        </script>
    </head>
    <body>
        <div id="container">
            <div id ="search-bar-2">
            </div>
            <div id="header" class="clearfix">
                <div id="header-logo">
                    <img src="/img/express.png" alt="" />
                </div>
                <div id="top-menu">
                    <div id="top-menu-inner">
                        <div class="menu-option ordenes ">
                            <a href="/orders/presupuesto">
                                <div class="icon"></div>
                                <div class="caption">Presupuestos</div>
                            </a>
                        </div>
                        <div class="menu-option ordenes ">

                            <a href="/orders/">
                                <div class="icon"></div>
                                <div class="caption">Ordenes</div>
                            </a>
                        </div>
                        <div class="menu-option clientes ">
                            <a href="/clients/">
                                <div class="icon"></div>
                                <div class="caption">Clientes</div>
                            </a>
                        </div>
                        <div class="menu-option admin current">
                            <a href="admin">
                                <div class="icon"></div>
                                <div class="caption">Admin app</div>
                            </a>
                        </div>
                        <div class="menu-option caja ">
                            <a href="/clients/caja/-1">
                                <div class="icon"></div>
                                <div class="caption">Caja app</div>
                            </a>
                        </div>
                        <div class="menu-option admin">
                            <a href="/users/logout">
                                <div class="icon"></div>
                                <div class="caption">Salir</div>
                            </a>
                        </div>
                    </div>
                </div>
                <div id="top-tools" class="clearfix">
                    <ul>
                    </ul>
                </div>
            </div>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">

                </div>
                <!-- /.content-header -->
            </div>
              <!-- /.content-wrapper -->
              <div id="content" class="clearfix">
                <div id="flashMessage" style=top: -40px> 
                    <div id="flashMessageWrapper">
                    </div>
                </div>
            <div class="users form">
         
                <!-- Main content -->
                <section class="content">
                    <?php echo $__env->yieldContent('content'); ?>
                </section>
                <!-- /.content -->

          
         </div>
    </body>
</html> <?php /**PATH /Applications/MAMP/htdocs/iexptest/resources/views/layouts/client.blade.php ENDPATH**/ ?>