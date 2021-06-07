<?php $this->load->view('templates/header'); ?>

<body>
    <section class="body">

        <?php $this->load->view('templates/tampilan_header'); ?>

        <div class="inner-wrapper">

            <?php $this->load->view('templates/tampilan_menu_teacher'); ?>

            <section role="main" class="content-body">
                <header class="page-header">
                    <h2><?php echo $title;  ?></h2>

                    <div class="right-wrapper pull-right">
                        <ol class="breadcrumbs">
                            <li>
                                <a href="index.html">
                                    <i class="fa fa-home"></i>
                                </a>
                            </li>
                            <li><span>Lantern House</span></li>
                        </ol>

                        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
                    </div>
                </header>

                <?php $this->load->view($content); ?>

            </section>
        </div>
    </section>

    <footer class="footer">
        <span>Copyright &copy; <?= date('Y'); ?> | PPSI | Sistem Informasi Kursus</span>
    </footer>

    <aside id="sidebar-right" class="sidebar-right">
        <div class="nano">
            <div class="nano-content">
                <a href="#" class="mobile-close visible-xs">
                    Collapse <i class="fa fa-chevron-right"></i>
                </a>

                <div class="sidebar-right-wrapper">

                    <div class="sidebar-widget widget-calendar">
                        <h6>CALENDAR</h6>
                        <div data-plugin-datepicker data-plugin-skin="dark"></div>
                    </div>
                </div>
            </div>
        </div>
    </aside>
    </section>

    <?php $this->load->view('templates/footer'); ?>