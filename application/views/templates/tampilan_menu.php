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

                    <li class="nav-child <?= $this->uri->segment(2) == '' ? 'nav-active' : '' ?>">
                        <a href="<?= base_url(); ?>staff">
                            <i class="fa fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>


                    <li class="nav-child <?= $this->uri->segment(2) == 'listStudent' || $this->uri->segment(2) == 'editStudent' || $this->uri->segment(2) == 'editStudentProcess' ? 'nav-active' : '' ?>">
                        <a href="<?= base_url(); ?>staff/listStudent">
                            <i class="fa fa-user-graduate"></i>
                            <span>Student</span>
                        </a>
                    </li>

                    <li class="nav-child <?= $this->uri->segment(2) == 'listClass' ? 'nav-active' : '' ?>">
                        <a href="<?= base_url(); ?>staff/listClass">
                            <i class="fa fa-calendar-alt"></i>
                            <span>Schedule</span>
                        </a>
                    </li>

                    <li class="nav-child <?= $this->uri->segment(2) == 'listPembagian' || $this->uri->segment(2) == 'table' ? 'nav-active' : '' ?>">
                        <a href="<?= base_url(); ?>staff/listPembagian">
                            <i class="fas fa-list-alt"></i>
                            <span>Class</span>
                        </a>
                    </li>

                    <!-- <li class="nav-child <?= $this->uri->segment(2) == 'listTeacher' ? 'nav-active' : '' ?>">
                        <a href="<?= base_url(); ?>staff/listTeacher">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <span>Teacher</span>
                        </a>
                    </li> -->
                    </li>


                </ul>
            </nav>

        </div>

    </div>

</aside>