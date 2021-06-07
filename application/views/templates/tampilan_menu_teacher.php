<!-- start: sidebar -->
<aside id="sidebar-left" class="sidebar-left">

    <div class="sidebar-header">
        <div class="sidebar-title">
            <span style="font-family: Arial, Helvetica, sans-serif ; color:white">Main Menu</span>
        </div>
        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">

                    <li class="nav-link <?= $this->uri->segment(2) == 'listClass' ||  $this->uri->segment(2) == 'table' ? 'nav-active' : '' ?>">
                        <a href="<?php echo base_url(); ?>teacher/listClass">
                            <i class="fa fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link <?= $this->uri->segment(2) == 'listStudent' || $this->uri->segment(2) == 'listAttend' ? 'nav-active' : '' ?>">
                        <a href="<?php echo base_url(); ?>teacher/listStudent">
                            <i class="fas fa-chalkboard"></i>
                            <span>Attendance</span>
                        </a>
                    </li>

                    <!-- <li class="nav-link <?= $this->uri->segment(2) == 'attendReport' || $this->uri->segment(2) == 'listAttendReport' ? 'nav-active' : '' ?>">
                        <a href="<?php echo base_url(); ?>teacher/attendReport">
                            <i class="fas fa-print"></i>
                            <span>Attendance Report</span>
                        </a>
                    </li> -->

                    <li class="nav-link <?= $this->uri->segment(2) == 'listScoreing' || $this->uri->segment(2) == 'listScore' ? 'nav-active' : '' ?>">
                        <a href="<?php echo base_url(); ?>teacher/listScore">
                            <i class="fas fa-star"></i>
                            <span>Score</span>
                        </a>


                    </li>


                    <li class="nav-link nav-parent <?= $this->uri->segment(2) == 'listScoreReport' ||
                                                        $this->uri->segment(2) == 'listScoreingReport' ||
                                                        $this->uri->segment(2) == 'listAttendReport' ||
                                                        $this->uri->segment(2) == 'printScorePdf' ||
                                                        $this->uri->segment(2) == 'printReportPdf' ||
                                                        $this->uri->segment(2) == 'attendReport' ? 'nav-expanded nav-active' : '' ?>">
                        <a>
                            <i class="fas fa-print" aria-hidden="true"></i>
                            <span>Report</span>
                        </a>
                        <ul class="nav nav-children">
                            <li class="nav-child <?= $this->uri->segment(2) == 'attendReport' || $this->uri->segment(2) == 'listAttendReport' || $this->uri->segment(2) == 'printReportPdf' ? 'nav-active' : '' ?>">
                                <a href="<?php echo base_url(); ?>teacher/attendReport">
                                    <i class="fas fa-chalkboard"></i>
                                    <span>Attendance Report</span>
                                </a>
                            </li>

                            <li class="nav-child <?= $this->uri->segment(2) == 'listScoreReport' || $this->uri->segment(2) == 'printScorePdf' || $this->uri->segment(2) == 'listScoreingReport' ? 'nav-active' : '' ?>">
                                <a href="<?php echo base_url(); ?>teacher/listScoreReport">
                                    <i class="fas fa-star"></i>
                                    <span>Score Report</span>
                                </a>
                            </li>

                        </ul>
                    </li>



                </ul>
            </nav>
        </div>
    </div>

</aside>