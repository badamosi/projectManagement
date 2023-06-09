<template>
    <div class="col-md-6 col-xl-4 mg-t-15 mg-sm-t-20">
        <div class="card card-hover card-project-two">
            <div class="card-header bg-transparent">
                <div>
                    <h6 class="mg-b-5">React Development</h6>
                    <span>Last updated: Jul 30, 2019 4:00pm</span>
                </div>
                <nav class="nav nav-card-icon">
                    <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-check-square svg-14">
                            <polyline points="9 11 12 14 22 4"></polyline>
                            <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                        </svg> 40</a>
                    <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-message-square svg-14">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg> 6</a>
                </nav>
            </div><!-- card-header -->
            <div class="card-body">
                <p class="tx-13 tx-gray-700">Sunt in culpa qui officia deserunt mol excep teur sint occa ecat cupi datat non
                </p>
                <div class="card-progress">
                    <label class="content-label mg-b-0">Progress</label>
                    <div class="progress">
                        <div class="progress-bar wd-90p" role="progressbar" aria-valuenow="90" aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>
                    <label class="content-label mg-b-0">90%</label>
                </div>
            </div>
            <div class="card-footer bg-transparent">
                <div class="badge badge-danger">Overdue</div>
                <div class="project-date-end">Ended: Jul 15, 2019</div>
                <div class="avatar-group">
                    <div class="avatar avatar-xxs"><span class="avatar-initial rounded-circle bg-dark">a</span></div>
                </div>
            </div><!-- card-footer -->
        </div><!-- card -->
    </div></template>

<script>
export default {
    mounted() {
        console.log('Component mounted.')
    }
}
</script>
