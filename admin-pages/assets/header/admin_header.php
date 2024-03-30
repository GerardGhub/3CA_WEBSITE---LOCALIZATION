<header>
    <div class="horizontal-nav">
        <div class="header">
            <div class="adminName">ADMIN DASHBOARD

            </div>
            

            

            <div class="space-x-1">
                <div class="dropdown d-inline-block">

                    <button type="button" class="btn btn-alt-secondary" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="img-avatar img-avatar32 img-avatar-thumb" src="assets/media/avatars/<?php echo $gender; ?>.png" alt="">
                        <span class="d-none d-sm-inline-block"></span>
                        <i class="fa fa-fw fa-angle-down opacity-50 ms-1 d-none d-sm-inline-block">sdsds</i>
                    </button>

                    <div class="dropdown-menu dropdown-menu-end p-0" aria-labelledby="page-header-user-dropdown">
                        <div class="p-2">
                            <a class="dropdown-item" href="admin?page=profile">
                                <i class="far fa-fw fa-user me-1"></i> My Profile
                            </a>
                            <div role="separator" class="dropdown-divider"></div>
                            <a class="dropdown-item" href="./logout">
                                <i class="far fa-fw fa-arrow-alt-circle-left me-1"></i> Sign Out
                            </a>
                        </div>
                    </div>
                </div>


            </div>


        </div>
    </div>
</header>